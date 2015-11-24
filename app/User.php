<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'email',
		'password',
		'gender',
		'date_of_birth',
		'address_country',
		'address_city',
		'address_state',
		'address_pin',
		'phone',
		'deriveable_id',
		'deriveable_type',
		'remember_token'
	];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	/**
	 * Get all of the owning deriveable models.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function deriveable()
	{
		return $this->morphTo();
	}

	/**
	 * Get the Transactions for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function transactions()
	{
		return $this->hasMany('App\Transaction');
	}

}
