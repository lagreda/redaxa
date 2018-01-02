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

    Route::get('gender', 'GenderController@indexAPI');
    Route::get('gender/{id}', 'GenderController@showAPI');
    Route::post('gender', 'GenderController@storeAPI');
    Route::put('gender/{id}', 'GenderController@updateAPI');
    Route::delete('gender/{id}', 'GenderController@deleteAPI');

    Route::get('ethnic-group', 'EthnicGroupController@indexAPI');
    Route::get('ethnic-group/{id}', 'EthnicGroupController@showAPI');
    Route::post('ethnic-group', 'EthnicGroupController@storeAPI');
    Route::put('ethnic-group/{id}', 'EthnicGroupController@updateAPI');
    Route::delete('ethnic-group/{id}', 'EthnicGroupController@deleteAPI');

    Route::get('language', 'LanguageController@indexAPI');
    Route::get('language/{id}', 'LanguageController@showAPI');
    Route::post('language', 'LanguageController@storeAPI');
    Route::put('language/{id}', 'LanguageController@updateAPI');
    Route::delete('language/{id}', 'LanguageController@deleteAPI');

    Route::get('monthly-income', 'MonthlyIncomeController@indexAPI');
    Route::get('monthly-income/{id}', 'MonthlyIncomeController@showAPI');
    Route::post('monthly-income', 'MonthlyIncomeController@storeAPI');
    Route::put('monthly-income/{id}', 'MonthlyIncomeController@updateAPI');
    Route::delete('monthly-income/{id}', 'MonthlyIncomeController@deleteAPI');

    Route::get('academic-level', 'AcademicLevelController@indexAPI');
    Route::get('academic-level/{id}', 'AcademicLevelController@showAPI');
    Route::post('academic-level', 'AcademicLevelController@storeAPI');
    Route::put('academic-level/{id}', 'AcademicLevelController@updateAPI');
    Route::delete('academic-level/{id}', 'AcademicLevelController@deleteAPI');

    Route::get('country', 'CountryController@indexAPI');
    Route::get('country/{id}', 'CountryController@showAPI');
    Route::post('country', 'CountryController@storeAPI');
    Route::put('country/{id}', 'CountryController@updateAPI');
    Route::delete('country/{id}', 'CountryController@deleteAPI');

    Route::get('job-position', 'JobPositionController@indexAPI');
    Route::get('job-position/{id}', 'JobPositionController@showAPI');
    Route::post('job-position', 'JobPositionController@storeAPI');
    Route::put('job-position/{id}', 'JobPositionController@updateAPI');
    Route::delete('job-position/{id}', 'JobPositionController@deleteAPI');

    Route::get('program', 'ProgramController@indexAPI');
    Route::get('program/{id}', 'ProgramController@showAPI');
    Route::post('program', 'ProgramController@storeAPI');
    Route::put('program/{id}', 'ProgramController@updateAPI');
    Route::delete('program/{id}', 'ProgramController@deleteAPI');

    Route::get('ec-province', 'EcProvinceController@indexAPI');
    Route::get('ec-province/{id}', 'EcProvinceController@showAPI');
    Route::post('ec-province', 'EcProvinceController@storeAPI');
    Route::put('ec-province/{id}', 'EcProvinceController@updateAPI');
    Route::delete('ec-province/{id}', 'EcProvinceController@deleteAPI');

    Route::get('program-type', 'ProgramTypeController@indexAPI');
    Route::get('program-type/{id}', 'ProgramTypeController@showAPI');
    Route::post('program-type', 'ProgramTypeController@storeAPI');
    Route::put('program-type/{id}', 'ProgramTypeController@updateAPI');
    Route::delete('program-type/{id}', 'ProgramTypeController@deleteAPI');
});
