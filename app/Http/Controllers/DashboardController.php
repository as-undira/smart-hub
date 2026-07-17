<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Workspace;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'totalMembers' => User::where('role', 'member')->count(),
            'totalWorkspaces' => Workspace::count(),
            'totalEquipments' => Equipment::count(),
            'totalTransactions' => Transaction::count(),
            'activeBorrowings' => Transaction::where(
                'status',
                'borrowed'
            )->count(),

            'recentTransactions' => Transaction::latest()
                ->take(5)
                ->with('user')
                ->get(),
        ]);
    }
}