<?php

namespace App\Http\Controllers;

use App\Models\Checkin;

class CheckinController extends Controller
{
    public function index()
    {
        $checkins = Checkin::with(
            'user',
            'equipment'
        )->latest()->get();

        return view(
            'checkins.index',
            compact('checkins')
        );
    }
}