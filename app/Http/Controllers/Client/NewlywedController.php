<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Newlywed;
use App\Models\NewlywedDocument;
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

        $newlywed_id = Newlywed::create([
            'wedding_id' => Auth::user()->client->wedding->id,
            'nik' => $validatedData['nik'],
            'name' => $validatedData['name'],
            'birthplace' => $validatedData['birthplace'],
            'birthdate' => $validatedData['birthdate'],
            'sex' => $validatedData['sex'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'photo' => $validatedData['photo'],
        ])->id;

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                NewlywedDocument::create([
                    'newlywed_id' => $newlywed_id,
                    'document' => $document->store('newlywed-documents'),
                ]);
            }
        }

        if ($validatedData['sex'])
            return redirect('/bride');

        return redirect('/theme-vendor');
    }

    public function edit(Newlywed $newlywed)
    {
        if (!$this->isAuthorized(Auth::user()->client->id, $newlywed->wedding->client->id))
            abort(403, 'UNAUTHORIZED ACTION');

        return view('dashboard.client.page.newlywed.edit', [
            'active' => 'setting.newlywed',
            'newlywed' => $newlywed
        ]);
    }

    public function update(Request $request, Newlywed $newlywed)
    {
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

        // Delete Code
        if (!is_null($request->state_old_documents))
            foreach ($request->state_old_documents as $i => $state_old_documents) {
                if ($state_old_documents == 'delete')
                    NewlywedDocument::where('id', $request->id_old_documents[$i])->delete();

                if ($state_old_documents == 'edit')
                    NewlywedDocument::where('id', $request->id_old_documents[$i])->update([
                        'document' => $request->file('old_documents')[$i]->store('newlywed-documents')
                    ]);
            }

        // Add New Documents
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                NewlywedDocument::create([
                    'newlywed_id' => $newlywed->id,
                    'document' => $document->store('newlywed-documents'),
                ]);
            }
        }


        return redirect('/groom/' . $newlywed->id . '/edit')->with('success', "Berhasil memperbaharui data mempelai " . ($newlywed->sex ? 'pria' : 'wanita') . '.');
    }

    public function isAuthorized($client_id, $client_id_newlywed)
    {
        // Apakah mempelai ini merupakan mempelai dari client dengan id yang benar
        if ($client_id === $client_id_newlywed) return true;

        return false;
    }
}
