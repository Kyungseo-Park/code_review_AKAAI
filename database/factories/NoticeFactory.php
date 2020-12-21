<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notice;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Notice::class, function (Faker $faker) {
    return [
        'title'         => $faker->title,
        'body'          => $faker->text,
        'user_id'       => DB::table('users')->inRandomOrder()->first()->id,
    ];
});
