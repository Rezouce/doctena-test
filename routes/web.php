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
    return view('welcome');
});

Route::get('/appointments', 'AppointmentController@index');
Route::post('/appointments', 'AppointmentController@store');
Route::delete('/appointments/{appointment}', 'AppointmentController@delete');
Route::get('/appointments/{appointment}', 'AppointmentController@show');
Route::put('/appointments/{appointment}', 'AppointmentController@update');

Route::get('/logs', 'LogController@index');
