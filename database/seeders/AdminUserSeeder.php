<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //// Create Super Admin
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@airparq.com',
            'password' => Hash::make('++Team@@11@@'), // Use a strong password in production
            'role' => 'admin',
        ]);

    }
}
