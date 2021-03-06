<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Teacher;
use App\Student;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mailers\AppMailer;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	private $maxLoginAttempts = 10;

	protected $redirectPath = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
			'signuptype' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $parent = ($data['signuptype'] === 'teacher') ? new Teacher() : new Student();
  		$parent->save();

  		$user = new User();
  		$user->name = $data['name'];
  		$user->email = $data['email'];
  		$user->password = bcrypt($data['password']);
  		$user->email_confirmation_code = str_random(30);

  		$parent->user()->save($user);

  		return $user;
    }

	protected function authenticated(Request $request, User $user)
	{
		return redirect()->intended('/profile/'.$user->id);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request, AppMailer $mailer)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		$user = $this->create($request->all());

		$mailer->sendEmailConfirmationTo($user);

		flash('Thanks for signing up! Please confirm your email address.');

		return redirect()->back();
	}

	/**
	 * Confirm a user's email address.
	 *
	 * @param  string $token
	 * @return mixed
	 */
	public function confirmEmail($token)
	{
		$user = User::whereEmailConfirmationCode($token)->firstOrFail();
		$user->email_confirmed = 1;
		$user->email_confirmation_code = null;
		$user->save();
		$this->emailAdmin($user);
		flash('You are now confirmed. Please login.');
		return redirect('/login');
	}

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	protected function getCredentials(Request $request)
	{
		$credentials = $request->only($this->loginUsername(), 'password');

		return array_add($credentials, 'email_confirmed', '1');
	}

	/**
	 * Alert the admin about a new user signup.
	 *
	 * @param  \App\User  $user
	 */
	protected function emailAdmin(User $user)
    {
        Mail::send(
                'emails.userSignup',['user' => $user],
                function ($message) {
                    $message->from('narayanwaraich@gmail.com', 'getIITians');
                    $message->to('getiitians@gmail.com')->subject('User signup alert');
                });
    }

}
