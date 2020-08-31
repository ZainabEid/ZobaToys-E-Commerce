<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            
            if ($request->is('adminDashboard') || $request->is('adminDashboard/*') || $request->is(LaravelLocalization::setLocale().'adminDashboard/' )) {
                return redirect()->guest(route('adminDashboard.login'));
            }
            
            return redirect()->guest(route('login'));
            
        }
    }
}
