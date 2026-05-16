<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Illuminate\Http\Request;

class CheckinController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'equipment_id' => 'required'
        ]);


        $checkin = Checkin::create([
            'user_id' => auth()->id(),
            'equipment_id' => $request->equipment_id,
            'type' => 'checkin',
            'checked_at' => now()
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Check-in berhasil',
            'data' => $checkin
        ]);
    }

    public function index()
    {
        $checkins = Checkin::with([
            'user',
            'equipment'
        ])
        ->latest()
        ->get();

        return view(
            'checkins.index',
            compact('checkins')
        );
    }
}