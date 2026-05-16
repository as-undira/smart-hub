<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CheckinController;

Route::get('/login', [
    AdminAuthController::class,
    'loginForm'
])->name('login');

Route::post('/login', [
    AdminAuthController::class,
    'login'
]);

Route::post('/logout', [
    AdminAuthController::class,
    'logout'
]);

Route::middleware('auth')->group(function () {

    Route::get('/', [
        EquipmentController::class,
        'dashboard'
    ]);

    Route::get('/member', function () {
        $equipments = \App\Models\Equipment::query()->where('status', '=', 'available')->get();
        $myBookings = \App\Models\Booking::with(
            'equipment'
        )
        ->where('user_id', '=', auth()->id())
        ->latest()
        ->get();


        return view(
            'member.dashboard',
            compact(
                'equipments',
                'myBookings'
            )
        );

    });

    Route::resource(
        'equipments',
        EquipmentController::class
    );

    Route::get('/bookings', [
        BookingController::class,
        'index'
    ]);

    Route::get('/checkins', [
        CheckinController::class,
        'index'
    ]);

    Route::post('/member-checkin/{id}', function ($id) {
        \App\Models\Checkin::create([
            'user_id' => auth()->id(),
            'equipment_id' => $id,
            'type' => 'checkin',
            'checked_at' => now()
        ]);

        return back()->with(
            'success',
            'Check-in berhasil'
        );

    });

    Route::post('/borrow/{id}', function ($id) {
        $equipment = \App\Models\Equipment::find($id);
        \App\Models\Booking::create([
            'user_id' => auth()->id(),
            'equipment_id' => $id,
            'borrow_date' => now(),
            'return_date' => now()->addDays(2),
            'status' => 'approved'
        ]);


        $equipment->update([
            'status' => 'borrowed'
        ]);


        return back()->with(
            'success',
            'Barang berhasil dipinjam'
        );

    });

    Route::post('/return/{id}', function ($id) {
        $booking = \App\Models\Booking::findOrFail($id);
        $booking->update(['status' => 'returned']);
        $equipment = \App\Models\Equipment::findOrFail($booking->equipment_id);
        $equipment->update(['status' => 'available']);

        return back()->with('success', 'Barang berhasil dikembalikan');
    });

});