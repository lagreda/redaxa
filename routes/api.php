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
Route::post('login', 'Auth\LoginController@loginApi');
Route::get('test', function() { dd('test'); });
Route::group(['middleware' => 'auth:api'], function() {

    Route::get('business-area', 'BusinessAreaController@indexAPI');
    Route::get('business-area/{id}', 'BusinessAreaController@showAPI');
    Route::post('business-area', 'BusinessAreaController@storeAPI');
    Route::put('business-area/{id}', 'BusinessAreaController@updateAPI');
    Route::delete('business-area/{id}', 'BusinessAreaController@deleteAPI');

    Route::get('working-area', 'WorkingAreaController@indexAPI');
    Route::get('working-area/{id}', 'WorkingAreaController@showAPI');
    Route::post('working-area', 'WorkingAreaController@storeAPI');
    Route::put('working-area/{id}', 'WorkingAreaController@updateAPI');
    Route::delete('working-area/{id}', 'WorkingAreaController@deleteAPI');

    Route::get('ec-city', 'EcCityController@indexAPI');
    Route::get('ec-city/{id}', 'EcCityController@showAPI');
    Route::post('ec-city', 'EcCityController@storeAPI');
    Route::put('ec-city/{id}', 'EcCityController@updateAPI');
    Route::delete('ec-city/{id}', 'EcCityController@deleteAPI');

    Route::get('civil-status', 'CivilStatusController@indexAPI');
    Route::get('civil-status/{id}', 'CivilStatusController@showAPI');
    Route::post('civil-status', 'CivilStatusController@storeAPI');
    Route::put('civil-status/{id}', 'CivilStatusController@updateAPI');
    Route::delete('civil-status/{id}', 'CivilStatusController@deleteAPI');
});
