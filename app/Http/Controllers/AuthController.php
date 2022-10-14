<?php

namespace App\Http\Controllers;

use App\Models\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title_page' => 'Login'
        ]);
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password', [
            'title_page' => 'Lupa Password'
        ]);
    }

    public function resetPassword($url)
    {
        if (ResetPassword::where('created_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString())->get()->count())
            return view('auth.reset_password', [
                'title_page' => 'Reset Password',
                'email' => Crypt::decryptString($url)
            ]);

        abort(404, 'NOT FOUND');
    }

    public function updatePassword(Request $request, $email)
    {
        $validatedData = $request->validate([
            'new_password' => 'required',
            'confirm_new_password' => 'required',
        ]);

        if (!$this->isPasswordSame($validatedData['new_password'], $validatedData['confirm_new_password']))
            return back()->with('failed', "Password Baru Tidak Sama!");

        User::where('email', $email)->update([
            'password' => bcrypt($validatedData['new_password'])
        ]);

        return redirect('/login')->with('reset_password', 'Reset Password Berhasil, Silakan Login!');
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

    public function isPasswordSame($password1, $password2)
    {
        if ($password1 == $password2) return true;
        return false;
    }
}
