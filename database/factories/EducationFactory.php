<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Education;
use Faker\Generator as Faker;

$factory->define(Education::class, function (Faker $faker) {
    return [
        'thumbnail' => "https://via.placeholder.com/750x500/$faker->hexColor/$faker->hexColor?Text=$faker->country/",
        'title' => $faker->title,
        'subtitle' => $faker->company,
        'body' => $faker->text,
        'recruitment_personnel' => rand(10,100),
        'start_date' => now(),
        'end_date' => date("Y-m-d H:i:s", strtotime("+1 years")),
    ];
});