<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'home_tuition',
		'language',
		'experience',
		'resume',
	];

	/**
	 * Get the Teacher that owns the Info.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
