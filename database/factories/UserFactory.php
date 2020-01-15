<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
<<<<<<< HEAD

use App\Domain\Accounts\Models\{User, Role};

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;
=======
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
>>>>>>> initial

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => time() . $faker->randomNumber(3),
        'email_verified_at' => Carbon::now()->toDateTimeString(),
        'password' => '$2y$10$MDTvv4V23z0aCraFCkJo6.qTAq2DsI8pJqhnwIz6uqPmLG4LOuody', // secret
        'confirmation_code' => Str::random(5),
        'confirmed_at' => Carbon::now()->toDateTimeString(),
        'api_token' => Str::random(16),
        'remember_token' => Str::random(10),
    ];
});

$factory
    ->state(User::class, 'suspended', function() {
        return [
            'suspended_at' => Carbon::now()->toDateTimeString()
        ];
    });

$factory
    ->state(User::class, 'admin', [])
    ->afterCreatingState(User::class, 'admin', function(User $user) {
        $role = factory(Role::class)->create(['name' => 'Admin', 'slug' => 'admin']);
        $user->roles()->attach($role->id);
    });
=======
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
>>>>>>> initial
