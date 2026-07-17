<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smarthub.com',
            'phone' => '081111111111',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@smarthub.com',
            'phone' => '081222222222',
            'role' => 'member',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Siti Rahma',
            'email' => 'siti@smarthub.com',
            'phone' => '081333333333',
            'role' => 'member',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Andi Wijaya',
            'email' => 'andi@smarthub.com',
            'phone' => '081444444444',
            'role' => 'member',
            'password' => Hash::make('password'),
        ]);
    }
}