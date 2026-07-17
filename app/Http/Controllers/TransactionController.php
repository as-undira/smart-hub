<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Transaction;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'user',
            'workspace',
            'items.equipment',
        ])
        ->latest()
        ->get();

        return Inertia::render(
            'Transactions/Index',
            [
                'transactions' => $transactions,
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Transactions/Create',
            [
                'workspaces' => Workspace::where(
                    'status',
                    'available'
                )->get(),

                'equipments' => Equipment::where(
                    'condition',
                    'good'
                )->get(),
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'workspace_id' =>
                'nullable|exists:workspaces,id',

            'borrow_start' =>
                'required|date',

            'borrow_end' =>
                'required|date|after:borrow_start',

            'notes' =>
                'nullable|string',

            'equipments' =>
                'nullable|array',

            'equipments.*.id' =>
                'required|exists:equipments,id',

            'equipments.*.quantity' =>
                'required|integer|min:1',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Workspace Validation
        |--------------------------------------------------------------------------
        */

        if (!empty($data['workspace_id'])) {

            $overlap =
                Transaction::where(
                    'workspace_id',
                    $data['workspace_id']
                )
                ->whereIn('status', [
                    'pending',
                    'approved',
                    'borrowed',
                ])
                ->where(function ($query) use ($data) {

                    $query
                        ->whereBetween(
                            'borrow_start',
                            [
                                $data['borrow_start'],
                                $data['borrow_end'],
                            ]
                        )
                        ->orWhereBetween(
                            'borrow_end',
                            [
                                $data['borrow_start'],
                                $data['borrow_end'],
                            ]
                        )
                        ->orWhere(function ($q) use ($data) {

                            $q->where(
                                'borrow_start',
                                '<=',
                                $data['borrow_start']
                            )
                            ->where(
                                'borrow_end',
                                '>=',
                                $data['borrow_end']
                            );
                        });
                })
                ->exists();

            if ($overlap) {
                return back()->withErrors([
                    'workspace_id' =>
                        'Workspace sudah dibooking pada jadwal tersebut.',
                ]);
            }
        }

        if (!empty($data['equipments'])) {

            foreach ($data['equipments'] as $item) {

                $equipment = Equipment::find(
                    $item['id']
                );

                if (
                    $item['quantity'] >
                    $equipment->stock
                ) {
                    return back()->withErrors([
                        'equipments' =>
                            $equipment->name .
                            ' melebihi stok tersedia.',
                    ]);
                }
            }
        }

        $transaction =
            Transaction::create([
                'code' =>
                    'TRX-' .
                    now()->format('YmdHis'),

                'user_id' =>
                    auth()->id(),

                'workspace_id' =>
                    $data['workspace_id']
                    ?? null,

                'borrow_start' =>
                    $data['borrow_start'],

                'borrow_end' =>
                    $data['borrow_end'],

                'notes' =>
                    $data['notes']
                    ?? null,

                'status' =>
                    'pending',
            ]);

        if (!empty($data['equipments'])) {

            foreach (
                $data['equipments']
                as $item
            ) {
                $transaction
                    ->items()
                    ->create([
                        'equipment_id' =>
                            $item['id'],

                        'quantity' =>
                            $item['quantity'],
                    ]);
            }
        }

        return redirect()
            ->route(
                'transactions.index'
            );
    }

    public function approve(
        Transaction $transaction
    ) {
        if (
            $transaction->status !==
            'pending'
        ) {
            return back();
        }

        $transaction->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back();
    }

    public function reject(
        Transaction $transaction
    ) {
        if (
            $transaction->status !==
            'pending'
        ) {
            return back();
        }

        $transaction->update([
            'status' =>
                'rejected',
        ]);

        return back();
    }

    public function cancel(
        Transaction $transaction
    ) {
        if (
            auth()->id() !==
            $transaction->user_id
        ) {
            abort(403);
        }

        if (
            $transaction->status !==
            'pending'
        ) {
            return back()->withErrors([
                'status' =>
                    'Transaksi tidak dapat dibatalkan.',
            ]);
        }

        $transaction->update([
            'status' =>
                'cancelled',
        ]);

        return back();
    }

    public function checkout(
        Transaction $transaction
    ) {
        if (
            $transaction->status !==
            'approved'
        ) {
            return back();
        }

        foreach (
            $transaction->items
            as $item
        ) {

            $equipment =
                $item->equipment;

            if (
                $equipment->stock <
                $item->quantity
            ) {
                return back()
                    ->withErrors([
                        'stock' =>
                            $equipment->name .
                            ' stok tidak mencukupi.',
                    ]);
            }
        }

        foreach (
            $transaction->items
            as $item
        ) {
            $item
                ->equipment
                ->decrement(
                    'stock',
                    $item->quantity
                );
        }

        $transaction->update([
            'status' =>
                'borrowed',
            'checkout_at' =>
                now(),
        ]);

        return back();
    }

    public function complete(
        Transaction $transaction
    ) {
        if (
            $transaction->status !==
            'borrowed'
        ) {
            return back();
        }

        foreach (
            $transaction->items
            as $item
        ) {
            $item
                ->equipment
                ->increment(
                    'stock',
                    $item->quantity
                );
        }

        $transaction->update([
            'status' =>
                'completed',
            'checkin_at' =>
                now(),
        ]);

        return back();
    }

    public function myTransactions()
    {
        $transactions =
            Transaction::with([
                'workspace',
                'items.equipment',
            ])
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

        return Inertia::render(
            'Transactions/MyTransactions',
            [
                'transactions' =>
                    $transactions,
            ]
        );
    }
}