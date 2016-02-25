<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sessions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'link',
		'wiziq_id',
		'demo'
	];

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\Student');
	}

	/**
	 * Get the Classes for the Teacher.
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
	public function topic()
	{
		return $this->belongsTo('App\Topic');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function review()
	{
		return $this->hasOne('App\Review');
	}

}