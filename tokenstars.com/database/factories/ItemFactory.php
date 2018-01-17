<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'date_end' => $faker->dateTimeBetween('now', '+1 month'),
        'state' => 'new'
    ];
});
