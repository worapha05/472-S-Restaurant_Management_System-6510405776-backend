<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 21; $i++) {
            if ($i == 1 || $i == 3 || $i == 5) {
                User::factory()->create(['role' => 'ADMIN']);
            } else {
                User::factory()->create();
            }
        }
    }
}
