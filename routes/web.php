<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/', function () {
        return view('shop.index');
    });

   // Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
  

});

