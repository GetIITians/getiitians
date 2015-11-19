<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
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
		return $this->belongsTo('App\Teacher');
	}

	/**
	 * Get the Student that owns the Session.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function student()
	{
		return $this->belongsTo('App\Student');
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
