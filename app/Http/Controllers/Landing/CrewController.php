<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class CrewController extends Controller
{
    public function index()
    {
        return view('landing.page.crew', [
            "active" => "crew",
            "employees" => Employee::where('is_deleted', false)->get()
        ]);
    }
}
