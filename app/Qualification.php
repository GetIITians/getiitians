<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'qualifications';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'college',
		'degree',
		'branch',
		'passout',
		'verification'
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at','updated_at','passout'];


	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

}
