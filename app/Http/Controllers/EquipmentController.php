<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        $search = request('search');

        $equipments = Equipment::query()

            ->when(
                $search,
                function ($query) use ($search) {

                    $query
                        ->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                        ->orWhere(
                            'category',
                            'like',
                            "%{$search}%"
                        );
                }
            )
            ->latest()
            ->get();

        return view(
            'equipments.index',
            compact('equipments')
        );
    }

    public function dashboard()
    {
        $totalEquipment = Equipment::count();

        $availableEquipment = Equipment::query()
            ->where(
                'status',
                'available'
            )
            ->count();

        $borrowedEquipment = Equipment::query()
            ->where(
                'status',
                'borrowed'
            )
            ->count();

        $damagedEquipment = Equipment::query()
            ->where(
                'condition',
                'damaged'
            )
            ->count();

        return view(
            'dashboard',
            compact(
                'totalEquipment',
                'availableEquipment',
                'borrowedEquipment',
                'damagedEquipment'
            )
        );
    }

    public function create()
    {
        return view(
            'equipments.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required'
        ]);


        Equipment::create([
            'name' => $request->name,
            'category' => $request->category,
            'condition' => $request->condition,
            'status' => $request->status
        ]);


        return redirect(
            '/equipments'
        )->with(
            'success',
            'Equipment berhasil ditambahkan'
        );
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail(
            $id
        );

        return view(
            'equipments.edit',
            compact('equipment')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required'
        ]);


        $equipment = Equipment::findOrFail(
            $id
        );


        $equipment->update([
            'name' => $request->name,
            'category' => $request->category,
            'condition' => $request->condition,
            'status' => $request->status
        ]);


        return redirect(
            '/equipments'
        )->with(
            'success',
            'Equipment berhasil diupdate'
        );
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail(
            $id
        );

        $equipment->delete();

        return redirect(
            '/equipments'
        )->with(
            'success',
            'Equipment berhasil dihapus'
        );
    }
}