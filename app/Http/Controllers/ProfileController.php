<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Gate;
use Auth;
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

	public function updatePersonal(Request $request)
	{
		//dd($request->all());
		$request->user()->update($request->all());
		flash('Your information has been updated.');
		return redirect('/profile/'.$request->user()->id.'/update/personal');
	}
}
