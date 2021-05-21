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

             ##########   [User] Routes   ##########
            Route::group(['namespace' => 'User'], function () {
                // Route::group(['namespace' => 'Auth'], function () {

                //     Route::post('register', 'RegisterController@register')->name('register.submit');
                //     Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
                //     Route::post('login', 'LoginController@login')->name('login.submit');
                //     Route::get('login', 'LoginController@showLoginForm')->name('login');
                //     Route::post('logout', 'LoginController@logout')->name('logout');

                // }); //end of Auth rouets

                //user action routes
                Route::group( ['prefix' => 'user' , 'name' => 'user.'],function () {
                    Route::name('user.')->group(function () {

                        ########## User Routes ##########
                        Route::post('add-to-wishlist/{product}', 'UserController@addToWishlist')->name('add-to-wishlist');
                        Route::post('rate/', 'UserController@rate')->name('rate');
                        
                        
                        ########## Cart Routes ##########
                        Route::get('cart/show', 'CartController@show_cart')->name('cart.show');
                        Route::post('cart/add/{product}', 'CartController@add')->name('cart.add');
                        Route::post('cart/order/', 'CartController@order')->name('cart.order');
                        Route::post('cart/clear/', 'CartController@clear')->name('cart.clear');
                        
                        ########## order Routes ##########
                        Route::resource('order', 'OrderController');

                       
                       
                        ########## Profile Routes ##########


                    }); // end of user name
                }); // end of user prefix
            }); // end of User namespace


            // ##########   [Home] Routes   ##########
            Route::get('/', 'ShopController@index');
            
            // ##########   [subscribe] Routes   ##########
            Route::get('/subscribe', 'ShopController@subscribe')->name('subscribe');

             ########## pages Routes ##########
             Route::get('pages/about-us', 'PageController@about_us')->name('pages.about-us');
             Route::get('pages/contact-us', 'PageController@contact_us')->name('pages.contact-us');
             Route::get('pages/blog', 'PageController@blog')->name('pages.blog');


            ##########   [vendors] Routes   ##########
            Route::resource('vendors', 'VendorController');

            ##########   [categories] Routes   ##########
            Route::resource('categories', 'CategoryController')->except('create', 'store', 'edit', 'update', 'destroy');
        }); // end of shop name
    }); // end of shop prefix


});// end of localization prefix
