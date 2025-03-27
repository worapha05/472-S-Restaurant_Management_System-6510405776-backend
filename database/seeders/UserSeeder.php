<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'phone_number' => '0123456789',
                'role' => 'ADMIN',
                'address' => '123 Admin St.',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@staff.com',
                'username' => 'staff',
                'password' => Hash::make('123'),
                'phone_number' => '0987654321',
                'role' => 'STAFF',
                'address' => '456 Staff Ave.',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@user.com',
                'username' => 'user',
                'password' => Hash::make('123'),
                'phone_number' => '0112233445',
                'role' => 'USER',
                'address' => '789 User Blvd.',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
