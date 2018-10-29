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
Route::get('/transportation/view_transportation',function(){return view('transportation/view_transportation');});
Route::get('/transportation/create_transportation',function(){return view('transportation/create_transportation');});
Route::get('/transportation/edit_transportation',function(){return view('transportation/edit_transportation');});
Route::get('/customer/view_customer',function(){return view('customer/view_customer');});
Route::get('/customer/edit_customer',function(){return view('customer/edit_customer');});
Route::get('/customer/create_customer',function(){return view('customer/create_customer');});
Route::get('/rute/create_rute',function(){return view('rute/create_rute');});
Route::get('/rute/view_rute',function(){return view('rute/view_rute');});
Route::get('/rute/edit_rute',function(){return view('rute/edit_rute');});
Route::get('/reservation/create_reservation',function(){return view('reservation/create_reservation');});

Route::resource('user','UserController');
