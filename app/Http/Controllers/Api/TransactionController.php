<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(
            Transaction::with([
                'user',
                'workspace',
                'items.equipment',
            ])->get()
        );
    }
}