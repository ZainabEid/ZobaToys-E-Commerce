<?php

namespace App\Http\Controllers\adminDashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
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
        $orders = $client->order()->with('product')->paginate(5);
        return view('adminDashboard.clients.orders.create', compact('client','categories','orders'));
    }// end of create

   
    public function store(Request $request, Client $client)
    {
       $request->validate([
           'products'=>'required|array',
       ]);

       $this->attach_order($request,$client);

      
       session()->flash('success', __('site.added_successfully'));
       return redirect()->route('adminDashboard.orders.index');

    }// end of store


    
    public function edit(Client $client , Order $order)
    {
        $categories = Category::with('products')->get();
       return view('adminDashboard.clients.orders.edit', compact('client','order','categories'));
        
    }// end of edit

    
    public function update(  Client $client, Order $order,Request $request)
    {
        $request->validate([
            'products'=>'required|array',
        ]);

        $this->detach_order($order);
        // dd('order is deleted');
        $this->attach_order($request,$client);

        session()->flash('success',__('site.updated-successfuly'));
        return redirect()->route('adminDashboard.orders.index');

    }// end of update

   
    public function destroy(Order $order, Client $client)
    {
        //
    }// end of destroy

    private function attach_order($request,$client)      
    {
        $order = $client->order()->create([]);
       $order->product()->attach($request->products);


       $total_price = 0;

        foreach(  $request->products as $product_id => $quantity ){  

            $product = Product::FindOrFail($product_id);
            $total_price += $product->sale_price * $quantity['quantity'];
            
            $product->update([
                'stock' => $product->stock - $quantity['quantity']
                ]);
                
        }//end of foreach
            
       $order -> update(['total_price' => $total_price]);
    }//end of attach order

    private function detach_order($order)
    {
        
        foreach ($order->product as $product) {
            
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity,
            ]);

        }// end of foreach

        $order->delete();
    }
}
