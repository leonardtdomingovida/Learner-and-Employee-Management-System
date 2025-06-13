<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Example: fetch role IDs from tblroles
        $adminRole = \DB::table('tblroles')->where('name', 'admin')->first();
        $employeeRole = \DB::table('tblroles')->where('name', 'employee')->first();
        $learnerRole = \DB::table('tblroles')->where('name', 'learner')->first();

        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('p@ssword'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        // Employee User
        User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('p@ssword'),
            'role_id' => $employeeRole->id,
            'email_verified_at' => now(),
        ]);

        // Learner User
        User::create([
            'name' => 'Learner User',
            'email' => 'learner@example.com',
            'password' => Hash::make('p@ssword'),
            'role_id' => $learnerRole->id,
            'email_verified_at' => now(),
        ]);
    }
}
