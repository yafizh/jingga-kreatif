<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newlywed;
use App\Models\NewlywedDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewlywedController extends Controller
{

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

        if ($request->hasFile('photo'))
            $validatedData['photo'] = $request->file('photo')->store('newlywed-photo');
        else
            $validatedData['photo'] = $newlywed->photo;

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $i => $document) {
                if ($document) {
                    NewlywedDocument::where('id', $request->id_documents[$i])->update([
                        'document' => $document->store('newlywed-documents')
                    ]);
                }
            }
        }

        Newlywed::where('id', $newlywed->id)->update([
            'wedding_id' => $newlywed->wedding_id,
            'nik' => $validatedData['nik'],
            'name' => $validatedData['name'],
            'birthplace' => $validatedData['birthplace'],
            'birthdate' => $validatedData['birthdate'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'photo' => $validatedData['photo'],
        ]);


        if ($newlywed->sex)
            Session::flash('section', 'groom');
        else
            Session::flash('section', 'bride');



        return redirect('/dashboard/wedding/' . $newlywed->wedding_id);
    }
}
