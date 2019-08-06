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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/master/customer');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    // 'middleware' => ['auth'],
    'namespace' => 'Master',
    'prefix' => 'master'
],function () {
    Route::group([
        'prefix' => 'customer',
        'as' => 'customer.',
    ],function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/data', 'CustomerController@data')->name('data');
        Route::get('/{customer}', 'CustomerController@show')->name('show');
        Route::post('/', 'CustomerController@post')->name('post');
        Route::delete('/{customer}', 'CustomerController@destroy')->name('destroy');
    });
});

Route::group([
    // 'middleware' => ['auth'],
    'namespace' => 'Transaction',
    'prefix' => 'transaction'
],function () {
    Route::group([
        'prefix' => 'sales-detail',
        'as' => 'sales-detail.',
    ],function () {
        Route::get('/', 'SalesDetailController@index')->name('index');
        Route::get('/data', 'SalesDetailController@data')->name('data');
        // Route::get('/{salesDetail}', 'SalesDetailController@show')->name('show');
        // Route::post('/', 'SalesDetailController@post')->name('post');
        // Route::delete('/{salesDetail}', 'SalesDetailController@destroy')->name('destroy');
    });
});
