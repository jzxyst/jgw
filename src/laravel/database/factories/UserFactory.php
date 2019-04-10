<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Enums\Sex;

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

$factory->define(\App\Orm\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name1' => $faker->firstName,
        'name2' => $faker->lastName,
        'sex_id' => \App\Orm\Sex::where('sex_code', Sex::getRandomValue())->first(),
        'password' => $faker->password,
        'unique_id' => $faker->unique()->md5,
        'email_verified_at' => now(),
    ];
});
