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
Route::post('contact/show','ContactController@show')->name('contact_show');
Route::get('contact','ContactController@index')->name('contact');
Route::put('contact', 'ContactController@update')->name('contact_update');


Route::get('/', 'ContactController@index');
