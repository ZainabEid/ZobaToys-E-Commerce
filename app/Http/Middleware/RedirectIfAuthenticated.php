<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            
            if ($guard == 'client') {

                return redirect(RouteServiceProvider::SHOP);

            }elseif($guard=='admin'){

                return redirect(RouteServiceProvider::DASHBOARD);

            }else {
                
                redirect(RouteServiceProvider::HOME) ;
            }
                    
        }

        return $next($request);
    }
}
