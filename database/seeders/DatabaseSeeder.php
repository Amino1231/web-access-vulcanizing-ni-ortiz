<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
        {
            // Create roles if not already seeded
            $adminRole = Role::firstOrCreate(['name' => 'admin']);
            $shopOwnerRole = Role::firstOrCreate(['name' => 'shop-owner']);
            $customerRole = Role::firstOrCreate(['name' => 'customer']);

            // Admin account
            $admin = User::firstOrCreate(
                ['email' => 'admin@example.com'],
                [
                    'name' => 'Admin User',
                    'password' => Hash::make('password123'),
                ]
            );
            $admin->assignRole($adminRole);

            // Shop Owner account
            $shopOwner = User::firstOrCreate(
                ['email' => 'owner@example.com'],
                [
                    'name' => 'Shop Owner User',
                    'password' => Hash::make('password123'),
                ]
            );
            $shopOwner->assignRole($shopOwnerRole);

            // Employee account
            $customer = User::firstOrCreate(
                ['email' => 'employee@example.com'],
                [
                    'name' => 'Employee User',
                    'password' => Hash::make('password123'),
                ]
            );
            $customer->assignRole($customerRole);
        }
}
