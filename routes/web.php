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

Route::resource('user','UserController');
Route::resource('customer','CustomerController');
Route::resource('planes','PlanesController');
Route::resource('airport','AirportController');
Route::resource('trains','TrainsController');
Route::resource('station','StationController');
Route::resource('trains_detail','TrainsdetailController');
Route::resource('planes_detail','PlanesdetailController');
Route::resource('planes_schedule','PlanesscheduleController');
Route::resource('planes_reservation','PlanesreservationController');
Route::resource('trains_reservation','TrainsreservationController');
Route::resource('trains_schedule','TrainsscheduleController');
