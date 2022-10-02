<?php

namespace App\Http\Controllers;

use App\Models\Newlywed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardNewlywedController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
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

        if (count(Auth::user()->client->wedding->newlyweds) === 1)
            return redirect('/dashboard/bride');

        return redirect('/dashboard/vendor');
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
        $validatedData = $request->validate([
            "nik" => "required",
            "name" => "required",
            "birthplace" => "required",
            "birthdate" => "required",
            "sex" => "required",
            "father_name" => "required",
            "mother_name" => "required",
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('newlywed-photo');
        else
            $validatedData['photo'] = $newlywed->photo;


        Newlywed::where('id', $newlywed->id)->update([
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

        return back();
    }

    public function destroy(Newlywed $newlywed)
    {
        //
    }
}
