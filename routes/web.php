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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'HomeController@gettable');

Route::post('/upload', 'HomeController@upload')->name('upload');

Route::get('/merchandise/{id}', 'HomeController@getMerchandise')->name('getpic');

Route::get('/show', 'HomeController@showMerchandise')->name('show');

Route::get('show/{id}', 'HomeController@showOne');

Route::post('order/{id}', 'HomeController@order')->name('order');
