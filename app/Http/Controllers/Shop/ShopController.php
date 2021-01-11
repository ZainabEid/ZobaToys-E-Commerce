<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    
    public function index()
    {
        return view('shop.index');
    }
}
