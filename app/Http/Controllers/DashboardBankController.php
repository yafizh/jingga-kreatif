<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class DashboardBankController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.bank.index', [
            "active" => "bank",
            "banks" => Bank::where('is_deleted', false)->latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.bank.create', [
            "active" => "bank"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "owner_name" => "required",
            "bank_name" => "required",
            "pin" => "required",
        ]);

        $bank_id = Bank::create($validatedData)->id;
        return redirect('/dashboard/bank')->with('created', $bank_id);
    }

    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        return view('dashboard.admin.page.bank.edit', [
            "active" => "bank",
            "bank" => $bank,
        ]);
    }

    public function update(Request $request, Bank $bank)
    {
        $validatedData = $request->validate([
            "bank_name" => "required",
            "owner_name" => "required",
            "pin" => "required",
        ]);

        Bank::where('id', $bank->id)->update($validatedData);
        return redirect('/dashboard/bank')->with('updated', $bank->id);
    }

    public function destroy(Bank $bank)
    {
        Bank::where('id', $bank->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/bank')->with('deleted', $bank->bank_name);
    }

    public function getAllBank()
    {
        $banks = Bank::where('is_deleted', false)->get();
        return response()->json($banks);
    }
}
