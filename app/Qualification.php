<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'qualifications';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'teacher_id',
		'college',
		'degree',
		'verification'
	];

	/**
	 * Get the Teacher that owns the Qualification.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}
}
