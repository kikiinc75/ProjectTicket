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

Route::resource('user','UserController');
Route::resource('customer','CustomerController');
Route::resource('planes','PlanesController');
Route::resource('airport','AirportController');
Route::resource('trains','TrainsController');
Route::resource('station','StationController');