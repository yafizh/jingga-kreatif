<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class DashboardBankController extends Controller
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
        //
    }

    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        //
    }

    public function update(Request $request, Bank $bank)
    {
        //
    }

    public function destroy(Bank $bank)
    {
        //
    }

    public function getAllBank()
    {
        $banks = Bank::where('is_deleted', false)->get();
        return response()->json($banks);
    }
}
