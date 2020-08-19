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
Route::name('admin.')->group(['middleware' => 'guest:admin'], function(){

    Route::get('/login','LoginController@getlogin')->name('getlogin');
    Route::post('/login','LoginController@login')->name('login');

    });
