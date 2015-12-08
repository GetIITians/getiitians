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
		'topic_id',
		'teacher_id',
		'student_id',
		'start_time',
		'duration',
		'link',
		'wiziq_id'
	];

	/**
	 * Get the Topic that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function topic()
	{
		return $this->belongsTo('App\Topic');
	}

	/**
	 * Get the Teacher that owns the Session.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\User','teacher_id');
	}

	/**
	 * Get the Student that owns the Session.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\User','student_id');
	}

	/**
	 * Get the Transaction associated with the Session.
	 */
	public function transaction()
	{
		return $this->hasOne('App\Transaction');
	}

	/**
	 * Get the Review associated with this Session.
	 */
	public function review()
	{
		return $this->hasOne('App\Review');
	}

	/**
	 * Get the Demo associated with this Session.
	 */
	public function demo()
	{
		return $this->hasOne('App\Demo');
	}
}
