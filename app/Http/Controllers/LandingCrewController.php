<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class LandingCrewController extends Controller
{
    public function index()
    {
        return view('landing.page.crew', [
            "active" => "crew",
            "employees" => Employee::where('is_deleted', false)->get()
        ]);
    }
}
