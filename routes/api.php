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

Route::group(['namespace' => 'Api'], function () {
    
    Route::post('/users', 'UsersController@store');
    Route::post('/emails', 'EmailsController@store');
    
    

    Route::group(['prefix' => 'countries'], function () {
        Route::get('/', 'CountriesController@index');
    });

    Route::group(['prefix' => 'cities'], function () {
        Route::get('/{country_code}', 'CitiesController@index');
    });

    Route::group(['prefix' => 'municipalities'], function () {
        Route::get('/{city_id}', 'MunicipalitiesController@index');
    });
    
    
});


//Route::middleware('auth:api')->group(function () {
//
//    Route::get('/countries', 'CountriesController@index');
//});

