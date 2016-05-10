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
Route::match(['get', 'post'], 'teachers', 'TeacherController@search');
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
Route::group(['prefix' => 'profile/{user}', 'middleware' => 'book'], function () {
	Route::get('book', 'ProfileController@book');
	Route::post('book', 'ProfileController@bookClass');
	Route::get('slots', 'ProfileController@slots');
});


Route::group(['prefix' => 'profile/{user}','middleware' => 'self'], function () {
	Route::get('classes', 'ProfileController@classes');
	Route::get('messages', 'ProfileController@messages');
	Route::post('message', 'ProfileController@postMessage');
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
Route::group(['prefix' => 'profile/{user}/update', 'middleware' => 'self'], function () {
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
		$topicsDetail = Cache::remember('topicsDetail', Carbon\Carbon::now()->addDay(), function() {
			$topicsDetail = [] ;
			$grades = App\Grade::all();
			foreach ($grades as $gradeKey => $grade) {
				$topicsDetail[$gradeKey]['name'] = $grade->name;
				foreach ($grade->subjects as $subjectsKey => $subject) {
					$topicsDetail[$gradeKey]['subjects'][$subjectsKey]['name'] = $subject->name;
					foreach ($subject->topics as $topicsKey => $topic) {
						$topicsDetail[$gradeKey]['subjects'][$subjectsKey]['topics'][$topicsKey]['name'] = $topic->name;
						$topicsDetail[$gradeKey]['subjects'][$subjectsKey]['topics'][$topicsKey]['id'] = $topic->id;
					}
				}
			}
			return $topicsDetail;
		});
		$teacherTopics = [] ;
		foreach ($user->deriveable->topics as $key => $topic) {
			$teacherTopics[] = $topic->id;
		}
		return view('frontend.profile.update.subjects', ['user' => $user, 'page' => 'profile', 'subjects' => $topicsDetail, 'teacherTopics' => $teacherTopics]);
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

Route::get('dashboard', 'DashboardController@index');
Route::post('dashboard/update/{teacher}/display', 'DashboardController@updateDisplay');
Route::get('dashboard/{user}', function(App\User $user){
		return view('dashboard.view', ['page' => 'dashboard', 'user' => $user, 'teacher' => $user->deriveable]);
});
