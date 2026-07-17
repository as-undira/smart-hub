<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkspaceController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Workspaces/Index',
            [
                'workspaces' =>
                    Workspace::latest()->get(),
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Workspaces/Create'
        );
    }

    public function store(
        Request $request
    ) {
        $data = $request->validate([
            'code' =>
                'required|unique:workspaces',
            'name' => 'required',
            'description' => 'nullable',
            'capacity' =>
                'required|integer',
            'location' => 'required',
            'max_duration_hours' =>
                'required|integer',
            'status' => 'required',
        ]);

        Workspace::create($data);

        return redirect()
            ->route('workspaces.index');
    }

    public function edit(
        Workspace $workspace
    ) {
        return Inertia::render(
            'Workspaces/Edit',
            [
                'workspace' =>
                    $workspace,
            ]
        );
    }

    public function update(
        Request $request,
        Workspace $workspace
    ) {
        $data = $request->validate([
            'code' =>
                'required|unique:workspaces,code,' .
                $workspace->id,
            'name' => 'required',
            'description' => 'nullable',
            'capacity' =>
                'required|integer',
            'location' => 'required',
            'max_duration_hours' =>
                'required|integer',
            'status' => 'required',
        ]);

        $workspace->update($data);

        return redirect()
            ->route('workspaces.index');
    }

    public function destroy(
        Workspace $workspace
    ) {
        $workspace->delete();

        return redirect()
            ->route('workspaces.index');
    }

    public function equipments(
        Workspace $workspace
    ) {
        return Inertia::render(
            'Workspaces/Equipments',
            [
                'workspace' =>
                    $workspace,

                'equipments' =>
                    Equipment::all(),

                'selectedEquipments' =>
                    $workspace
                        ->equipments()
                        ->get(),
            ]
        );
    }

    public function syncEquipments(
        Request $request,
        Workspace $workspace
    ) {
        $workspace
            ->equipments()
            ->sync(
                collect(
                    $request->equipments
                )
                ->mapWithKeys(
                    function ($item) {
                        return [
                            $item['id'] => [
                                'quantity' =>
                                    $item['quantity'],
                            ],
                        ];
                    }
                )
                ->toArray()
            );

        return redirect()
            ->route(
                'workspaces.index'
            );
    }
}