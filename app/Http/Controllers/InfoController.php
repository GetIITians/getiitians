<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Info;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Info::create($request->all());
		return redirect('/profile/'.$request->user()->id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		if($request->user()->info()->get()->isEmpty())
		{
			$this->store($request);
		}
		else
		{
			$request->user()->info()->update($request->all());
			flash('Your information has been updated.');
			return redirect('/profile/'.$request->user()->id);
		}
	}

}
