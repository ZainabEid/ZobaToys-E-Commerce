<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
    // put all routes here to add lang to url
    
});


/*
|--------------------------------------------------------------------------
| Admin-Dashboard : [Home] Routes
|--------------------------------------------------------------------------
*/
Route::name('adminDashboard.')->group(function(){
    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/','AdminDashboardController@index')->name('index');


    });

    /*
    |--------------------------------------------------------------------------
    | Admin-Dashboard : [Admin Login] Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['namespace' => 'Admin'], function () {

        Route::post('login','AdminLoginController@login')->name('login.submit');
        Route::get('login','AdminLoginController@showLoginForm')->name('login');
        Route::post('logout','AdminLoginController@logout')->name('logout');
        
    });
    
});

/*
|--------------------------------------------------------------------------
| Admin-Dashboaard / Admin : [Admin] Routes
|--------------------------------------------------------------------------
*/
Route::name('admin.')->prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

        Route::get('/', 'AdminController@index')->name('index');
        Route::post('/', 'AdminController@store')->name('store');
        Route::get('/create', 'AdminController@create')->name('create');
        Route::get('/{admin}/edit', 'AdminController@edit')->name('edit');
        Route::put('/{admin}', 'AdminController@update')->name('update');
        Route::delete('/{admin}', 'AdminController@destroy')->name('destroy');

    });  
    
});

  


