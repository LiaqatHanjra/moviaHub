<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a regular user
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'admin' => 0,
            'status' => 1,
        ]);

        // Create a profile for the regular user
        Profile::create([
            'user_id' => $regularUser->id,  
            'image' => null,
        ]);

        // Create an admin user and assign to $adminUser
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            'admin' => 1,
            'email_verified_at' => now(),
            'status' => 1,
        ]);

        // Create a profile for the admin user
        Profile::create([
            'user_id' => $adminUser->id,  
            'image' => null,
        ]);
    }
}
