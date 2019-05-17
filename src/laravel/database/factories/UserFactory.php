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
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'sex_id' => Sex::getRandomValue(),
        'password' => \App\Model\User::hashPassword($faker->password),
        'unique_id' => \App\Model\User::generateUniqueId(),
        'email_verified_at' => now(),
    ];
});
