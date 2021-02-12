<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'short_text' => $faker->sentence,
        'text' => $faker->paragraph,
        'image' => '/storage/images/' . $faker->image('public/storage/images', 640, 480, null, false),
    ];
});
