<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'condition',
        'max_duration_days',
    ];

    public function workspaces()
    {
        return $this->belongsToMany(
            Workspace::class,
            'workspace_equipment'
        )->withPivot('quantity');
    }

    public function transactionItems()
    {
        return $this->hasMany(
            TransactionItem::class
        );
    }
}