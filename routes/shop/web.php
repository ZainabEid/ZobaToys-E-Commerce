<?php

use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

     ##########   [Home] Routes   ##########
     Route::get('/', 'ShopController@index')->name('shop');
    /*
    |--------------------------------------------------------------------------
    | [shop] Routes - prefix: shop - name: shop.
    |--------------------------------------------------------------------------
    */
    Route::prefix('shop')->group(function () {
        Route::name('shop.')->group(function () {

            /*
            |--------------------------------------------------------------------------
            | [UserLogin] Routes - in controller middleware :(guest:user) 
            |--------------------------------------------------------------------------
            */
                Route::group(['namespace' => 'User'], function () {

                Route::post('login', 'UserLoginController@login')->name('login.submit');
                Route::get('login', 'UserLoginController@showLoginForm')->name('login');
                Route::post('logout', 'UserLoginController@logout')->name('logout');
          
                });// end of user login routes


            /*
            |--------------------------------------------------------------------------
            | [Home - ...] Routes - no auth
            |--------------------------------------------------------------------------
            */

            ##########   [Home] Routes   ##########
            Route::get('/', 'ShopController@index')->name('shop');


            ##########   [vendors] Routes   ##########
            Route::resource('vendors', 'VendorController');

             ##########   [categories] Routes   ##########
             Route::resource('categories', 'CategoryController')->except('create','store','edit','update','destroy');


        });// end of shop name
    });// end of shop prefix


});// end of localization prefix

