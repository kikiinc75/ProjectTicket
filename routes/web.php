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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/transaksi/form-transaksi',function(){return view('transaksi/form-transaksi');});
Route::get('/transaksi/create-transaksi',function(){return view('transaksi/create-transaksi');});
Route::get('/customer/form-customer',function(){return view('customer/form-customer');});
Route::get('/customer/create-customer',function(){return view('customer/create-customer');});
Route::get('/rute/create-rute',function(){return view('rute/create-rute');});

Route::resource('user','UserController');
