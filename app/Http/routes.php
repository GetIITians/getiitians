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
//  Contact Us
Route::get('about', function (){
	return view('frontend.about', ['page' => 'about']);
});
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
	Route::get('book', 'ProfileController@book');
	Route::get('slots', 'ProfileController@slots');
});

//  Enquiry Messages
Route::post('teachers/message', 'TeacherController@postMessage');
Route::post('teachers/enquiry', 'TeacherController@postEnquiry');
Route::post('contact', 'TeacherController@postContact');
Route::post('teachers/call', 'TeacherController@postCall');
//  Contact Us
Route::get('contact', function (){
	return view('frontend.contact', ['page' => 'contact']);
});


//  Profile - Login
Route::group(['middleware' => 'auth', 'prefix' => 'profile/{user}/update'], function () {
  Route::get('personal', function (App\User $user){
		return view('frontend.profile.update.personal', ['user' => $user, 'page' => 'profile']);
  });
  Route::post('personal', 'ProfileController@updatePersonal');
	Route::post('personal/picture', 'ProfileController@updateProfilePic');
	Route::get('qualification', function (App\User $user){
		$languages = App\Language::lists('language','id');
		return view('frontend.profile.update.qualification', ['user' => $user, 'page' => 'profile', 'languages' => $languages]);
  });
  Route::post('qualification', 'ProfileController@updateQualification');
	Route::get('subjects', function (App\User $user){
		return view('frontend.profile.update.subjects', ['user' => $user, 'page' => 'profile', 'subjects' => App\Grade::all()]);
  });
	Route::post('subjects', 'ProfileController@updateSubjects');
	Route::get('timeslots', function (App\User $user){
		return view('frontend.profile.update.timeslots', ['user' => $user, 'page' => 'profile']);
  });
	Route::post('timeslots', 'ProfileController@updateTimeslots');
});
//  Testing
Route::get('test', function(){
	return view('frontend.test');
});
Route::get('testing', 'MainController@testing');

//Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
//Registration routes...
Route::get('signup', 'Auth\AuthController@getRegister');
Route::post('signup', 'Auth\AuthController@postRegister');
Route::get('signup/confirm/{token}', 'Auth\AuthController@confirmEmail');

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
