<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        return view('dashboard.client.page.vendor.create', [
            "active" => "vendor",
            "active_navigation" => 5
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
}
