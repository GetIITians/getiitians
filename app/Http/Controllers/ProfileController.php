<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;
use Auth;
use App\User;
use App\Info;
use App\Qualification;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

	public function postQualifications(Request $request)
	{
		dd($request->all());
		//$request->user()->update($request->all());
		//return redirect('/profile/'.$request->user()->id);
		/*
		$request->user()->update($request->all());
		flash('Your information has been updated.');
		return redirect('/profile'.$request->user()->id);
		*/
	}

	public function test(User $user)
	{
		dd($user->info()->get()->isEmpty());
		//$app = app();
		//var_dump(get_class($app));
		//var_dump(Gate::getPolicyFor('App\User'));
		//var_dump(policy('App\User')->see(Auth::user(), 1));
		//var_dump(Gate::forUser(Auth::user())->allows('see', 1));
		//dd(policy($user)->see(Auth::user(), $user));
	}
}
