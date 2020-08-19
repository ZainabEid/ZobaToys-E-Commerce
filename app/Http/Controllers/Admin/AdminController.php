<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * dashboard represents index of admin routes
     * @return view
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
