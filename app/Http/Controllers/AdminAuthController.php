<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credentials)) {

            $user = Auth::user();


            if ($user->role == 'admin') {

                return redirect('/');

            }


            if ($user->role == 'member') {

                return redirect('/member');

            }

        }


        return back()->with(
            'error',
            'Login gagal'
        );
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}