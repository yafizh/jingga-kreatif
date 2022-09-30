<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wedding $wedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wedding $wedding)
    {
        //
    }

    public function storeChoosedVendor(Request $request)
    {
        $data = $request->get('choosed_vendor');
        $choosedVendor = explode(',', $data);
        foreach ($choosedVendor as $vendor) {
            WeddingVendor::create([
                'wedding_id' => Auth::user()->client->wedding->id,
                'vendor_id' => $vendor
            ]);
        }

        return redirect('/dashboard/payment');
    }
}
