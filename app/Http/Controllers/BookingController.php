<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Equipment;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with([
            'user',
            'equipment'
        ])
        ->latest()
        ->get();


        return view(
            'bookings.index',
            compact('bookings')
        );
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail(
            $id
        );

        $users = User::all();

        $equipments = Equipment::all();

        return view(
            'bookings.edit',
            compact(
                'booking',
                'users',
                'equipments'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([
            'status' => 'required'
        ]);


        $booking = Booking::findOrFail(
            $id
        );


        $booking->update([
            'status' => $request->status
        ]);


        return redirect(
            '/bookings'
        )->with(
            'success',
            'Booking berhasil diupdate'
        );
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail(
            $id
        );

        $booking->delete();

        return redirect(
            '/bookings'
        )->with(
            'success',
            'Booking berhasil dihapus'
        );
    }
}