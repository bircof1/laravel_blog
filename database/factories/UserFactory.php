<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'rank_id'=>3,
        'title'=>$faker->title,
        'name' =>$faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'firstName'=>$faker->firstName,
        'lastName'=>$faker->lastName,
        'email_verified_at' => now(),
        'password' =>'secret', // password
        // 'remember_token' => Str::random(10),
    ];
});