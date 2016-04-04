<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Gate;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Teacher;
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
		$destinationPath = 'uploads';
		$filename = str_random(12);
		$extension = $file->getClientOriginalExtension() ;
		$upload_success = $file->move($destinationPath, $filename.".".$extension);

    if( $upload_success ) {
    	return \Response::json('success', 200);
    } else {
    	return \Response::json('error', 400);
    }
	}

	public function updatePersonal(Request $request)
	{
		$request->offsetSet('date_of_birth', Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->toDateTimeString());
		//dd($request->all());
		$request->user()->update($request->all());
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user()->id.'/update/personal');
	}
}
