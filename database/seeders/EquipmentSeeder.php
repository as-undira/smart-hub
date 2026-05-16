<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Equipment::create([
            'name' => 'Sony A7',
            'category' => 'Camera',
            'condition' => 'good',
            'status' => 'available'
        ]);

        Equipment::create([
            'name' => 'Canon R6',
            'category' => 'Camera',
            'condition' => 'good',
            'status' => 'available'
        ]);

        Equipment::create([
            'name' => 'MacBook Pro',
            'category' => 'Laptop',
            'condition' => 'good',
            'status' => 'available'
        ]);

        Equipment::create([
            'name' => 'Dell XPS',
            'category' => 'Laptop',
            'condition' => 'good',
            'status' => 'available'
        ]);

        Equipment::create([
            'name' => 'Epson Projector',
            'category' => 'Projector',
            'condition' => 'good',
            'status' => 'available'
        ]);
    }
}