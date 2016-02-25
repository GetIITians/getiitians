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
		'address_country',
		'address_city',
		'address_state',
		'address_pin',
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
	protected $dates = ['deleted_at'];

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
        return $this->morphTo();
    }

}