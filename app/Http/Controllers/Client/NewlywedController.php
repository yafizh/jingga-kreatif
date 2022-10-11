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

    public function edit(Newlywed $newlywed)
    {
        return view('dashboard.client.page.newlywed.edit', [
            'active' => 'setting.newlywed',
            'newlywed' => $newlywed
        ]);
    }

    public function update(Request $request, Newlywed $newlywed)
    {
        // if (!$this->isAuthorized(Auth::user()->client->id, $newlywed->wedding->client->id))
        //     abort(403, 'DILARANG');

        $validatedData = $request->validate([
            "nik" => "required",
            "name" => "required",
            "birthplace" => "required",
            "birthdate" => "required",
            "father_name" => "required",
            "mother_name" => "required",
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('newlywed-photo');
        else
            $validatedData['photo'] = $newlywed->photo;


        Newlywed::where('id', $newlywed->id)->update([
            'nik' => $validatedData['nik'],
            'name' => $validatedData['name'],
            'birthplace' => $validatedData['birthplace'],
            'birthdate' => $validatedData['birthdate'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'photo' => $validatedData['photo'],
        ]);

        return redirect('/groom/' . $newlywed->id . '/edit')->with('success', "Berhasil memperbaharui data mempelai " . ($newlywed->sex ? 'pria' : 'wanita') . '.');
    }

    public function isAuthorized($client_id, $client_id_newlywed)
    {
        // Apakah mempelai ini merupakan mempelai dari client dengan id yang benar
        if ($client_id === $client_id_newlywed) return true;

        return false;
    }
}
