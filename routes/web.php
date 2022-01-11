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

Route::get('/', 'App\Http\Controllers\indexController@index');
Route::get('/name', 'App\Http\Controllers\indexController@name');
Route::get('/gender', 'App\Http\Controllers\indexController@gender');
Route::get('/age', 'App\Http\Controllers\indexController@age');
Route::get('/all', 'App\Http\Controllers\indexController@index');

Route::get('/view', 'App\Http\Controllers\indexController@view');
Route::get('/del', 'App\Http\Controllers\indexController@del');
Route::get('/add', 'App\Http\Controllers\indexController@add');
Route::get('/mod', 'App\Http\Controllers\indexController@mod');