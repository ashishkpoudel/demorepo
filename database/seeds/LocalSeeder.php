<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('migrate:fresh');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
