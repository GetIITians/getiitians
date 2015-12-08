<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'class',
		'subject',
		'topic'
	];

	/**
	 * Get the teachers associated with the given Topic
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany('App\User')->withTimestamps()->withPivot('fees');
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
