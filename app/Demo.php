<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'demos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'teacher_id',
		'student_id',
		'session_id'
	];

	/**
	 * Get the Session that owns the Demo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function session()
	{
		return $this->belongsTo('App\Session');
	}

	/**
	 * Get the Student that owns the Demo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\User', 'student_id');
	}

	/**
	 * Get the Teacher that owns the Demo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\User', 'teacher_id');
	}
}
