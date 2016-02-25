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
		'name'
	];

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function subject()
	{
		return $this->belongsTo('App\Subject');
	}

	/**
     * The users that belong to the topic.
     */
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher')->withTimestamps();
    }

	/**
	 * Get the User that that this Session belongsTo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}

}