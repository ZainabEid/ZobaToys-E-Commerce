<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admins_count = Admin::count(); 
        $categories_count = Category::count(); 
        $products_count = Product::count(); 
        $clients_count = Client::count(); 
        $suppliers_count = Supplier::count(); 
        $supplies_count = Supply::count(); 

        // get latest paid delivered orders
        $paid_orders = Order::where('paid_trigger', true)
                            ->where('status','delivered')
                            ->latest()->take(5)->get();

        // get latest paid deliverd purchases 
        $purchases = Purchase::latest()->take(5)->get();

        // get latest un delivered and un canceled orders and purchases
        $active_orders = Order::where('status', 'NOT LIKE','delivered')
                                ->where('status', 'NOT LIKE','canceled')
                                ->latest()->take(10)->get();
       

        return view('adminDashboard.index', compact('admins_count','categories_count','products_count', 'clients_count','suppliers_count', 'supplies_count','paid_orders', 'purchases','active_orders'));
    }
}
