<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timeslots';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'teacher_id',
		'start_time'
	];

	/**
	 * Get the Teacher that owns the Timeslot.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

}
