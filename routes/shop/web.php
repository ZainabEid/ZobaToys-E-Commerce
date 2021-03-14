<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

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
                // Route::group(['namespace' => 'Auth'], function () {

                //     Route::post('register', 'RegisterController@register')->name('register.submit');
                //     Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
                //     Route::post('login', 'LoginController@login')->name('login.submit');
                //     Route::get('login', 'LoginController@showLoginForm')->name('login');
                //     Route::post('logout', 'LoginController@logout')->name('logout');

                // }); //end of Auth rouets

                //user action routes
                Route::prefix('user')->group(function () {
                    Route::name('user.')->group(function () {

                        ########## User Routes ##########
                        Route::post('addtowishlist/', 'UserController@addToWishlist')->name('addToWishlist');
                        Route::post('addtocart/', 'UserController@addToCart')->name('addToCart');
                        Route::post('star-product/', 'UserController@starProduct')->name('star-product');
                        Route::post('star-vendor/', 'UserController@starVendor')->name('star-vendor');
                        
                        ########## Cart Routes ##########
                        Route::get('cart/show/', 'CartController@show')->name('cart.show');
                        Route::post('cart/edit/', 'CartController@edit')->name('cart.edit');
                        Route::post('cart/order/', 'CartController@order')->name('cart.order');
                        Route::post('cart/clear/', 'CartController@clear')->name('cart.clear');
                        
                        ########## Profile Routes ##########


                    }); // end of user name
                }); // end of user prefix
            }); // end of user namespace



            // ##########   [Home] Routes   ##########
            Route::get('/', 'ShopController@index');


            ##########   [vendors] Routes   ##########
            Route::resource('vendors', 'VendorController');

            ##########   [categories] Routes   ##########
            Route::resource('categories', 'CategoryController')->except('create', 'store', 'edit', 'update', 'destroy');
        }); // end of shop name
    }); // end of shop prefix


});// end of localization prefix
