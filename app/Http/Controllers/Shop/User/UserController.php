<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // all functions here needs authunticated user

    public function __construct()
    {
        $this->middleware('auth:web');
    } // end of construct`

    public function addToWishlist(Product $product)
    {
        //check if auth_user reviews this product
        // update the pivot in__wishlist
        //if not add product with pivot

        if ($user = auth()->user()) {
            $product->users()->findOrFail($user->id)->pivot->update(['in_wishlist' => 1]);
            return response()->json(['sucess' => 'this product is added to wishlist ']);
        }
    } //end of add to wishlist function

    public function rate(Request $request)
    {
        $rate = $request->rate;
        $rated_table = ($request->product_or_vendor == "product") ? auth_user()->products : auth_user()->vendors;
        $rated_table->findOrFail($request->id)->pivot->update(['rate' => $rate]);

    } // end of rate product


}//end of user controller class
