<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [

        'name',

        'category',

        'condition',

        'status'

    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        return $this->hasMany(
            Booking::class
        );
    }


    public function checkins()
    {
        return $this->hasMany(
            Checkin::class
        );
    }
}