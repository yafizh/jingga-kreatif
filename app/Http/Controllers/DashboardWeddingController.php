<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Wedding;
use App\Models\WeddingTheme;
use App\Models\WeddingVendor;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardWeddingController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.wedding.index', [
            "active" => "wedding",
            "weddings" => Wedding::where('wedding_status', null)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Wedding $wedding)
    {
        $client = $wedding->client;
        $groom = $wedding->newlyweds->filter(function ($newlywed) {
            return $newlywed->sex;
        })->first();
        $bride = $wedding->newlyweds->filter(function ($newlywed) {
            return !$newlywed->sex;
        })->first();
        $meetings = $wedding->meetings->filter(function ($meeting) {
            return !$meeting->is_deleted;
        })->map(function ($meeting) {
            $meeting_date = new Carbon($meeting->meeting_date);
            $meeting->meeting_date = $meeting_date->day . " " . $meeting_date->locale('ID')->getTranslatedMonthName() . " " . $meeting_date->year;
            $meeting->meeting_day = $meeting_date->locale('ID')->getTranslatedDayName();
            return $meeting;
        })->reverse();
        $payments = $wedding->payments->filter(function ($payment) {
            return !$payment->is_deleted;
        })->reverse();

        return view('dashboard.admin.page.wedding.show', [
            "active" => "wedding",
            "wedding" => $wedding,
            "client" => $client,
            "groom" => $groom,
            "bride" => $bride,
            "meetings" => $meetings,
            "payments" => $payments,
            "section" => session('section', 'profile')
        ]);
    }

    public function edit(Wedding $wedding)
    {
        //
    }

    public function update(Request $request, Wedding $wedding)
    {
        //
    }

    public function destroy(Wedding $wedding)
    {
        //
    }

    public function storeChoosedThemeAndVendor(Request $request)
    {
        $validatedData = $request->validate([
            'choosed_vendor' => 'required',
            'choosed_theme' => 'required',
        ]);

        $choosedVendor = explode(',', $validatedData['choosed_vendor']);
        foreach ($choosedVendor as $vendor) {
            WeddingVendor::create([
                'wedding_id' => Auth::user()->client->wedding->id,
                'vendor_id' => $vendor
            ]);
        }

        WeddingTheme::create([
            'wedding_id' => Auth::user()->client->wedding->id,
            'theme_id' => $validatedData['choosed_theme']
        ]);

        return redirect('/dashboard/payment');
    }

    public function pay(Request $request, Payment $payment)
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

        return redirect('/dashboard/payment');
    }
}
