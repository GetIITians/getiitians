<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'users';

  protected $types = array('App\Student' => 'student', 'App\Teacher' => 'teacher');

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
		'name',
		'email',
		'password',
		'picture',
		'gender',
		'image_url',
		'date_of_birth',
		'introduction',
		'country',
		'city',
		'state',
		'pin',
		'phone',
		'email_confirmed',
		'email_confirmation_code',
		'phone_confirmed',
		'phone_confirmation_code',
		'remember_token',
		'deriveable_id',
		'deriveable_type'
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at','updated_at','deleted_at','date_of_birth'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

	/**
	 * Get the Transactions for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function transactions()
	{
		return $this->hasMany('App\Transaction');
	}

	/**
   * Get all of the owning deriveable models.
   */
  public function deriveable()
  {
    return $this->morphTo(); // polymorphic belongsTo
  }


  //  Helper Functions
	public function typeOfUser()
	{
		return $this->types[$this->deriveable_type];
	}

	public function isTeacher()
	{
		return ($this->deriveable_type === 'App\Teacher');
	}

	public function isStudent()
	{
		return ($this->deriveable_type === 'App\Student');
	}

	public function ownProfile()
	{
		if (!Auth::Guest())
			return ($this->id === Auth::user()->id);
		return false;
	}


}
