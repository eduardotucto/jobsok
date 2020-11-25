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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/oficios','OficioController@index')->name('oficios.index');
Route::get('/oficios/{id}','UsuarioOficioController@show')->name('oficios.show');
Route::get('/user/{id}','UserController@show')->name('user.show');
Route::get('/solicitando/{id}','TrabajoController@create')->name('trabajo.create');