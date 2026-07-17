<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Equipments/Index',
            [
                'equipments' => Equipment::latest()->get(),
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Equipments/Create'
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:equipments',
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
            'condition' => 'required',
            'max_duration_days' => 'required|integer|min:1',
        ]);

        Equipment::create($data);

        return redirect()
            ->route('equipments.index');
    }

    public function edit(
        Equipment $equipment
    ) {
        return Inertia::render(
            'Equipments/Edit',
            [
                'equipment' => $equipment,
            ]
        );
    }

    public function update(
        Request $request,
        Equipment $equipment
    ) {
        $data = $request->validate([
            'code' =>
                'required|unique:equipments,code,' .
                $equipment->id,
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
            'condition' => 'required',
            'max_duration_days' => 'required|integer|min:1',
        ]);

        $equipment->update($data);

        return redirect()
            ->route('equipments.index');
    }

    public function destroy(
        Equipment $equipment
    ) {
        $equipment->delete();

        return redirect()
            ->route('equipments.index');
    }
}