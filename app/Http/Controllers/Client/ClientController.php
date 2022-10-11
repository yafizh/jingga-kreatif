<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->client->wedding->vendors->count() && Auth::user()->client->wedding->theme)
            return redirect('/payment');

        if (Auth::user()->client->wedding->newlyweds->count() === 2)
            return redirect('/vendor');

        if (Auth::user()->client->wedding->newlyweds->count() === 1)
            return redirect('/bride');

        if (!Auth::user()->client->wedding->newlyweds->count())
            return redirect('/groom');

        abort(500, 'SERVER ERROR');
    }

    public function create()
    {
        return view('dashboard.client.page.registration.create', [
            "active" => "registration",
            "active_navigation" => 2
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|unique:clients',
            'email_verification_code' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ],[
            'email.unique' => 'Email telah digunakan!'
        ]);

        if (!$this->isPasswordSame($validatedData['password'], $validatedData['confirm_password']))
            return back();

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

        return redirect('/login')->with('login', 'Login untuk melanjutkan!');
    }

    public function edit(Request $request, Client $client)
    {
        if ($request->query('q') == 'change-password') {
            return view('dashboard.client.page.registration.edit_password', [
                'active' => 'setting',
                'client' => $client
            ]);
        }

        return view('dashboard.client.page.registration.edit', [
            'active' => 'setting.client',
            'client' => $client
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required'
        ]);

        Client::where('id', $client->id)->update($validatedData);

        return redirect('/client/' . $client->id . '/edit');
    }

    public function updateEmail(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'email_verification' => 'required',
        ]);

        Client::where('id', $client->id)->update([
            'email' => $validatedData['email']
        ]);

        User::where('id', $client->user_id)->update([
            'email' => $validatedData['email']
        ]);

        return redirect('/client/' . $client->id . '/edit');
    }

    public function updatePassword(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if (!$this->isOldPassword($validatedData['old_password'], $client->user->password))
            return back()->with('failed', "Password Lama Salah!");

        if (!$this->isPasswordSame($validatedData['new_password'], $validatedData['confirm_password']))
            return back()->with('failed', "Password Baru Tidak Sama!");


        User::where('id', $client->user_id)->update([
            'password' => bcrypt($validatedData['new_password'])
        ]);

        return redirect('/setting');
    }

    public function isOldPassword($new_password, $old_password)
    {
        if (Hash::check($new_password, $old_password)) return true;
    }

    public function isPasswordSame($password1, $password2)
    {
        if ($password1 == $password2) return true;
    }
}
