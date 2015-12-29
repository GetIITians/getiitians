<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->defineAs(App\User::class, 'user1', function () {
    return [
        'name' => 'Narayan Waraich',
        'email' => 'narayanwaraich@gmail.com',
        'password' => bcrypt('getIITians'),
		'image_url' => str_random(20),
		'gender' => 'male',
		'date_of_birth' => '1989-12-04',
		'address_country' => 'India',
		'address_city' => 'Chandigarh',
		'address_state' => 'Haryana',
		'address_pin' => '160015',
		'phone' => '9015410410',
        'remember_token' => null,
		'confirmed' => 1,
    ];
});

$factory->defineAs(App\User::class, 'user2', function () {
	return [
		'name' => 'Narayan Singh Waraich',
		'email' => 'narayansinghwaraich@gmail.com',
		'password' => bcrypt('getIITians'),
		'image_url' => str_random(20),
		'gender' => 'male',
		'date_of_birth' => '1989-12-04',
		'address_country' => 'India',
		'address_city' => 'Chandigarh',
		'address_state' => 'Haryana',
		'address_pin' => '160015',
		'phone' => '9015410410',
		'remember_token' => null,
		'confirmed' => 1,
	];
});


$factory->defineAs(App\Role::class, 'roleStudent', function () {
	return [
		'name' => 'student',
		'description' => 'For Online & Home Tution students.',
	];
});

$factory->defineAs(App\Role::class, 'roleTeacher', function () {
	return [
		'name' => 'teacher',
		'description' => 'For Online & Home Tution teacher.',
	];
});

$factory->defineAs(App\Role::class, 'roleAdmin', function () {
	return [
		'name' => 'admin',
		'description' => 'For Mid-level admins or employees.',
	];
});

$factory->defineAs(App\Role::class, 'roleSuperadmin', function () {
	return [
		'name' => 'superadmin',
		'description' => 'For superadmin, who can add or remove admins.',
	];
});