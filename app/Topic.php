<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	/**
	 * Get the teachers associated with the given Topic
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function teachers()
	{
		return $this->belongsToMany('App\Teacher')->withTimestamps()->withPivot('fees');
	}

	/**
	 * Get the Classes for the Topic.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}

}
