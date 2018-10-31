<?php

use Faker\Generator as Faker;
use App\Article;


$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->title,
        'content' => $faker->text,
    ];
});
