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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('ninja')->group(function () {
    Route::get('/','NinjaController@index')->name('ninja.index');
    Route::get('create','NinjaController@create')->name('ninja.create');
    Route::post('create','NinjaController@store')->name('ninja.store');
    Route::get('edit/{id}','NinjaController@edit')->name('ninja.edit');
    Route::post('edit/{id}','NinjaController@update')->name('ninja.update');
    Route::get('delete/{id}','NinjaController@delete')->name('ninja.delete');
    Route::get('search','NinjaController@search')->name('ninja.search');
});
