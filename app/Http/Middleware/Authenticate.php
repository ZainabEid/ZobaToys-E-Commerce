<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {

            if ($request->is('adminDashboard') || $request->is('adminDashboard/*') || $request->is('adminDashboard/*/*') || $request->is(LaravelLocalization::setLocale() . 'adminDashboard/')) {
                return redirect()->guest(route('adminDashboard.login'));
            } elseif ($request->is('shop/user') || $request->is('shop/user/*') || $request->is('shop/user/*/*') || $request->is(LaravelLocalization::setLocale() . 'shop/user/')) {
                return redirect()->guest(route('login'));
            }

            return redirect()->guest(route('login'));
        }
    } // end authenticate



}
