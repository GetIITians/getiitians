<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

	public function before(User $user)
	{
		return $user->isSuperadmin();
	}

	public function see(User $user, $id)
	{
		return $id == $user->id;
	}

}