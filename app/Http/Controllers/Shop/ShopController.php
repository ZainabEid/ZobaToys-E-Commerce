<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Wrap;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    public function __construct()
    {
        
    }

    
    public function index()
    {
        return view('shop.index');
    }
}
