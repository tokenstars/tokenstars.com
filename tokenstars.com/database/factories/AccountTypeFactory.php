<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Accounts\AccountType::class, function (Faker $faker) {
    return [
        'name' => App\Models\Accounts\AccountType::BANK_ACCOUNT_NAME,
    ];
});
