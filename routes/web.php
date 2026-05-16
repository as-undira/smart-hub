<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\EquipmentController;

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
);

Route::post(
    '/login',
    [AuthController::class, 'loginWeb']
);

Route::post(
    '/logout',
    [AuthController::class, 'logout']
);

Route::middleware('auth')->group(function () {

    Route::get(
        '/',
        [EquipmentController::class, 'dashboard']
    );

    Route::resource(
        'equipments',
        EquipmentController::class
    );

    Route::get(
        '/bookings',
        [BookingController::class, 'index']
    );

    Route::get(
        '/bookings/{id}/edit',
        [BookingController::class, 'edit']
    );

    Route::put(
        '/bookings/{id}',
        [BookingController::class, 'update']
    );

    Route::delete(
        '/bookings/{id}',
        [BookingController::class, 'destroy']
    );

    Route::get(
        '/checkins',
        [CheckinController::class, 'index']
    );

});