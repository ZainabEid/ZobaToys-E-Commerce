<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('shop.categories.index');
    }//end of index

    public function show(Category $category)
    {
        return view('shop.categories.show',compact('category'));
    }//end of show
}// end of shop category controller
