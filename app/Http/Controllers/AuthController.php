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
            if (Auth::user()->client) {
                if (!count(Auth::user()->client->wedding->newlyweds)) {
                    return redirect()->intended('/dashboard/groom');
                } elseif (count(Auth::user()->client->wedding->newlyweds) === 1) {
                    return redirect()->intended('/dashboard/bride');
                } elseif (count(Auth::user()->client->wedding->newlyweds) === 2) {
                    return redirect()->intended('/dashboard/vendor');
                }
            } else
                return redirect()->intended('/dashboard/admin');
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

        $client_id = Client::create([
            'user_id' => $user_id,
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
        ])->id;

        Wedding::create([
            'client_id' => $client_id
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
