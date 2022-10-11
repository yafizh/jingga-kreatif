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
    public function index(Request $request)
    {
        if ($request->query('q') === 'finish')
            return view('dashboard.admin.page.wedding.index', [
                "active" => "finish",
                "weddings" => Wedding::where('is_deleted', false)->where('status', true)->orderBy('id', 'DESC')->get()
            ]);

        if ($request->query('q') === 'cancel')
            return view('dashboard.admin.page.wedding.index', [
                "active" => "cancel",
                "weddings" => Wedding::where('is_deleted', false)->where('status', false)->orderBy('id', 'DESC')->get()
            ]);

        return view('dashboard.admin.page.wedding.index', [
            "active" => "wedding",
            "weddings" => Wedding::where('is_deleted', false)->where('status', null)->orderBy('id', 'DESC')->get()
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

        if (is_null($wedding->status))
            $active = "wedding";
        elseif ($wedding->status)
            $active = "finish";
        elseif (!$wedding->status)
            $active = "cancel";

        return view('dashboard.admin.page.wedding.show', [
            "active" => $active,
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

    public function update(Request $request, Wedding $wedding)
    {
        Session::flash('section', 'finish');
        $data = $request->all();

        Wedding::where('id', $wedding->id)->update([
            'wedding_date' => $data['wedding_date'],
            'place' => $data['place'],
            'address' => $data['address'],
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id);
    }

    public function destroy(Wedding $wedding)
    {
        Wedding::where('id', $wedding->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding');
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

    public function cancel(Wedding $wedding)
    {
        Wedding::where('id', $wedding->id)->update([
            'status' => 0
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id);
    }

    public function finish(Wedding $wedding)
    {
        Wedding::where('id', $wedding->id)->update([
            'status' => 1
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id);
    }

    public function print(Wedding $wedding)
    {
        $client = $wedding->client;
        $groom = $wedding->newlyweds->filter(function ($newlywed) {
            return $newlywed->sex;
        })->map(function ($newlywed) {
            $birthdate = new Carbon($newlywed->birthdate);
            $newlywed->birthdate = $birthdate->day . " " . $birthdate->locale('ID')->getTranslatedMonthName() . " " . $birthdate->year;
            return $newlywed;
        })->first();

        $bride = $wedding->newlyweds->filter(function ($newlywed) {
            return !$newlywed->sex;
        })->map(function ($newlywed) {
            $birthdate = new Carbon($newlywed->birthdate);
            $newlywed->birthdate = $birthdate->day . " " . $birthdate->locale('ID')->getTranslatedMonthName() . " " . $birthdate->year;
            return $newlywed;
        })->first();

        $meetingHistory = $wedding->meetingHistory->filter(function ($meeting) {
            return !$meeting->is_deleted;
        })->map(function ($meeting) {
            $meeting_date = new Carbon($meeting->meeting_date);
            $meeting->meeting_date = $meeting_date->day . " " . $meeting_date->locale('ID')->getTranslatedMonthName() . " " . $meeting_date->year;
            $meeting->meeting_day = $meeting_date->locale('ID')->getTranslatedDayName();
            return $meeting;
        });
        $payments = $wedding->payments->filter(function ($payment) {
            return !$payment->is_deleted;
        });

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
        return view('dashboard.admin.page.wedding.print', [
            "active" => "wedding",
            "wedding" => $wedding,
            "client" => $client,
            "groom" => $groom,
            "bride" => $bride,
            "vendors" => $vendors,
            "wedding_theme" => $wedding_theme,
            "meetingHistory" => $meetingHistory,
            "payments" => $payments,
        ]);
    }
}
