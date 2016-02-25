<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

	/**
	 * Get Teacher's corresponding User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function users()
	{
		return $this->morphMany('App\User', 'deriveable');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function chats()
	{
		return $this->hasMany('App\Chat');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}

}