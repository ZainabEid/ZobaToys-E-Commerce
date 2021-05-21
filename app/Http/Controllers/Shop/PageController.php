<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about_us()
    {
        return redirect()->route('shop.pages.about-us');
    }// end of about us page

    public function contact_us()
    {
        return redirect()->route('shop.pages.contact-us');
    }// end of contact us page

}// end of page controller
