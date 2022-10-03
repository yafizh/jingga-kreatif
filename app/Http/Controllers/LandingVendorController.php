<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Vendor;
use Illuminate\Http\Request;

class LandingVendorController extends Controller
{
    public function index()
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

        return view('landing.page.vendor', [
            "active" => "vendor",
            "vendors" => $vendors,
            "themes" => Theme::where('is_deleted', false)->get()
        ]);
    }
}
