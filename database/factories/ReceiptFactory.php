<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Receipt;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

$factory->define(Receipt::class, function (Faker $faker) {
    return [
        'name' => $faker->name.Str::random(15),
        'email' => Str::random(5).$faker->email,
        'class' => $faker->company,
        'tel'  => mt_rand(99, 1000).'-'.mt_rand(999, 10000).'-'.mt_rand(999, 10000),
        'user_id'       =>  DB::table('users')->inRandomOrder()->first()->id,
        'education_id'  =>  DB::table('educations')->inRandomOrder()->first()->id,
    ];
});
            