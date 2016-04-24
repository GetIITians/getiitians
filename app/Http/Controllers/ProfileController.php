<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Gate;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Teacher;
use App\Qualification;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function topics(User $user)
	{
		$topics = [];
		foreach ($user->deriveable->topics as $topic) {
			$topics[$topic->subject->grade->name][$topic->subject->name][] = $topic->name;
		}
		return view('frontend.profile.topics', ['page' => 'profile', 'user' => $user, 'topics' => $topics]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function schedule(User $user,$month = null,$year = null)
	{
 		$Month = ($month === null) ? date("n") : (int)$month ;
		$Year = ($year === null) ? date("Y") : (int)$year ;
		return view('frontend.profile.schedule', ['page' => 'profile', 'user' => $user, 'month' => $Month, 'year' => $Year]);
	}

	public function updateProfilePic()
	{
		$file = \Input::file('picture');
		$destinationPath = 'img/uploads';
		$filename = str_random(12);
		$extension = $file->getClientOriginalExtension();
		$upload_success = $file->move($destinationPath, $filename.".".$extension);

    if( $upload_success ) {
			$user = Auth::user();
			$user->picture = $destinationPath."/".$filename.".".$extension;
			$user->save();
    	return \Response::json('success', 200);
    } else {
    	return \Response::json('error', 400);
    }
	}

	public function updatePersonal(Request $request)
	{
		$request->offsetSet('date_of_birth', Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->toDateTimeString());
		//dd($request->all());
		$request->user->update($request->all());
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user->id.'/update/personal');
	}

	public function updateQualification(Request $request)
	{
		//dd($request->all());
		$teacher = $request->user->deriveable;
		if ($request->has('language')) {
			$teacher->languages()->sync($request->input('language')) ;
		}
		if ($request->has('qualification'))
		{
			foreach ($request->input('qualification') as $key => $qualification)
			{
				if(array_key_exists('id',$qualification))
				{
					$id = $qualification['id'];
					unset($qualification['id']);
					$qualification['passout'] = Carbon::createFromFormat('d/m/Y', $qualification['passout'])->toDateTimeString();
					Qualification::where('id',$id)->update($qualification);
				}
			}
		}
		$teacher->update($request->only(['experience','home_tuition']));
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user->id.'/update/qualification');
	}

	public function updateSubjects(Request $request)
	{
		//dd($request->all());
		$teacher_topics = [];
		if($request->has('subject'))
		{
			foreach ($request->input('subject') as $grade => $topics) {
				foreach ($topics as $key => $id) {
					$teacher_topics[$id] = ['fees' => $request->input('price')[$grade]];
				}
			}
		}
		$request->user->deriveable->topics()->sync($teacher_topics);
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user->id.'/update/subjects');
	}

	public function updateTimeslots(Request $request)
	{
		$start		= Carbon::createFromFormat('d-M-Y H:i:s', $request->input('start')." 00:00:00");
		$end			= Carbon::createFromFormat('d-M-Y H:i:s', $request->input('end')." 00:00:00");
		$dbStart	=	$start->toDateString();
		$dbEnd		=	$end->addDay()->toDateString();
		$time 		= $request->input('time');
		$span 		= $end->diffInDays($start);
		$slots 		= [];
		for ( $i 	= 0 ; $i <= $span ; $i++ ) {
			$date 	= ($i===0) ? $start : $start->addDay() ;
			if(in_array($date->dayOfWeek, $request->input('days')))
			{
				foreach ($time as $key => $slot) {
					$last 		= ($key===0) ? "0" : $time[$key-1] ;
					$slots[] 	= new \App\Timeslot(['slot' => $date->addMinutes((30*($slot-$last)))->toDateTimeString()]);
				}
				$date->subMinutes(30*end($time));
			}
		}
		//var_dump($dbStart.''.$dbEnd);
		\App\Timeslot::where('teacher_id',$request->user->deriveable->id)->whereBetween('slot', [$dbStart, $dbEnd])->delete();
		$request->user->deriveable->timeslots()->saveMany($slots);
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user->id.'/update/timeslots');
	}

	public function book (User $user)
	{
		$topics = [];
		foreach ($user->deriveable->topics as $topic) {
			$topics[$topic->subject->grade->id]['name'] = $topic->subject->grade->name;
			$topics[$topic->subject->grade->id]['id'] = $topic->subject->grade->id;
			$topics[$topic->subject->grade->id]['subjects'][$topic->subject->id]['name'] = $topic->subject->name;
			$topics[$topic->subject->grade->id]['subjects'][$topic->subject->id]['id'] = $topic->subject->id;
			$topics[$topic->subject->grade->id]['subjects'][$topic->subject->id]['topics'][$topic->id]['name'] = $topic->name;
			$topics[$topic->subject->grade->id]['subjects'][$topic->subject->id]['topics'][$topic->id]['id'] = $topic->id;
			$topics[$topic->subject->grade->id]['subjects'][$topic->subject->id]['topics'][$topic->id]['fees'] = $topic->pivot->fees;
		}
		//dd($topics);
		return view('frontend.profile.book', ['page' => 'profile', 'user' => $user, 'topics' => $topics]);
	}

	public function slots (Request $request, User $user)
	{
		$dates = json_decode($request->input('dates'));

		$slots = \App\Timeslot::where('teacher_id',$user->deriveable->id)
						->where(function($query) use ($dates){
							foreach ($dates as $date) {
								$query->orWhereBetween('slot', [(new Carbon($date))->toDateTimeString(), (new Carbon($date))->addDay()->toDateTimeString()]);
							}
						})
						->get();

		$available = [] ;
		foreach ($slots as $slot) {
			$available[$slot->slot->day][] = $slot->slot->hour.':'.$slot->slot->minute;
		}

		$toBeSent = array_shift($available) ;
		foreach ($available as $value) {
			$toBeSent = array_intersect($toBeSent,$value);
		}

		return response()->json($toBeSent);
	}

}
