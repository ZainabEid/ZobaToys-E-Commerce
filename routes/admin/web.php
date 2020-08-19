<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

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
Route::group(['name' => 'admin.','middleware' => 'guest:admin'], function(){

    Route::get('/login','LoginController@getlogin');
    Route::post('/login','LoginController@login')->name('login');

    });
