<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import model relasi
use App\Models\User;
use App\Models\Equipment;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'equipment_id',
        'type',
        'checked_at'
    ];

    /**
     * Checkin dimiliki oleh 1 user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Checkin dimiliki oleh 1 equipment
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}