<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\EquipmentController;

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::middleware('auth:sanctum')->group(function () {


    Route::get(
        '/equipments',
        [EquipmentController::class, 'index']
    );


    Route::post(
        '/checkin',
        [CheckinController::class, 'store']
    );

});