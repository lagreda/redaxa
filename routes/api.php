<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::get('business-area', 'BusinessAreaController@indexAPI');
Route::get('business-area/{id}', 'BusinessAreaController@showAPI');
Route::post('business-area', 'BusinessAreaController@storeAPI');
Route::put('business-area/{id}', 'BusinessAreaController@updateAPI');
Route::delete('business-area/{id}', 'BusinessAreaController@deleteAPI');