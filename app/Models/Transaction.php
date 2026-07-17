<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'workspace_id',
        'borrow_start',
        'borrow_end',
        'status',
        'notes',
        'approved_by',
        'approved_at',
        'checkout_at',
        'checkin_at',
    ];

    protected $casts = [
        'borrow_start' => 'datetime',
        'borrow_end' => 'datetime',
        'approved_at' => 'datetime',
        'checkout_at' => 'datetime',
        'checkin_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function approver()
    {
        return $this->belongsTo(
            User::class,
            'approved_by'
        );
    }

    public function items()
    {
        return $this->hasMany(
            TransactionItem::class
        );
    }
}