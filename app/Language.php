<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'languages';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'language'
	];

	/**
	 * Get the Topics for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teachers()
	{
		return $this->belongsToMany('App\Teacher');
	}

}