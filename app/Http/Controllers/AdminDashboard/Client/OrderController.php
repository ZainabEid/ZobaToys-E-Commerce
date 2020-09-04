<?php

namespace App\Http\Controllers\adminDashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  
    public function index()
    {
        //return view('adminDashboard.clients.orders.create');
    }// end of index
    
    
    public function create(Client $client)
    {
        $categories = Category::all();
        return view('adminDashboard.clients.orders.create', compact('client','categories'));
    }// end of create

   
    public function store(Request $request, Client $client)
    {
        //
    }// end of store

    public function show(Order $order)
    {
        //
    }// end of show

    
    public function edit(Order $order, Client $client)
    {
        //
    }// end of edit

    
    public function update(Request $request, Order $order, Client $client)
    {
        //
    }// end of update

   
    public function destroy(Order $order, Client $client)
    {
        //
    }// end of destroy
}
