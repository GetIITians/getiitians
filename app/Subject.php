<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subjects';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'fees'
	];

	/**
	 * Get the Subjects for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function topics()
	{
		return $this->hasMany('App\Topic');
	}

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function grade()
	{
		return $this->belongsTo('App\Grade');
	}

}