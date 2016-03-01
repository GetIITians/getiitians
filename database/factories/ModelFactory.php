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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('getIITians'),
        'picture' => $faker->imageUrl($width = 640, $height = 480),
		'gender' => 'male',
		'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
		'address_country' => $faker->country,
		'address_city' => $faker->city,
		'address_state' => $faker->state,
		'address_pin' => $faker->postcode,
		'introduction' => $faker->text($maxNbChars = 250),
		'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
        'email_confirmed' => 1,
        'email_confirmed_code' => $faker->md5(),
        'phone_confirmed' => 1,
        'phone_confirmed_code' => $faker->md5(),
    ];
});

$factory->define(App\Teacher::class, function (Faker\Generator $faker) {
	return [
		'home_tuition' => '1',
		'language' => '["English","Hindi","Punjabi"]',
		'experience' => $faker->numberBetween($min = 0, $max = 20),
		'minfees' => $faker->biasedNumberBetween($min = 500, $max = 1200, $function = 'sqrt'),
		'resume' => str_random(20),
	];
});

$factory->define(App\Qualification::class, function (Faker\Generator $faker) {
	return [
		'college' => $faker->company(),
		'degree' => $faker->jobTitle(),
		'branch' => $faker->bs(),
		'passout' => $faker->dateTimeThisCentury->format('Y-m-d'),
		'verification' => str_random(20),
	];
});