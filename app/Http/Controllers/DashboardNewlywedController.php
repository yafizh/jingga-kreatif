<?php

namespace App\Http\Controllers;

use App\Models\Newlywed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardNewlywedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'birthplace' => $validatedData['birthplace'],
            'birthdate' => $validatedData['birthdate'],
            'sex' => $validatedData['sex'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'photo' => $validatedData['photo'],
        ]);

        if (count(Auth::user()->client->wedding->newlyweds) === 1) {
            return redirect('/dashboard/bride');
        } else if (count(Auth::user()->client->wedding->newlyweds) === 2) {
            return redirect('/dashboard/vendor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newlywed  $newlywed
     * @return \Illuminate\Http\Response
     */
    public function show(Newlywed $newlywed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newlywed  $newlywed
     * @return \Illuminate\Http\Response
     */
    public function edit(Newlywed $newlywed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newlywed  $newlywed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newlywed $newlywed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newlywed  $newlywed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newlywed $newlywed)
    {
        //
    }
}
