<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Accounts\Models\Role;

use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    $role = $faker->unique()->randomElement(config('user.role'));

    return [
        'name' => $role['name'],
        'slug' => $role['slug'],
    ];
});
