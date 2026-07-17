<?php

namespace Database\Seeders;

use App\Models\Workspace;
use Illuminate\Database\Seeder;

class WorkspaceSeeder extends Seeder
{
    public function run(): void
    {
        Workspace::insert([
            [
                'code' => 'WS001',
                'name' => 'Podcast Studio',
                'description' => 'Studio untuk podcast dan recording.',
                'capacity' => 4,
                'location' => 'Lantai 1',
                'max_duration_hours' => 8,
                'status' => 'available',
            ],
            [
                'code' => 'WS002',
                'name' => 'Photo Studio',
                'description' => 'Studio foto dan konten.',
                'capacity' => 6,
                'location' => 'Lantai 2',
                'max_duration_hours' => 8,
                'status' => 'available',
            ],
            [
                'code' => 'WS003',
                'name' => 'Editing Room',
                'description' => 'Ruangan editing video.',
                'capacity' => 3,
                'location' => 'Lantai 2',
                'max_duration_hours' => 8,
                'status' => 'available',
            ],
        ]);

        Workspace::find(1)
            ->equipments()
            ->sync([
                1 => ['quantity' => 2],
                2 => ['quantity' => 2],
                5 => ['quantity' => 1],
            ]);

        Workspace::find(2)
            ->equipments()
            ->sync([
                1 => ['quantity' => 2],
                3 => ['quantity' => 4],
            ]);

        Workspace::find(3)
            ->equipments()
            ->sync([
                4 => ['quantity' => 2],
            ]);
    }
}