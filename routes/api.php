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
Route::post('login', 'AuthController@login');

//Route::middleware('auth')->group(function () {
    Route::get('/users', 'Api\UserApiController@getUsers');

    Route::get('/users/map_data', 'Api\UserApiController@getChartData');

    Route::get('/suppliers', 'Api\SupplierApiController@index');

    Route::get('/suppliers/map_data', 'Api\SupplierApiController@getChartData');
//});
