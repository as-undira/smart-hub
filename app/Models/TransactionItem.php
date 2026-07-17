<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = [
        'transaction_id',
        'equipment_id',
        'quantity',
    ];

    public function transaction()
    {
        return $this->belongsTo(
            Transaction::class
        );
    }

    public function equipment()
    {
        return $this->belongsTo(
            Equipment::class
        );
    }
}