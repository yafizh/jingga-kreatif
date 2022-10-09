<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Models\WeddingTheme;
use App\Models\WeddingVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeddingController extends Controller
{
    public function index()
    {
        $wedding_id = Auth::user()->client->wedding->id;
        $client_id = Auth::user()->client->id;
        $groom_id = Auth::user()->client->wedding->newlyweds->filter(function ($newlyweds) {
            return $newlyweds->sex;
        })->first()->id;

        $bride_id = Auth::user()->client->wedding->newlyweds->filter(function ($newlyweds) {
            return !$newlyweds->sex;
        })->first()->id;

        return view('dashboard.client.page.setting.index', [
            'active' => 'setting',
            'client' => $client_id,
            'groom' => $groom_id,
            'bride' => $bride_id,
            'wedding' => $wedding_id,
        ]);
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

        return redirect('/payment');
    }

    public function updateChoosedThemeAndVendor(Request $request, Wedding $wedding)
    {
        $validatedData = $request->validate([
            'choosed_vendor' => 'required',
            'choosed_theme' => 'required',
        ]);

        $choosedVendor = explode(',', $validatedData['choosed_vendor']);
        WeddingVendor::where('wedding_id', $wedding->id)->delete();
        foreach ($choosedVendor as $vendor) {
            WeddingVendor::create([
                'wedding_id' => $wedding->id,
                'vendor_id' => $vendor
            ]);
        }

        WeddingTheme::where('wedding_id', $wedding->id)->delete();
        WeddingTheme::create([
            'wedding_id' => $wedding->id,
            'theme_id' => $validatedData['choosed_theme']
        ]);

        return redirect('/theme-vendor/' . $wedding->id . '/edit');
    }
}
