<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
        ->count(10)
        ->create();
        $role = Role::findByName('user');
        $role->users()->attach($users);

        $admins = User::factory()
        ->count(2)
        ->create();
        $role = Role::findByName('superadmin');
        $role->users()->attach($admins);
    }
}
