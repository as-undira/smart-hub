<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Equipment;
use App\Models\Checkin;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Protected Route
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // API Inventaris
    Route::get('/equipments', function () {

        return Equipment::all();

    });


    // API Checkin
    Route::post('/checkin', function (Request $request) {

        $checkin = Checkin::create([
            'user_id' => $request->user_id,

            'equipment_id' => $request->equipment_id,

            'type' => $request->type,

            'checked_at' => now()

        ]);

        return response()->json([

            'status' => true,

            'message' => 'Check-in berhasil',

            'data' => $checkin

        ]);

    });

});