<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(News::class, function (Faker $faker) {
    return [
        'thumbnail' => '"https://via.placeholder.com/750x500/$faker->hexColor/$faker->hexColor?Text=$faker->country/"',
        'title' => $faker->title,
        'body' => $faker->text,
        'user_id'       =>  DB::table('users')->inRandomOrder()->first()->id,
    ];
});
