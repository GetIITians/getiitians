<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timeslots';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'slot'
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['slot'];

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function session()
	{
		return $this->belongsTo('App\Session');
	}

}
