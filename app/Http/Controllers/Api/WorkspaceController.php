<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function index()
    {
        return response()->json(
            Workspace::with(
                'equipments'
            )->get()
        );
    }
}