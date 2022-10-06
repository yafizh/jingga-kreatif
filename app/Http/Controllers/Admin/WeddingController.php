<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Models\WeddingTheme;
use App\Models\WeddingVendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WeddingController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.wedding.index', [
            "active" => "wedding",
            "weddings" => Wedding::where('wedding_status', null)->orderBy('id', 'DESC')->get()
        ]);
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
        $meetingHistory = $wedding->meetingHistory->filter(function ($meeting) {
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

        $wedding_theme = $wedding->theme;

        $vendors = [
            "vendor_type_id" => [],
            "vendor" => [],
            "total_price" => 0
        ];
        foreach ($wedding->vendors as $wedding_vendor) {
            if (in_array($wedding_vendor->vendor_type_id, $vendors["vendor_type_id"])) {
                $wedding_vendor->vendor_type_name = $wedding_vendor->vendor->vendorType->name;
                $wedding_vendor->vendorImages = $wedding_vendor->vendor->vendorImages;
                $vendors["vendor"][$wedding_vendor->vendor_type_id][] = $wedding_vendor->vendor;
            } else {
                $vendors["vendor_type_id"][] = $wedding_vendor->vendor->vendor_type_id;
                $wedding_vendor->vendor_type_name = $wedding_vendor->vendor->vendorType->name;
                $wedding_vendor->vendorImages = $wedding_vendor->vendor->vendorImages;
                $vendors["vendor"][$wedding_vendor->vendor->vendor_type_id][] = $wedding_vendor->vendor;
            }
            $vendors["total_price"] += $wedding_vendor->vendor->price;
        }

        $section = session('section', 'profile');
        Session::forget('section');
        return view('dashboard.admin.page.wedding.show', [
            "active" => "wedding",
            "wedding" => $wedding,
            "client" => $client,
            "groom" => $groom,
            "bride" => $bride,
            "vendors" => $vendors,
            "wedding_theme" => $wedding_theme,
            "meetingHistory" => $meetingHistory,
            "payments" => $payments,
            "section" => $section
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
}
