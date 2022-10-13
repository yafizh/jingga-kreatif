<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {
        return view('dashboard.client.page.vendor.create', [
            "active" => "vendor",
            "active_navigation" => 5
        ]);
    }

    public function edit(Wedding $wedding)
    {
        if (!$this->isAuthorized(Auth::user()->client->id, $wedding->client->id))
            abort(403, 'UNAUTHORIZED ACTION');

        $vendors = [];
        $total_price = 0;
        foreach ($wedding->vendors as $vendor) {
            $vendors[] = $vendor->vendor_id;
            $total_price += $vendor->vendor->price;
        }
        return view('dashboard.client.page.vendor.edit', [
            'active' => 'setting.theme-vendor',
            'theme' => $wedding->theme->theme_id,
            'vendors' => implode(',', $vendors),
            'total_price' => $total_price,
            'wedding' => $wedding
        ]);
    }

    public function getCategorizedVendor()
    {
        $vendors = [
            "vendor_type_id" => [],
            "vendor" => [],
        ];
        foreach (Vendor::where('is_deleted', false)->get() as $vendor) {
            if (in_array($vendor->vendor_type_id, $vendors["vendor_type_id"])) {
                $vendor->vendor_type_name = $vendor->vendorType->name;
                $vendor->vendorImages = $vendor->vendorImages;
                $vendors["vendor"][$vendor->vendor_type_id][] = $vendor;
            } else {
                $vendors["vendor_type_id"][] = $vendor->vendor_type_id;
                $vendor->vendor_type_name = $vendor->vendorType->name;
                $vendor->vendorImages = $vendor->vendorImages;
                $vendors["vendor"][$vendor->vendor_type_id][] = $vendor;
            }
        }
        return response()->json($vendors);
    }

    public function isAuthorized($client_id, $client_id_newlywed)
    {
        // Apakah mempelai ini merupakan mempelai dari client dengan id yang benar
        if ($client_id === $client_id_newlywed) return true;

        return false;
    }
}
