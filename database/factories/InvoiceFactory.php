<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=5),
        'object' => $faker->word(),
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min=1.00, $max=600.00),
        'recipient' => $faker->company(),
        'created_at' => now(),
    ];
});
