<?php

use App\Http\Controllers\Admin\LoginController;
use App\Role;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    // prefix adminDashboard
    Route::prefix('adminDashboard')->group(function () {
   
        
        /*
        |--------------------------------------------------------------------------
        | [adminDahboade] Routes - name: adminDashboard
        |--------------------------------------------------------------------------
        */
        Route::name('adminDashboard.')->group(function () {

            /*
            |--------------------------------------------------------------------------
            | [AdminLogin] Routes - in controller middleware :(guest:admin) 
            |--------------------------------------------------------------------------
            | should have (namespace: auth,)
            */
            Route::group(['namespace' => 'Admin'], function () {

                Route::post('login', 'AdminLoginController@login')->name('login.submit');
                Route::get('login', 'AdminLoginController@showLoginForm')->name('login');
                Route::post('logout', 'AdminLoginController@logout')->name('logout');
          
            });// end of admin login routes

            /*
            |--------------------------------------------------------------------------
            | [Home - Categories] Routes - Auth:admin
            |--------------------------------------------------------------------------
            */
            Route::group(['middleware' => 'auth:admin'], function () {

                ##########   [Home] Routes   ##########
                Route::get('/', 'AdminDashboardController@index')->name('index');
                
                ##########   [Categories] Routes   ##########
                Route::resource('categories', 'CategoryController')->except(['show']);

                ##########   [products] Routes   ##########
                Route::resource('products', 'ProductController');
                Route::resource('productimages', 'ProductimageController');
                
                ##########   [clients] , [clients.orders] Routes   ##########
                Route::resource('clients', 'ClientController');
                Route::resource('clients.orders', 'Client\OrderController');
                
                ##########   [orders] Routes   ##########
                Route::resource('orders', 'OrderController');
                Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
                
                ##########   [groups] Routes   ##########
                Route::resource('groups', 'GroupController')->except(['show']);
                
                ##########   [Supplies] Routes   ##########
                Route::resource('supplies', 'SupplyController')->except(['show']);
                
                ##########   [Suppliers] Routes   ##########
                Route::resource('suppliers', 'Supplier\SupplierController')->except(['show']);
                Route::resource('suppliers.purchases', 'Supplier\PurchaseController');
                
                ##########   [Purchase] Routes   ##########
                Route::resource('purchases', 'PurchaseController')->except(['show']);
                Route::get('/purchases/{purchase}/supplies', 'PurchaseController@supplies')->name('purchases.supplies');
                

            });//end of auth:admin


        });// end of name adminDashboard

        /*
        |------------------------------------------------------------------------------|
        | [Admin] Routes - auth:admin - name: admin - prefix: admin - namespace: Admin |
        |------------------------------------------------------------------------------|
        | should be Route::resouce('admin', 'AdminController')->except(['show']);
        | should be inside name: adminDashboard group with namespace: Admin
        | then change all route calling in all blades to be adminDashboard.admin.craeate
        */
        Route::name('admin.')->prefix('admin')->group(function () {
            Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

                Route::get('/', 'AdminController@index')->name('index');
                Route::post('/', 'AdminController@store')->name('store');
                Route::get('/create', 'AdminController@create')->name('create');
                Route::get('/{admin}/edit', 'AdminController@edit')->name('edit');
                Route::put('/{admin}', 'AdminController@update')->name('update');
                Route::delete('/{admin}', 'AdminController@destroy')->name('destroy');

            }); //auth: admin, namespace: Admin

        }); // name: , prefix: admin

    
    }); // end of adminDashboard prefix

});
 // end of localization

