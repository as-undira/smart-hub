<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Menampilkan semua data equipment
     */
    public function index()
    {
        $equipments = Equipment::all();

        return view('equipments.index', compact('equipments'));
    }

    /**
     * Menampilkan form tambah equipment
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
     * Simpan equipment baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required'
        ]);

        Equipment::create($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Equipment berhasil ditambahkan');
    }

    /**
     * Menampilkan detail equipment
     */
    public function show(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('equipments.show', compact('equipment'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update equipment
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required'
        ]);

        $equipment = Equipment::findOrFail($id);

        $equipment->update($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Equipment berhasil diupdate');
    }

    /**
     * Hapus equipment
     */
    public function destroy(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Equipment berhasil dihapus');
    }

    public function dashboard()
    {
        $totalEquipment = Equipment::query()->count();

        $availableEquipment = Equipment::query()
            ->where('status', 'available')
            ->count();

        $borrowedEquipment = Equipment::query()
            ->where('status', 'borrowed')
            ->count();

        $totalCheckin = \App\Models\Checkin::query()->count();

        return view('dashboard', compact(
            'totalEquipment',
            'availableEquipment',
            'borrowedEquipment',
            'totalCheckin'
        ));
    }

}