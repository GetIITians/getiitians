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
		'image_url' => str_random(20),
		'gender' => 'male',
		'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
		'address_country' => $faker->country,
		'address_city' => $faker->city,
		'address_state' => $faker->state,
		'address_pin' => $faker->postcode,
		'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
		'confirmed' => 1,
    ];
});