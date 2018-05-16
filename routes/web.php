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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function() {
        return redirect('/student');
    });

    Route::resource('user', 'UserController');
    Route::get('user/{id}/status/{status}', 'UserController@updateStatus');

    Route::resource('program-type', 'ProgramTypeController');
    Route::get('program-type/{id}/status/{status}', 'ProgramTypeController@updateStatus');

    Route::resource('program', 'ProgramController');
    Route::get('program/{id}/status/{status}', 'ProgramController@updateStatus');

    Route::resource('ec-province', 'EcProvinceController');
    Route::get('ec-province/{id}/status/{status}', 'EcProvinceController@updateStatus');

    Route::resource('ec-city', 'EcCityController');
    Route::get('ec-city/{id}/status/{status}', 'EcCityController@updateStatus');

    Route::resource('blood-type', 'BloodTypeController');
    Route::get('blood-type/{id}/status/{status}', 'BloodTypeController@updateStatus');

    Route::resource('gender', 'GenderController');
    Route::get('gender/{id}/status/{status}', 'GenderController@updateStatus');

    Route::resource('ethnic-group', 'EthnicGroupController');
    Route::get('ethnic-group/{id}/status/{status}', 'EthnicGroupController@updateStatus');

    Route::resource('country', 'CountryController');
    Route::get('country/{id}/status/{status}', 'CountryController@updateStatus');

    Route::resource('business-area', 'BusinessAreaController');
    Route::get('business-area/{id}/status/{status}', 'BusinessAreaController@updateStatus');

    Route::resource('job-position', 'JobPositionController');
    Route::get('job-position/{id}/status/{status}', 'JobPositionController@updateStatus');

    Route::resource('monthly-income', 'MonthlyIncomeController');
    Route::get('monthly-income/{id}/status/{status}', 'MonthlyIncomeController@updateStatus');

    Route::resource('academic-level', 'AcademicLevelController');
    Route::get('academic-level/{id}/status/{status}', 'AcademicLevelController@updateStatus');

    Route::resource('civil-status', 'CivilStatusController');
    Route::get('civil-status/{id}/status/{status}', 'CivilStatusController@updateStatus');

    Route::resource('job-status', 'JobStatusController');
    Route::get('job-status/{id}/status/{status}', 'JobStatusController@updateStatus');

    Route::resource('language', 'LanguageController');
    Route::get('language/{id}/status/{status}', 'LanguageController@updateStatus');

    Route::resource('working-area', 'WorkingAreaController');
    Route::get('working-area/{id}/status/{status}', 'WorkingAreaController@updateStatus');

    Route::resource('student', 'StudentController');
    Route::get('excel-student', 'StudentController@excel');

    //web api
    Route::get('api-info', 'HomeController@api');
    Route::get('api-info/business-area', 'ApiController@businessArea');
    Route::get('api-info/working-area', 'ApiController@workingArea');
    Route::get('api-info/ec-city', 'ApiController@ecCity');
    Route::get('api-info/civil-status', 'ApiController@civilStatus');
    Route::get('api-info/gender', 'ApiController@gender');
    Route::get('api-info/ethnic-group', 'ApiController@ethnicGroup');
    Route::get('api-info/language', 'ApiController@language');
    Route::get('api-info/monthly-income', 'ApiController@monthlyIncome');
    Route::get('api-info/academic-level', 'ApiController@academicLevel');
    Route::get('api-info/country', 'ApiController@country');
    Route::get('api-info/job-position', 'ApiController@jobPosition');
    Route::get('api-info/program', 'ApiController@program');
    Route::get('api-info/ec-province', 'ApiController@ecProvince');
    Route::get('api-info/program-type', 'ApiController@programType');
    Route::get('api-info/blood-type', 'ApiController@bloodType');

    //reports
    Route::get('reports/mobility', 'ReportsController@mobility');
    Route::get('reports/final-efficiency', 'ReportsController@finalEfficiency');
    Route::post('reports/before-espae-job-position', 'ReportsController@beforeEspaeJobPosition');
    Route::post('reports/had-promotion-after-espae', 'ReportsController@hadPromotionAfterEspae');
    Route::post('reports/had-incomes-increase', 'ReportsController@hadIncomesIncrease');
    Route::post('reports/had-responsabilities-increase', 'ReportsController@hadResponsabilitiesIncrease');
    Route::post('reports/reality-vs-expectative', 'ReportsController@realityVsExpectative');
    Route::post('reports/belong-level-espae', 'ReportsController@belongLevelEspae');
    Route::post('reports/work-knowledge-value', 'ReportsController@workKnowledgeValue');
    Route::post('reports/life-knowledge-value', 'ReportsController@lifeKnowledgeValue');
    Route::post('reports/satisfaction-level-espae', 'ReportsController@satisfactionLevelEspae');
});
//external form for students
Route::get('form/{ext_token}', 'StudentController@externalForm');
Route::post('store-form', 'StudentController@storeExternalForm');
