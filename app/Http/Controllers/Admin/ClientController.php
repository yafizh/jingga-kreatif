<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.client.index', [
            "active" => "client",
            "clients" => Client::where('is_deleted', false)->orderBy('name')->get()
        ]);
    }

    public function edit(Client $client)
    {
        return view('dashboard.admin.page.client.edit', [
            "active" => "client",
            "client" => $client
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "phone_number" => "required",
            "email" => "required",
        ]);

        User::where('id', $client->user_id)->update(["email" => $validatedData["email"]]);
        Client::where('id', $client->id)->update($validatedData);
        return redirect('/dashboard/client')->with('updated', $client->name);
    }

    public function destroy(Client $client)
    {
        Client::where('id', $client->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/client')->with('deleted', $client->name);
    }

    public function editPassword(Client $client)
    {
        return view('dashboard.admin.page.client.edit_password', [
            "active" => "client",
            "client" => $client
        ]);
    }

    public function updatePassword(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if (!$this->isPasswordSame($validatedData['new_password'], $validatedData['confirm_password']))
            return back()->with('failed', "Password Baru Tidak Sama!");


        User::where('id', $client->user_id)->update([
            'password' => bcrypt($validatedData['new_password'])
        ]);

        return redirect('/dashboard/client')->with('updated_password', $client->name);
    }

    public function isPasswordSame($password1, $password2)
    {
        if ($password1 == $password2) return true;
        return false;
    }
}
