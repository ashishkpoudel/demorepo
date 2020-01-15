<?php

use Faker\Factory;

$faker = Factory::create('en_US');

return [
    'community-manager' => function() use ($faker) {
        return [
            'bank_name' => $faker->text(10),
            'bank_account_number' => $faker->bankAccountNumber
        ];
    }
];
