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
		'student_id',
		'session_id',
		'teacher_id',
		'review',
		'rating',
		'admin_approval',
		'teacher_approval',
		'student_likes',
		'student_likes_total'
	];

	/**
	 * Get the Session that owns the Review.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function session()
	{
		return $this->belongsTo('App\Session');
	}

	/**
	 * Get the Student that owns the Review.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\User', 'student_id');
	}

	/**
	 * Get the Teacher that owns the Review.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\User', 'teacher_id');
	}
}
