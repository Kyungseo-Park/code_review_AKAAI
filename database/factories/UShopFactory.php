<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UShop;
use Faker\Generator as Faker;

$factory->define(UShop::class, function (Faker $faker) {
    return [
        'thumbnail' => "https://via.placeholder.com/750x500/$faker->hexColor/$faker->hexColor?Text=$faker->country/",
        'title'     => $faker->title,
        'body'      => $faker->text,
        'href'      => '/',
        'user_id'   => DB::table('users')->inRandomOrder()->first()->id,
        // 'start_date' => date("yy-mm-dd HH:mm:ss"),
        // 'end_date' => date("yy-mm-dd HH:mm:ss", strtotime("2022-01-01")),
    ];
});