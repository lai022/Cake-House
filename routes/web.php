<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/cakes','App\Http\Controllers\CakeController@index')->name('cakes.index');
Route::get('/cakes/create','App\Http\Controllers\CakeController@create')->name('cakes.create');
Route::post('/cakes','App\Http\Controllers\CakeController@store')->name('cakes.store');
Route::get('/cakes/{id}','App\Http\Controllers\CakeController@show')->name('cakes.show');
Route::get('/cakes/modify/{id}','App\Http\Controllers\CakeController@modify')->name('cakes.modify');
Route::put('/cakes/change/{id}','App\Http\Controllers\CakeController@change')->name('cakes.change');
Route::delete('/cakes/{id}','App\Http\Controllers\CakeController@delete')->name('cakes.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
