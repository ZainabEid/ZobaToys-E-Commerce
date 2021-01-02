<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    
        $orders = Order::whereHas('client',function($q) use ($request){
            return $q->where('name', 'LIKE', '%'. $request->search .'%');
        })->latest()->paginate(5);

        return view('adminDashboard.orders.index', compact('orders'));

    }// end of index

    public function show(Order $order)
    {
        return view('adminDashboard.orders.index');
    }// end of show

    public function create()
    {// goto choose the client view (named:create)
        
        $clients = Client::all();
        return view('adminDashboard.orders.create', compact('clients'));
    
    }//end of create

    public function store(Request $request)
    {//redirect to client.purchase.create
        
        $request->validate([
            'client_id' => 'required' ,
        ]);

        $client = Client::findOrFail($request->client_id);
        return redirect()->route('adminDashboard.clients.orders.create' , $client );
   
    }//end of store

    public function products(Order $order)
    {
        $products = $order->products;
        return view('adminDashboard.orders._products', compact('products','order'));
    }// end of products
    
    public function destroy(Order $order)
    {
        foreach ($order->product as $product) {
            
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity,
            ]);

        }// end of foreach

        //dd($order->product->first()->pivot->quantity);
        $order->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.orders.index');
    }//end of destroy

    public function change_status($status, Order $order)
    {
       $order->update([
           'status' => $status,
       ]);
       
       return redirect()->back();
    }// end of change_status

    public function approve_all()
    {
       $orders = Order::where('status', 'created')->get();
       foreach ($orders as  $order) {
           $order->update([
            'status' => 'approved',
        ]);
       }
       
       return redirect()->back();
    }// end of approve_all
    
    public function paid(Order $order)
    {
        $order->update([
            'paid_trigger' => true ,
            'status' => 'approved' ,
        ]);
        
        return redirect()->back();
    }//end of paid()
    

    
}//end of controller
