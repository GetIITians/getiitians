<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
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
