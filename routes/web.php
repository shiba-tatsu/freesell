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

/*Route::get('/', function () {
|    return view('welcome');
|});
*/

Route::get('/', 'ItemController@index')->name('item.index');
Route::get('/items/create', 'ItemController@create')->name('item.create')->middleware('auth');
Route::post('/items/create', 'ItemController@store')->name('item.store');
Route::get('/items/{item}/show', 'ItemController@show');

Route::get('/items/{item}/edit', 'ItemController@edit')->name('item.edit')->middleware('auth');;
//Route::resource('/items', 'ItemController')->except(['index', 'show', 'update', 'create', 'store'])->middleware('auth');
Route::patch('/items/{item}/', 'ItemController@update')->name('item.update')->middleware('auth');
Route::post('/items/{item}/delete', 'ContactFormController@destroy')->name('contact.destroy')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
