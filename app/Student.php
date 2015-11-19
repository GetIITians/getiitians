<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
	 * Get Student's corresponding User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function users()
	{
		return $this->morphMany('App\User', 'deriveable');
	}

	/**
	 * Get the Classes for the Student.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}

	/**
	 * Get the Chats for this Student.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function chats()
	{
		return $this->hasMany('App\Chat');
	}

	/**
	 * Get the Reviews for this Student.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	/**
	 * Get the Demos associated with this Student.
	 */
	public function demos()
	{
		return $this->hasMany('App\Demo');
	}
}
