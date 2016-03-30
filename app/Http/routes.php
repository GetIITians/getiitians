<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//  Home Page
Route::get('/', function () { return view('frontend.index', ['page' => 'home']); });
//  Search Page
Route::get('teachers', 'TeacherController@search');
Route::post('teachers', 'TeacherController@search');
//  Profile - Guest
Route::group(['prefix' => 'profile/{user}'], function () {
  Route::get('/', function(App\User $user){
    return view('frontend.profile.index', ['page' => 'profile', 'user' => $user]);
  });
  Route::get('topics', 'ProfileController@topics');
  Route::get('schedule', 'ProfileController@schedule');
  Route::get('schedule/{month}', 'ProfileController@schedule');
  Route::get('schedule/{month}/{year}', 'ProfileController@schedule');
});
//  Profile - Login
/*
Route::group(['middleware' => 'auth', 'prefix' => 'profile/{user}/update'], function () {
  Route::get('personal', function (App\User $user){
    return view('frontend.profile.update.personal', ['user' => $user, 'page' => 'profile']);
  });
  Route::post('personal', 'ProfileController@updatePersonal');
});
*/
//  Enquiry Messages
Route::post('teachers/message', 'TeacherController@postMessage');
Route::post('teachers/enquiry', 'TeacherController@postEnquiry');
Route::post('contact', 'TeacherController@postContact');
Route::post('teachers/call', 'TeacherController@postCall');
//  Contact Us
Route::get('contact', function (){
	return view('frontend.contact', ['page' => 'contact']);
});
//  Testing
Route::get('test', function(){
	return view('frontend.test');
});
Route::get('testing', 'MainController@testing');
/*
//Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
//Registration routes...
Route::get('signup', 'Auth\AuthController@getRegister');
Route::post('signup', 'Auth\AuthController@postRegister');
Route::get('signup/confirm/{token}', 'Auth\AuthController@confirmEmail');
*/
/*
Route::get('test/{user}', 'ProfileController@test');
//	www.getiitians.com/profile/5
Route::get('profile/{user}', function(App\User $user){
	return view('frontend.profile.index', ['user' => $user]);
});

Route::get('auth/register/confirm/{token}', 'Auth\AuthController@confirmEmail');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password'	=>	'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth', 'prefix' => 'profile/{user}/update'], function () {
	//	www.getiitians.com/profile/4/update/personal
	Route::get('personal', function (App\User $user){
		return view('frontend.profile.update.personal', ['user' => $user, 'info' => $user->info]);
	});
	Route::post('personal', 'UserController@update');
	Route::post('info', 'InfoController@update');

	//	www.getiitians.com/profile/4/update/qualification
	Route::get('qualification', function (App\User $user){
		return view('frontend.profile.update.qualification', ['user' => $user]);
	});
	Route::post('qualifications', 'ProfileController@postQualifications');

});
*/
//Route::resource('demo', 'DemoController');
