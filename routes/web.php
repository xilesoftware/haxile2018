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


Route::get('/ed', function () {
    return view('ed');
});

Route::get('/emz', function () {
    return view('emz');
});

Route::post('/message', 'MessageController@store')->name('message.store');
