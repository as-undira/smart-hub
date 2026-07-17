<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'capacity',
        'location',
        'max_duration_hours',
        'status',
    ];

    public function equipments()
    {
        return $this->belongsToMany(
            Equipment::class,
            'workspace_equipment'
        )->withPivot('quantity');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}