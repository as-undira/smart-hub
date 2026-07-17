<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    Route::middleware(['role:admin'])
        ->group(function () {

            Route::resource(
                'members',
                MemberController::class
            );

            Route::get(
                '/transactions',
                [TransactionController::class, 'index']
            )->name(
                'transactions.index'
            );

            Route::patch(
                '/transactions/{transaction}/approve',
                [TransactionController::class, 'approve']
            )->name(
                'transactions.approve'
            );

            Route::patch(
                '/transactions/{transaction}/reject',
                [TransactionController::class, 'reject']
            )->name(
                'transactions.reject'
            );

            Route::patch(
                '/transactions/{transaction}/checkout',
                [TransactionController::class, 'checkout']
            )->name(
                'transactions.checkout'
            );

            Route::patch(
                '/transactions/{transaction}/complete',
                [TransactionController::class, 'complete']
            )->name(
                'transactions.complete'
            );
        });

    Route::middleware(['role:member'])
        ->group(function () {

            Route::get(
                '/my-transactions',
                [TransactionController::class, 'myTransactions']
            )->name(
                'my-transactions.index'
            );

            Route::get(
                '/transactions/create',
                [TransactionController::class, 'create']
            )->name(
                'transactions.create'
            );

            Route::post(
                '/transactions',
                [TransactionController::class, 'store']
            )->name(
                'transactions.store'
            );

            Route::patch(
                '/transactions/{transaction}/cancel',
                [TransactionController::class, 'cancel']
            )->name(
                'transactions.cancel'
            );
        });

    Route::resource(
        'workspaces',
        WorkspaceController::class
    )->except([
        'destroy',
        'store',
        'update',
        'create',
        'edit',
    ]);

    Route::resource(
        'equipments',
        EquipmentController::class
    )->except([
        'destroy',
        'store',
        'update',
        'create',
        'edit',
    ]);

    Route::middleware(['role:admin'])
        ->group(function () {

            Route::resource(
                'workspaces',
                WorkspaceController::class
            )->only([
                'create',
                'store',
                'edit',
                'update',
                'destroy',
            ]);

            Route::resource(
                'equipments',
                EquipmentController::class
            )->only([
                'create',
                'store',
                'edit',
                'update',
                'destroy',
            ]);

            Route::get(
                '/workspaces/{workspace}/equipments',
                [WorkspaceController::class, 'equipments']
            )->name(
                'workspaces.equipments'
            );

            Route::post(
                '/workspaces/{workspace}/equipments',
                [WorkspaceController::class, 'syncEquipments']
            )->name(
                'workspaces.equipments.sync'
            );
        });

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name(
        'profile.edit'
    );

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name(
        'profile.update'
    );

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';