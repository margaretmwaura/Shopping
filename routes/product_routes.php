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

// Protected Routes - allows only logged in users
//Route::middleware('auth')->group(function () {
Route::post('/product/{id?}', 'ProductController@create');

Route::get('/product/delete/{id}', 'ProductController@delete');
//});
