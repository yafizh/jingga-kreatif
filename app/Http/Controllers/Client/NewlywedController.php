<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Newlywed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class NewlywedController extends Controller
{
    public function create()
    {
        if (Route::currentRouteName() === 'groom') {
            return view('dashboard.client.page.newlywed.create', [
                "active" => "groom",
                "newlywed" => true,
                "active_navigation" => 3
            ]);
        }

        if (Route::currentRouteName() === 'bride') {
            return view('dashboard.client.page.newlywed.create', [
                "active" => "bride",
                "newlywed" => false,
                "active_navigation" => 4
            ]);
        }

        abort(404, 'NOT FOUND');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nik" => "required",
            "name" => "required",
            "birthplace" => "required",
            "birthdate" => "required",
            "sex" => "required",
            "father_name" => "required",
            "mother_name" => "required",
            "photo" => "required",
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('newlywed-photo');

        Newlywed::create([
            'wedding_id' => Auth::user()->client->wedding->id,
            'nik' => $validatedData['nik'],
            'name' => $validatedData['name'],
            'birthplace' => $validatedData['birthplace'],
            'birthdate' => $validatedData['birthdate'],
            'sex' => $validatedData['sex'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'photo' => $validatedData['photo'],
        ]);

        if ($validatedData['sex'])
            return redirect('/bride');

        return redirect('/theme-vendor');
    }

    public function show(Newlywed $newlywed)
    {
        //
    }

    public function edit(Newlywed $newlywed)
    {
        //
    }

    public function update(Request $request, Newlywed $newlywed)
    {

    }
}
