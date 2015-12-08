<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{

	use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
		$this->visit('auth/register')
			->type('John Doe', 'name')
			->type('hello1@in.com', 'email')
			->type('hello1', 'password')
			->type('hello1', 'password_confirmation')
			->press('SIGNUP')
			->seePageIs('/');
    }
}
