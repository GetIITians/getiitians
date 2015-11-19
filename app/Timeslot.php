<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
	/**
	 * Get the Teacher that owns the Timeslot.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

}
