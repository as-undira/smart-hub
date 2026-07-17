<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Equipment::insert([
            [
                'code' => 'EQ001',
                'name' => 'Sony A6400',
                'description' => 'Mirrorless Camera',
                'stock' => 3,
                'condition' => 'good',
                'max_duration_days' => 7,
            ],
            [
                'code' => 'EQ002',
                'name' => 'Shure SM7B',
                'description' => 'Podcast Microphone',
                'stock' => 4,
                'condition' => 'good',
                'max_duration_days' => 7,
            ],
            [
                'code' => 'EQ003',
                'name' => 'LED Lighting',
                'description' => 'Studio Light',
                'stock' => 6,
                'condition' => 'good',
                'max_duration_days' => 7,
            ],
            [
                'code' => 'EQ004',
                'name' => 'Mac Studio',
                'description' => 'Editing Computer',
                'stock' => 2,
                'condition' => 'good',
                'max_duration_days' => 7,
            ],
            [
                'code' => 'EQ005',
                'name' => 'Mixer Yamaha',
                'description' => 'Audio Mixer',
                'stock' => 2,
                'condition' => 'good',
                'max_duration_days' => 7,
            ],
        ]);
    }
}