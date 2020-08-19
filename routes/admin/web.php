<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

    /*
    |--------------------------------------------------------------------------
    | dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => 'auth:admin'],function() {
        Route::get('/','AdminController@dashboard' )->name('admin.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | login  Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => 'guest:admin'], function(){

        Route::get('/login','LoginController@getlogin')->name('admin.getlogin');
        Route::post('/login','LoginController@login')->name('admin.login');

    });
 });

  


