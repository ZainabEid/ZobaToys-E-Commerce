<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    } // end of construct

    public function show_cart()
    {
            $cart = auth_user()->cart;
            return view('shop.users.cart', compact('cart'));
    } // end of show cart

    public function add(Request $request, Product $product)
    {
        if ($this->products()->findOrFail($product->id)) {

            return response()->json(['message' => 'this products is already added to the cart']);
        }// end if

        $this->attach_product($product);

        return response()->json(['message' => 'added successfully to the cart']);
    } // end of edit

    public function attach_product($product)
    {
        $cart_product = $this->products()->attach([$product]);


        $total_price = $product->sale_price;

        // foreach(  $request->products as $product_id => $quantity ){  

        //     $product = Product::FindOrFail($product_id);
        //     $total_price += $product->sale_price * $quantity['quantity'];
            
        //     $product->update([
        //         'stock' => $product->stock - $quantity['quantity']
        //         ]);
                
        // }//end of foreach
            
       $cart_product->update(['total_price' => $total_price]);
        
    }// end of attach_product function

    public function clear()
    {
        // detatch all products form cart
        // redirect to show cart
    } // end of clear


}// end of cart class
