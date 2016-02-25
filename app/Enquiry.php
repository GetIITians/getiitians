<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'enquiries';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'class',
		'subject',
		'topic',
		'enquiry',
		'email',
		'phone'
	];

}