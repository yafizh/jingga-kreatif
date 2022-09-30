<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Wedding;
use Illuminate\Http\Request;

class DashboardPaymentController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Wedding $wedding)
    {
        return view('dashboard.admin.page.payment.create', [
            'wedding' => $wedding,
            'active' => 'wedding'
        ]);
    }

    public function store(Request $request, Wedding $wedding)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nominal' => 'required',
        ]);

        Payment::create([
            'wedding_id' => $wedding->id,
            'name' => $validatedData['name'],
            'nominal' => $validatedData['nominal'],
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id)->with('section', 'payment');
    }

    public function show(Payment $payment)
    {
        //
    }

    public function edit(Payment $payment)
    {
        return view('dashboard.admin.page.payment.edit', [
            'payment' => $payment,
            'active' => 'wedding'
        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nominal' => 'required',
        ]);

        Payment::where('id', $payment->id)->update([
            'name' => $validatedData['name'],
            'nominal' => $validatedData['nominal'],
        ]);

        return redirect('/dashboard/wedding/' . $payment->wedding_id)->with('section', 'payment');
    }

    public function destroy(Payment $payment)
    {
        Payment::where('id', $payment->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding/' . $payment->wedding_id)->with('section', 'payment');
    }
}
