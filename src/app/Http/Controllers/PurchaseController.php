<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseItems()
    {
        return view('purchase');
    }
    public function redirectAddress()
    {
        return view('redirect');
    }

}
