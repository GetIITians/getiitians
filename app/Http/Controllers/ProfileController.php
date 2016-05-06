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
		$destinationPath = '/img/uploads';
		$filename = str_random(12);
		$extension = $file->getClientOriginalExtension();
		$upload_success = $file->move(public_path().$destinationPath, $filename.".".$extension);

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
		//dd($request->all());
		$request->offsetSet('date_of_birth', (new Carbon($request->date_of_birth))->toDateTimeString());
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
				$qualification['verification'] = $request->files->all()['qualification'][$key]['verification'];
				$qualification['passout'] = Carbon::createFromFormat('d/m/Y', $qualification['passout'])->toDateTimeString();
				if(array_key_exists('verification',$qualification) && $qualification['verification'] !== NULL){
					$file = $qualification['verification'];
					$destinationPath = 'img/uploads';
					$filename = str_random(12);
					$extension = $file->getClientOriginalExtension();
					$upload_status = $file->move($destinationPath, $filename.".".$extension);

					if( $upload_status ) {
						$qualification['verification'] = $destinationPath."/".$filename.".".$extension;
					}
				}
				if(array_key_exists('id',$qualification))
				{
					$id = $qualification['id'];
					unset($qualification['id']);
					Qualification::where('id',$id)->update($qualification);
				}
				else
				{
					$qual = new Qualification;
					$qual->teacher_id = $request->user()->id;
					$qual->college = $qualification['college'];
					$qual->degree = $qualification['degree'];
					$qual->branch = $qualification['branch'];
					$qual->passout = $qualification['passout'];
					$qual->verification = $qualification['verification'];
					$qual->save();
				}
			}
		}
		//dd($request->all());
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
		flash('Your subjects have been updated.');
		return redirect('/profile/'.$request->user->id.'/update/subjects');
	}

	public function updateTimeslots(Request $request)
	{
		$teacher_id = $request->user->deriveable->id;
		if(!empty($request->input('start')) && !empty($request->input('end'))){
			$start 		= Carbon::createFromFormat('|d/m/Y',$request->input('start'));
			$end 			= Carbon::createFromFormat('|d/m/Y',$request->input('end'));
			$dbStart	=	$start->toDateString();
			$dbEnd		=	$end->addDay()->toDateString();
			$time 		= $request->input('time');
			$span 		= $end->diffInDays($start);
			$slots 		= [];
			if($request->has('time')){
				for ( $i 	= 0 ; $i < $span ; $i++ ) {
					$date 	= ($i===0) ? $start : $start->addDay() ;
					if($request->has('days')){
						if(in_array($date->dayOfWeek, $request->input('days')))
						{
							foreach ($time as $key => $slot) {
								$last 		= ($key===0) ? "0" : $time[$key-1] ;
								$tym = $date->addMinutes((30*($slot-$last)))->toDateTimeString();
								if(empty(\App\Timeslot::where('slot',$tym)->where('teacher_id',$teacher_id)->get()->first()->session_id)){
									$slots[] 	= new \App\Timeslot(['slot' => $tym]);
								}
							}
							$date->subMinutes(30*end($time));
						}
					} else {
						foreach ($time as $key => $slot) {
							$last 		= ($key===0) ? "0" : $time[$key-1] ;
							$tym = $date->addMinutes((30*($slot-$last)))->toDateTimeString();
							//var_dump(\App\Timeslot::where('slot',$tym)->where('teacher_id',$teacher_id)->get()->first());
							if(empty(\App\Timeslot::where('slot',$tym)->where('teacher_id',$teacher_id)->get()->first()->session_id)){
								$slots[] 	= new \App\Timeslot(['slot' => $tym]);
							}
						}
						$date->subMinutes(30*end($time));
					}
				}
			}
			//dd($slots);
			if(empty($slots) && \App\Timeslot::where('teacher_id',$teacher_id)->where('session_id','is not null')->whereBetween('slot', [$dbStart, $dbEnd])->get()->isEmpty()){
				flash("Your timeslots can't be updated because one or more classes have been booked for them.");
			} else {
				\App\Timeslot::where('teacher_id',$teacher_id)->whereBetween('slot', [$dbStart, $dbEnd])->delete();
				if(!empty($slots)){
					$request->user->deriveable->timeslots()->saveMany($slots);
				}
				flash('Your timeslots have been updated.');
			}
		} else {
			flash('Please fill in the Start and End date.');
		}
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
		return view('frontend.profile.book', ['page' => 'profile', 'user' => $user, 'topics' => $topics]);
	}

	public function slots (Request $request, User $user)
	{
		$dates = json_decode($request->input('dates'));

		$slots = \App\Timeslot::where('teacher_id',$user->deriveable->id)
						->where('session_id',NULL)
						->where(function($query) use ($dates){
							foreach ($dates as $date) {
								$query->orWhereBetween('slot', [(new Carbon($date))->toDateTimeString(), (new Carbon($date))->addDay()->subMinute()->toDateTimeString()]);
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

	public function bookClass (Request $request, User $user)
	{
//		var_dump($demoQuery->isEmpty());
//		var_dump(Auth::user()->id);
//		var_dump($user->id);
		$topic = $request->input('topic');
		$dates = $request->input('date');
		$waqt = [] ;
//		var_dump($request->all());
		foreach ($request->input('time') as $key => $time) {
			$pieces[$key] = explode(":",$time);
			$waqt[$key] = '';
			foreach ($pieces[$key] as $value) {
				$waqt[$key][] = sprintf("%02d", $value);
			}
		}
		$time = [] ;
		foreach ($waqt as $key => $value) {
			$time[] = implode(":", $value);
		}
//		var_dump($time);
		$slots = [] ;
		foreach ($dates as $date) {
			foreach ($time as $samay) {
				$slots[] = Carbon::createFromFormat('Y-n-j H:i',$date.' '.$samay);
			}
		}
//		var_dump($slots);
		$groups = [] ;
		$i = 0 ;
		foreach ($slots as $key => $slot) {
			if($key === 0){
				$groups[$i][] = $slot;
			} else {
				$diff = $slot->diffInMinutes(end($groups[$i-1]));
				if ((\App\Session::where('teacher_id',$user->deriveable->id)->where('student_id',Auth::user()->id)->where('demo',1)->get()->isEmpty()) && ($key === 2)) {	//	Means demo not done yet
					$groups[$i][] = $slot;
					$i++;
					continue;
				}

				if ($diff === 30){ $i--; }
				$groups[$i][] = $slot;
			}
			$i++;
		}
		if(count($groups[0]) !== 2 && count($groups) > 1){
			$groups[0][] = $groups[1][0];
			unset($groups[1]);
			$groups = array_values($groups);
		}
//		var_dump($groups);

		$status = [] ;
		foreach ($groups as $key => $group) {
			$demo = ($key === 0) ? true : false ;
			$status[] = $this->saveClass($topic,$user->id,$group,$demo);
		}
		//dd($request->all());
		flash('Your class sessions have been booked.');
		return redirect('/profile/'.$request->user->id.'/book');

	}

	public function saveClass( $topic_id, $teacher_id, $timeslots, $demo = false)	//	Fill in SESSION & TIMESLOT &(TRANSACTION if payment system is active)
	{
		$session = new \App\Session;
		$session->topic_id = $topic_id;
		$session->teacher_id = $teacher_id;
		$session->student_id = Auth::user()->deriveable->id;
		$session->demo = ($demo) ? 1 : 0 ;
		$session->save();

		foreach ($timeslots as $key => $value) {
			\App\Timeslot::where('teacher_id', $teacher_id)
          ->where('slot', $value)
          ->update(['session_id' => $session->id]);
		}

		return $session;
	}

	public function classes(User $user)
	{
		$sessions = [] ;
		foreach ($user->deriveable->sessions as $key => $session) {
			$sessions[$key]['Class'] = $session->topic->subject->grade->name;
			$sessions[$key]['Subject'] = $session->topic->subject->name;
			$sessions[$key]['Topic'] = $session->topic->name;
			$sessions[$key]['Date'] = $session->timeslots->first()->slot->format('D, d M');
			$sessions[$key]['Time'] = $session->timeslots->first()->slot->format('h:i A');
			$duration = $session->timeslots->count()/2 ;
			$sessions[$key]['Duration'] = ($duration > 1) ? $duration." Hours" : $duration." Hour";
			if ($user->isTeacher())
				$sessions[$key]['User'] = $session->student->user;
			else if($user->isStudent())
				$sessions[$key]['User'] = $session->teacher->user;
			$sessions[$key]['timestamp'] = $session->timeslots->first()->slot;
		}
		//dd($sessions);
		return view('frontend.profile.classes', ['page' => 'profile', 'user' => $user, 'sessions' => $sessions]);
	}

	public function messages(User $user)
	{
		$galBaat = [] ;
		$userType = $user->typeOfUser();
		$chats = $user->deriveable->chats()->orderBy('created_at', 'desc')->get();
		foreach ($chats as $id => $chat) {
		  $key = ( $userType == 'student') ? ucwords(strtolower($chat->teacher->user->name)) : ucwords(strtolower($chat->student->user->name)) ;
			$keyID = ( $userType == 'student') ? ucwords(strtolower($chat->teacher->id)) : ucwords(strtolower($chat->student->id)) ;
		  $galBaat[$key]['content'][$id]['sender']		= ($chat->sender == Auth::user()->id) ? 'self' : 'other' ;
		  $galBaat[$key]['content'][$id]['message']	= $chat->message;
			$galBaat[$key]['content'][$id]['time'] 		= $chat->created_at;
			$galBaat[$key]['id'] = $keyID;
		}
		//dd($galBaat);
		return view('frontend.profile.messages', ['page' => 'profile', 'user' => $user, 'chats' => $galBaat]);
	}

	public function postMessage(Request $request)
	{
		if ($request->has('message')) {
			$chat = new \App\Chat;
			$chat->message = $request->message;
			$chat->teacher_id = $request->teacher_id;
			$chat->student_id = $request->student_id;
			$chat->sender = $request->user()->id;
			$chat->save();
		}

		if($request->ajax())
		{
			if($chat)
				return response()->json(['status' => 'success'], 201);
			else
				return response()->json(['status' => 'failure'], 504);
		}
		else
		{
			if($chat){
				flash('Your message has been sent to the Teacher.');
			}
			return redirect('/profile/'.$request->user()->id);
		}
	}
}
