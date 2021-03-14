<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    } // end of construct`

    public function addToWishlist(Request $request)
    {
        $user_product_review = auth()->user()->userProductIssues->where('product_id', $request->product_id)->first();
        $user_product_review->update(['in_wishlist' => 1]);
        return response()->json(['sucess' => 'added to wishlist']);
    } //end of add to wishlist function

    public function addToCart(Request $request)
    {
        
        $user_product_review = auth()->user()->userProductIssues->where('product_id', $request->product_id)->first();
        $user_product_review->update(['in_cart' => 1]);
        return response()->json(['sucess' => 'added to cart']);
    } //end of add to cart function


}//end of user controller class
