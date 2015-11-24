<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'chats';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'teacher_id',
		'student_id',
		'message'
	];

	/**
	 * Get the Teacher that owns this Chat.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

	/**
	 * Get the Student that owns this Chat.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\Student');
	}
}
