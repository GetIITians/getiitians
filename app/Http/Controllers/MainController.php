<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(){
		$users = User::all();
		return view('users.index', compact('users'));
	}

	public function testing()
	{
		$user = User::find(76);
		//var_dump(User::find(299)->isStudent());
		return view('frontend.test', compact('user'));
	}
}
