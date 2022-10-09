<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->client->wedding->vendors)
            return redirect('/payment');

        if (count(Auth::user()->client->wedding->newlyweds) === 2)
            return redirect('/vendor');

        if (count(Auth::user()->client->wedding->newlyweds) === 1)
            return redirect('/bride');

        if (!count(Auth::user()->client->wedding->newlyweds))
            return redirect('/groom');

        abort(500, 'SERVER ERROR');
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
