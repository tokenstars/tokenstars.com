<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Accounts\Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => "LTCT",
        'is_active' => true,
        'is_fiat' => false
    ];
});
