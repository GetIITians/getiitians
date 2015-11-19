<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	/**
	 * Get Admin's corresponding User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function users()
	{
		return $this->morphMany('App\User', 'deriveable');
	}

}
