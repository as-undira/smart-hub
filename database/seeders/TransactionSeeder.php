<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::insert([
            [
                'code' => 'TRX001',
                'user_id' => 2,
                'workspace_id' => 1,
                'borrow_start' => now(),
                'borrow_end' => now()->addHours(4),
                'status' => 'pending',
            ],
            [
                'code' => 'TRX002',
                'user_id' => 3,
                'workspace_id' => 2,
                'borrow_start' => now(),
                'borrow_end' => now()->addHours(2),
                'status' => 'approved',
            ],
            [
                'code' => 'TRX003',
                'user_id' => 4,
                'workspace_id' => 3,
                'borrow_start' => now(),
                'borrow_end' => now()->addHours(6),
                'status' => 'completed',
            ],
        ]);

        Transaction::find(1)
            ->items()
            ->create([
                'equipment_id' => 1,
                'quantity' => 1,
            ]);

        Transaction::find(2)
            ->items()
            ->create([
                'equipment_id' => 3,
                'quantity' => 2,
            ]);

        Transaction::find(3)
            ->items()
            ->create([
                'equipment_id' => 4,
                'quantity' => 1,
            ]);
    }
}