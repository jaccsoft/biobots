<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Front Routes
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'FrontController@index');
Route::get('show/{id}', 'FrontController@showProfile');
Route::post('importFile', ['as' => 'addentry', 'uses' => 'FrontController@importFile']);

//Chart Routes
Route::get('printDataChart/{id}', 'ChartController@printDataChart');
Route::get('printCrosslinkChart/{id}', 'ChartController@printCrosslinkChart');
Route::get('printFilesChart/{id}', 'ChartController@printFilesChart');
Route::get('printPressureChart/{id}', 'ChartController@printPressureChart');
Route::get('printResolutionChart/{id}', 'ChartController@printResolutionChart');