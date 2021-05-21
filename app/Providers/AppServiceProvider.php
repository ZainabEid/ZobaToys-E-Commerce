<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserTableObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserTableObserver::class);
        Schema::defaultStringLength(191);
           
       //check if current locale is empty if so a default locale must be provided 
        if(!Session::has('locale')) {
            session(['local' => 'ar']);
        }
        setlocale(LC_ALL, config('app.locale') . '.utf8');
        Carbon::setLocale(config('app.locale'));
    }
}
