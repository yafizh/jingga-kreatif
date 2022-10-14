<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->client)
                return redirect()->intended('/wedding');

            return redirect()->intended('/dashboard/admin');
        }

        return back()->with('auth', 'Email atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
