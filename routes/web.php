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

Route::get('/login','AuthController@getLogin');
Route::post('/login','AuthController@postDataLogin');
Route::post('/logout','AuthController@logout');

Route::get('/petugas', function () {
    return view('welcome');
})->middleware('auth:petugas');

Route::get('/masyarakat',function(){
    return view('masyarakat.index');
})->middleware('auth:user');
