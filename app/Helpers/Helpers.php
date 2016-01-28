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

/**
 * Returns $output if $A is equal to $A
 *
 * @param 	string $A
 * @param 	string $B
 * @param 	string $output
 * @return	string $output
 */
function matchValue($A,$B,$output)
{
	return ($A===$B) ? $output : '' ;
}