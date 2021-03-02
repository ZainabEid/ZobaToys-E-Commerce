<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('shop/users/auth/user-login');
    }
}
