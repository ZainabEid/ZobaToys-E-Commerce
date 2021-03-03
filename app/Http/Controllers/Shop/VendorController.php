<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function show(Vendor $vendor)
    {
        return view('shop.vendors.show',compact('vendor'));
    }
}
