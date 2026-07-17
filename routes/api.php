<?php

use App\Http\Controllers\Api\EquipmentController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/workspaces',
    [WorkspaceController::class, 'index']
);

Route::get(
    '/equipments',
    [EquipmentController::class, 'index']
);

Route::get(
    '/transactions',
    [TransactionController::class, 'index']
);