<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\WeddingVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardWeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function show(Wedding $wedding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
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
