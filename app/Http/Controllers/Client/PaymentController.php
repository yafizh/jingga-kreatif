<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('wedding_id', Auth::user()->client->wedding->id)->where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $need_to_pay = $payments->filter(function ($payment) {
            return !$payment->paymentHistory->count() || !$payment->paymentHistory->first()->status;
        })->map(function ($payment) {
            return $payment->nominal;
        })->sum();

        $already_pay = $payments->filter(function ($payment) {
            return $payment->paymentHistory->count();
        })->filter(function ($payment) {
            return $payment->paymentHistory->first()->status;
        })->map(function ($payment) {
            return $payment->nominal;
        })->sum();

        return view('dashboard.client.page.payment.index', [
            "active" => "payment",
            "active_navigation" => 6,
            "payments" => $payments,
            "need_to_pay" => $need_to_pay ?? 0,
            "already_pay" => $already_pay ?? 0,
        ]);
    }

    public function store(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'photo' => 'required'
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('payment-photo');

        PaymentHistory::create([
            'payment_id' => $payment->id,
            'photo' => $validatedData['photo']
        ]);

        return redirect('/payment');
    }
}
