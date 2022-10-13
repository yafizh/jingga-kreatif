<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        Session::flash('section', 'payment');
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

        return redirect('/dashboard/wedding/' . $wedding->id);
    }

    public function show(Payment $payment)
    {
        if($payment->paymentHistories->count()){
            $paymentHistories = $payment->paymentHistories->first();
            $payment->payment_date = $paymentHistories->created_at->day . " " . $paymentHistories->created_at->locale('ID')->getTranslatedMonthName() . " " . $paymentHistories->created_at->year;
            $payment->photo = $paymentHistories->photo;
            $payment->bank = $paymentHistories->bank;
        }

        return view('dashboard.admin.page.payment.show', [
            "active" => "wedding",
            "payment" => $payment,
        ]);
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

        return redirect('/dashboard/wedding/' . $payment->wedding_id);
    }

    public function destroy(Payment $payment)
    {
        Payment::where('id', $payment->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding/' . $payment->wedding_id);
    }

    public function verification(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'verification-btn' => 'required'
        ]);

        if($validatedData['verification-btn'] === 'approve'){
            PaymentHistory::where('id', $payment->paymentHistories->first()->id)->update([
                'status' => true
            ]);

            return redirect('/dashboard/wedding/' . $payment->wedding_id);
        }

        PaymentHistory::where('id', $payment->paymentHistories->first()->id)->update([
            'status' => false
        ]);
        return redirect('/dashboard/wedding/' . $payment->wedding_id);
    }

}
