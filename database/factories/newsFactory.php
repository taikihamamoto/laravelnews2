<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\article;
use Faker\Generator as Faker;

$factory->define(article::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'text' => $faker->realText
    ];
});
