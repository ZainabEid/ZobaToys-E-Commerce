<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wrap;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    public function __construct()
    {
        
    }//end of construct

    
    public function index()
    {
        $products = Product::all();
        $flash_deals_products = Product::where('in_sale', true)
                                        ->latest()->take(5)->get();
        $new_arrivals_products = Product::latest()->take(18)->get();
        return view('shop.index',compact('flash_deals_products','new_arrivals_products'));
    }// rnd of index

    public function change_currency($currencey)
    {
        
        return redirect()->back();
    }

}// end of shop controller
