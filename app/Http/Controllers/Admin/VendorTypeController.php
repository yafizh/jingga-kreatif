<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorTypeController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.vendor_type.index', [
            "active" => "vendor_type",
            "vendor_types" => VendorType::orderBy('name')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.vendor_type.create', [
            "active" => "vendor_type",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "description" => "",
        ]);

        $vendor_type_id = VendorType::create($validatedData)->id;
        return redirect('/dashboard/vendor-type')->with('created', $vendor_type_id);
    }

    public function edit(VendorType $vendorType)
    {
        return view('dashboard.admin.page.vendor_type.edit', [
            "active" => "vendor_type",
            "vendor_type" => $vendorType
        ]);
    }

    public function update(Request $request, VendorType $vendorType)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "description" => "",
        ]);

        VendorType::where('id', $vendorType->id)->update($validatedData);
        return redirect('/dashboard/vendor-type')->with('updated', $vendorType->id);
    }

    public function destroy(VendorType $vendorType)
    {
        VendorType::destroy($vendorType->id);
        return redirect('/dashboard/vendor-type')->with('deleted', $vendorType->name);
    }
}
