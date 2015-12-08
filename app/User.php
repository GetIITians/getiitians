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
		'gender',
		'image_url',
		'date_of_birth',
		'address_country',
		'address_city',
		'address_state',
		'address_pin',
		'phone',
		'confirmed',
		'confirmation_code',
		'remember_token'
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
	 * Get the Roles for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function roles()
	{
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	/**
	 * Get the Topics for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function topics()
	{
		return $this->belongsToMany('App\Topic')->withTimestamps()->withPivot('fees');
	}

	/**
	 * Get the Qualifications for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function qualifications()
	{
		return $this->hasMany('App\Qualification');
	}

	/**
	 * Get the Timeslots for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function timeslots()
	{
		return $this->hasMany('App\Timeslot');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teachersessions()
	{
		return $this->hasMany('App\Session', 'teacher_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function studentsessions()
	{
		return $this->hasMany('App\Session', 'student_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teacherreviews()
	{
		return $this->hasMany('App\Review', 'teacher_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function studentreviews()
	{
		return $this->hasMany('App\Review', 'student_id');
	}

	/**
	 * Get the Transactions for the User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function info()
	{
		return $this->hasOne('App\Info');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teacherdemos()
	{
		return $this->hasMany('App\Demo', 'teacher_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function studentdemos()
	{
		return $this->hasMany('App\Demo', 'student_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function teacherchats()
	{
		return $this->hasMany('App\Chat', 'teacher_id');
	}

	/**
	 * Get the Classes for the Teacher.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function studentchats()
	{
		return $this->hasMany('App\Chat', 'student_id');
	}

}
