<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->name . ' High School',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'district' => $faker->word,
    ];
});

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'school_id' => function () {
            return factory(\App\School::class)->create()->id;
        },
    ];
});

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'school_id' => function () {
            return factory(\App\School::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'short_name' => $faker->firstName,
        'graduation_year' => $faker->year,
        'gender' => $faker->randomElement(['F','M']),
    ];
});

$factory->define(App\Match::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});