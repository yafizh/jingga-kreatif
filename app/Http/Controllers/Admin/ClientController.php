<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.client.index', [
            "active" => "client",
            "clients" => Client::where('is_deleted', false)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.client.create', [
            "active" => "client",
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client)
    {
        //
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

        $userData = [
            "email" => $validatedData["email"],
        ];

        if ($request->get('password'))
            $userData["password"] = bcrypt($request->get('password'));

        User::where('id', $client->user_id)->update($userData);
        Client::where('id', $client->id)->update($validatedData);
        return redirect('/dashboard/client')->with('updated', $client->id);
    }

    public function destroy(Client $client)
    {
        Client::where('id', $client->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/client')->with('deleted', $client->name);
    }
}
