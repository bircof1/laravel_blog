<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\Post;
use Faker\Generator as Faker;


$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(35),
        'category_id'=>rand(1,3),
        'body'=>$faker->text(500),
    ];
});
