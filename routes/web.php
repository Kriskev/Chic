<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/option','AdminController@showOption')->name('option');

});

Auth::routes();

Route::match(['get','post'],'/store/user','AdminController@store')->name('storeuser');

Route::match(['get','post'],'/update/user/{id}','AdminController@update');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::post('/option/{id}','AdminController@destroyUser');


