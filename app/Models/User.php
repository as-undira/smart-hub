<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [

        'name',

        'email',

        'password',

        'role'

    ];


    protected $hidden = [

        'password',

        'remember_token'

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