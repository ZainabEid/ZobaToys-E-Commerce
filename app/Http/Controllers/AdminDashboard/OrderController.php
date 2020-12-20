<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    
        $orders = Order::whereHas('client',function($q) use ($request){
            return $q->where('name', 'LIKE', '%'. $request->search .'%');
        })->paginate(5);

        return view('adminDashboard.orders.index', compact('orders'));

    }// end of index

    public function products(Order $order)
    {
        $products = $order->product;
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
    
}//end of controller
