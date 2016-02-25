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
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

}