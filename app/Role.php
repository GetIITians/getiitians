<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'description',
	];

	/**
	 * The users that belong to the role.
	 */
	public function users()
	{
		return $this->belongsToMany('App\User')->withTimestamps();
	}
}
