<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create role if not exists
        $role = Role::firstOrCreate(['name' => 'super_admin']);

        // Create user
        $user = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'), // Ganti kalau perlu
        ]);

        // Assign role to user
        $user->assignRole($role);
    }
}
