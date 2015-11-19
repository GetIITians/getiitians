<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
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
		return $this->belongsTo('App\Student');
	}

	/**
	 * Get the Teacher that owns the Demo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}
}
