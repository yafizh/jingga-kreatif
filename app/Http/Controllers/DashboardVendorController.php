<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorImage;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardVendorController extends Controller
{
    public function index()
    {
        if (Auth::user()->client) {
            return view('dashboard.client.page.vendor.create', [
                "active" => "vendor",
                "active_navigation" => 5
            ]);
        }
        return view('dashboard.admin.page.vendor.index', [
            "active" => "vendor",
            "vendors" => Vendor::where('is_deleted', false)->latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.vendor.create', [
            "active" => "vendor",
            "vendor_types" => VendorType::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "vendor_type_id" => "required",
            "price" => "required",
            "logo" => "required",
            "description" => "required",
        ]);

        if ($request->file('logo'))
            $validatedData['logo'] = $request->file('logo')->store('vendor-logo');

        $vendor_id = Vendor::create($validatedData)->id;
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                VendorImage::create([
                    'vendor_id' => $vendor_id,
                    'image' => $image->store('vendor-images')
                ]);
            }
        }
        return redirect('/dashboard/vendor')->with('created', $vendor_id);
    }

    public function show(Vendor $vendor)
    {
        //
    }

    public function edit(Vendor $vendor)
    {
        return view('dashboard.admin.page.vendor.edit', [
            "active" => "vendor",
            "vendor" => $vendor,
            "vendor_types" => VendorType::orderBy('name')->get()
        ]);
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);

        if ($request->file('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('vendor-logo');
        }

        if ($request->file('images')) {
            VendorImage::where('vendor_id', $vendor->id)->delete();
            foreach ($request->file('images') as $image) {
                VendorImage::create([
                    'vendor_id' => $vendor->id,
                    'image' => $image->store('vendor-images')
                ]);
            }
        }

        Vendor::where('id', $vendor->id)->update($validatedData);
        return redirect('/dashboard/vendor')->with('updated', $vendor->id);
    }

    public function destroy(Vendor $vendor)
    {
        Vendor::where('id', $vendor->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/vendor')->with('deleted', $vendor->name);
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
                $vendors["vendor"][$vendor->vendor_type_id][] = $vendor;
            } else {
                $vendors["vendor_type_id"][] = $vendor->vendor_type_id;
                $vendor->vendor_type_name = $vendor->vendorType->name;
                $vendors["vendor"][$vendor->vendor_type_id][] = $vendor;
            }
        }
        return response()->json($vendors);
    }
}
