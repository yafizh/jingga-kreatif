<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IntroductionController extends Controller
{
    public function index()
    {
        if (Auth::user())
            return redirect('/wedding');

        return view('dashboard.client.page.introduction.index', [
            "active" => "introduction",
            "active_navigation" => 1
        ]);
    }
}
