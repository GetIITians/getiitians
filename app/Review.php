<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'review',
		'rating',
		'admin_approval',
		'teacher_approval',
		'student_likes',
		'student_likes_total'
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
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function session()
	{
		return $this->belongsTo('App\Session');
	}

}