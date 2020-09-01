<?php

use App\Http\Controllers\Admin\LoginController;
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

