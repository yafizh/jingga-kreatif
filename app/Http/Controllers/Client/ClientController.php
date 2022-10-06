<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        abort(500, 'SERVR ERROR');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {

    }

    public function update(Request $request, Client $client)
    {

    }

    public function destroy(Client $client)
    {

    }
}
