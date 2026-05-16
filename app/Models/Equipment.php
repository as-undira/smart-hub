<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Tambahkan relasi model
use App\Models\Booking;
use App\Models\Checkin;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'category',
        'condition',
        'status'
    ];

    /**
     * Satu alat bisa punya banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Satu alat bisa punya banyak checkin
     */
    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }
}