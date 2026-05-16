<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginWeb(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            return back()->with(
                'error',
                'Email atau password salah'
            );
        }

        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('/');
        }

        Auth::logout();
        return back()->with(
            'error',
            'Member menggunakan API / tablet'
        );
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::query()
            ->where(
                'email',
                $request->email
            )
            ->first();

        if (
            !$user ||
            !Hash::check(
                $request->password,
                $user->password
            )
        ) {

            return response()->json([
                'status' => false,
                'message' => 'Login gagal'
            ], 401);
        }


        $token = $user
            ->createToken('auth_token')
            ->plainTextToken;


        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user
        ]);
    }
}