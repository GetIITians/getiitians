<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
		//dd(Auth::user()->roles);
		$user	= ($id != null) ? User::find($id) : Auth::user();
		$id 	= $user->id;
		return view('frontend.profile.index', compact('user','id'));
    }

	public function postPersonal(Request $request)
	{
		$request->user()->update($request->all());
		flash('Your information has been updated.');
		return redirect('/profile');
	}
}
