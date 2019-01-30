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

    return view('welcome');
});*/

Route::get('/', 'ChavoController@index')->name('chavo.lists');
Route::get('/cards', 'ChavoController@cards')->name('chavo.cards');
Route::get('/create', 'ChavoController@create')->name('chavo.create');
Route::post('/store', 'ChavoController@store')->name('chavo.store');
Route::get('/{id}/edit', 'ChavoController@edit')->name('chavo.edit');
Route::get('delete/{id}', 'ChavoController@delete')->name('chavo.delete');