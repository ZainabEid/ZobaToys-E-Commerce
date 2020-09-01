<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productimage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function show(Productimage $productimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productimage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function edit(Productimage $productimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productimage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productimage $productimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productimage  $productimage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productimage $productimage)
    {
        dd($productimage->image);
       $product = $productimage->product;
        if ($productimage->image != 'default.png' ){
            Storage::disk('public_uploads')->delete('product_images/'.$productimage->image);
        }
        $productimage->delete();

        // check if there is no image add default
        if( !$product->productimage()->first() ){
            $product_image = new Productimage();
            $product->productimage()->save($product_image);
        }
        return redirect()->back();
    }
}
