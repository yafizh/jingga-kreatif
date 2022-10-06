<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.page.portfolio', [
            "active" => "home"
        ]);
    }
}
