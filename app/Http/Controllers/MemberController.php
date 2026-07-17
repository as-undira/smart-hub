<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index()
    {
        return Inertia::render('Members/Index', [
            'members' => User::where(
                'role',
                'member'
            )
            ->latest()
            ->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render(
            'Members/Create'
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['nullable'],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            ...$data,
            'password' => Hash::make(
                $data['password']
            ),
            'role' => 'member',
        ]);

        return redirect()
            ->route('members.index');
    }

    public function edit(User $member)
    {
        return Inertia::render(
            'Members/Edit',
            [
                'member' => $member,
            ]
        );
    }

    public function update(
        Request $request,
        User $member
    ) {
        $data = $request->validate([
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                'unique:users,email,' .
                $member->id,
            ],
            'phone' => ['nullable'],
        ]);

        $member->update($data);

        return redirect()
            ->route('members.index');
    }

    public function destroy(User $member)
    {
        $member->delete();

        return redirect()
            ->route('members.index');
    }
}