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
        $orders = Order::all(); 
        $purchases = Purchase::all(); 
        return view('adminDashboard.index', compact('admins_count','categories_count','products_count', 'clients_count','suppliers_count', 'supplies_count','orders', 'purchases'));
    }
}
