<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Income;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Income::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=5),
        'received_for' => 'Salary',
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min=500, $max=3000),
        'sender' => 'Workplace',
        'created_at' => now(),
    ];
});
