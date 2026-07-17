<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smarthub.com',
            'phone' => '08123456789',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}