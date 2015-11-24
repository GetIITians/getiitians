<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teachers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'home_tuition',
		'language',
		'experience',
		'resume'
	];

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
	 * Get the Topics associated with the given Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function topics()
	{
		return $this->belongsToMany('App\Topic')->withTimestamps()->withPivot('fees');
	}

	/**
	 * Get the Qualifications for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function qualifications()
	{
		return $this->hasMany('App\Qualification');
	}

	/**
	 * Get the Timeslots for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function timeslots()
	{
		return $this->hasMany('App\Timeslot');
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

	/**
	 * Get the Chats for this Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function chats()
	{
		return $this->hasMany('App\Chat');
	}

	/**
	 * Get the Reviews for this Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	/**
	 * Get the Demos associated with this Teacher.
	 */
	public function demos()
	{
		return $this->hasMany('App\Demo');
	}
}
