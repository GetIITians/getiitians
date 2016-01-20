<?php

function flash($message = null)
{
	$flash = app('App\Http\Flash');
	if(func_num_args() == 0)
		return $flash;
	return $flash->message($message);
}

function authDetails()
{
	return [
		'user' 	=> Auth::user(),
		'id'	=> Auth::user()->id
	];
}