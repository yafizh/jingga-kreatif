<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bank;

class BankController extends Controller
{
    public function getAllBank()
    {
        return response()->json(Bank::where('is_deleted', false)->get());
    }
}
