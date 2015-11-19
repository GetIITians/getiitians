<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
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
