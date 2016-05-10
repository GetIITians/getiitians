<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\User;

class StudentVisitingTeacher
{
  /**
   * The Guard implementation.
   *
   * @var Guard
   */
  protected $auth;

  /**
   * Create a new filter instance.
   *
   * @param  Guard  $auth
   * @return void
   */
  public function __construct(Guard $auth)
  {
      $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  \App\User  $user
   * @return mixed
   */
  public function handle($request, Closure $next)
  {

      if (!$this->auth->guest() AND $this->auth->user()->isStudent())
          return $next($request);

      return redirect('/profile/'.$request->route('user')->id);

  }
}
