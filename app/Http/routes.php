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

Route::get('/', function () {
    return view('frontend.index', ['page' => 'home']);
});

Route::get('teachers', 'TeacherController@show');
Route::post('teachers', 'TeacherController@show');

Route::post('teachers/message', 'TeacherController@postMessage');
Route::get('teachers/message', 'TeacherController@getMessage');

Route::post('teachers/enquiry', 'TeacherController@postEnquiry');
Route::get('teachers/enquiry', 'TeacherController@getEnquiry');

Route::get('contact', function (){
	return view('frontend.contact', ['page' => 'contact']);
});
Route::post('contact', 'TeacherController@postContact');

Route::get('test', function(){
	return view('frontend.test');
});

Route::post('teachers/call', 'TeacherController@postCall');

/*
Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
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
