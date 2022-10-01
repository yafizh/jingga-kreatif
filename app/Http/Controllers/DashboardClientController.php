<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->client) {
            if (!count(Auth::user()->client->wedding->newlyweds))
                return redirect()->intended('/dashboard/groom');

            if (count(Auth::user()->client->wedding->newlyweds) === 1)
                return redirect()->intended('/dashboard/bride');

            if (count(Auth::user()->client->wedding->newlyweds) === 2)
                return redirect()->intended('/dashboard/vendor');

            return redirect()->intended('/dashboard/payment');
        }

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

        Client::where('id', $client->id)->update($validatedData);
        return redirect('/dashboard/client')->with('updated', $client->id);
    }

    public function destroy(Client $client)
    {
        Client::where('id', $client->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/client')->with('deleted', $client->name);
    }
}
