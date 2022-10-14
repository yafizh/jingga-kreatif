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
        return view('dashboard.client.page.payment.index', [
            "active" => "payment",
            "active_navigation" => 6,
            "payments" => Payment::getPaymentByWeddingId(Auth::user()->client->wedding->id),
            "need_to_pay" => Payment::getNeedToPayPaymentByWeddingId(Auth::user()->client->wedding->id),
            "already_pay" => Payment::getAlreadyPayPaymentByWeddingId(Auth::user()->client->wedding->id),
        ]);
    }

    public function store(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'bank' => 'required',
            'photo' => 'required'
        ]);

        if ($validatedData['bank'] == '0')
            $validatedData['bank'] = null;

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('payment-photo');

        PaymentHistory::create([
            'payment_id' => $payment->id,
            'bank_id' => $validatedData['bank'] ?? null,
            'photo' => $validatedData['photo']
        ]);

        return redirect('/payment');
    }
}
