<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grades';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * Get the Subjects for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function subjects()
	{
		return $this->hasMany('App\Subject');
	}

}