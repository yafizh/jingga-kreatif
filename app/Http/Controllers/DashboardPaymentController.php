<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardPaymentController extends Controller
{
    public function __construct()
    {
        Session::flash('section', 'payment');
    }

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

        return redirect('/dashboard/wedding/' . $payment->wedding_id);
    }

    public function destroy(Payment $payment)
    {
        Payment::where('id', $payment->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding/' . $payment->wedding_id);
    }
}
