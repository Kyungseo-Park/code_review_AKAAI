<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thumbnail;
use Faker\Generator as Faker;

$factory->define(Thumbnail::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'subtitle' => $faker->country,
        'button' => $faker->city,
        'src_default' => "https://via.placeholder.com/1200x600/$faker->hexColor/$faker->hexColor?Text=$faker->country/",
        'href' => '/',
    ];
});