<?php

namespace App\Http;

class Flash
{
	public function message($message)
	{
		return session()->flash('flashMessage',$message);
	}
}