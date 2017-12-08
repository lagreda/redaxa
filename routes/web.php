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

Route::get('/', 'Auth\LoginController@verifyAuth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::get('user/{id}/status/{status}', 'UserController@updateStatus');

Route::resource('program-type', 'ProgramTypeController');
Route::get('program-type/{id}/status/{status}', 'ProgramTypeController@updateStatus');

Route::resource('program', 'ProgramController');
Route::get('program/{id}/status/{status}', 'ProgramController@updateStatus');

Route::resource('ec-province', 'EcProvinceController');
Route::get('ec-province/{id}/status/{status}', 'EcProvinceController@updateStatus');
