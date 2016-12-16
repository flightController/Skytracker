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

Route::get('flight', 'FlightController@flightList');
Route::get('flight/{ident}', 'FlightController@flight');

Auth::routes();
Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
