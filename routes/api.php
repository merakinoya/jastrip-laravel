<?php

use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user');

Route::post('login',    'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::post('signin',   'API\UserController@signin');
Route::post('signup',   'API\UserController@signup');


Route::get('seller',        'API\SellerController@index');
Route::get('seller/{id}',   'API\SellerController@show');
Route::post('seller',       'API\SellerController@create');
Route::put('seller/{id}',   'API\SellerController@update');
Route::delete('seller/{id}','API\SellerController@delete');

Route::get('product',        'API\ProductsController@index');
Route::get('product/{id}',   'API\ProductsController@show');
Route::post('product',       'API\ProductsController@create');
Route::put('product/{id}',   'API\ProductsController@update');
Route::delete('product/{id}','API\ProductsController@delete');

