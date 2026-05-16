<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import model relasi
use App\Models\User;
use App\Models\Equipment;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'equipment_id',
        'borrow_date',
        'return_date',
        'status'
    ];

    /**
     * Booking dimiliki oleh 1 user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Booking dimiliki oleh 1 equipment
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}