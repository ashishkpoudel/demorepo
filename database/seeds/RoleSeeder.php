<?php

use App\Domain\Accounts\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('user.role') as $role) {
            factory(Role::class)->create([
                'name' => $role['name'],
                'slug' => $role['slug']
            ]);
        }
    }
}
