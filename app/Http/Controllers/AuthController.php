<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('auth', 'Username atau Password Salah!');
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'email_verification' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if (!$this->isPasswordSame($validatedData['password'], $validatedData['confirm_password']))
            return back()->with('failed', "Password Baru Tidak Sama!");

        $user_id = User::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ])->id;

        Client::create([
            'user_id' => $user_id,
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
        ]);

        return redirect('/dashboard/groom');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Helper Functions
    public function isPasswordSame($password1, $password2)
    {
        if ($password1 == $password2) return true;
    }
}
