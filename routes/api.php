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

Route::post('logout', 'API\UserController@logout');

Route::post('signin',   'API\UserController@signin');
Route::post('signup',   'API\UserController@signup');


Route::get('seller',        'API\SellerController@index');
Route::get('seller/{id}',   'API\SellerController@show');
Route::post('seller',       'API\SellerController@create');
Route::put('seller/{id}',   'API\SellerController@update');
Route::delete('seller/{id}','API\SellerController@delete');

// User needs to be authenticated to enter here.
Route::middleware(['auth:api'])->group( function () {

        Route::get('user',        'API\UserController@userAccount');
        Route::get('user/logout', 'API\UserController@logout');


        Route::get('product',        'API\ProductsController@index');
        Route::post('product',       'API\ProductsController@create');
        Route::put('product/{id}',   'API\ProductsController@update');
        Route::delete('product/{id}','API\ProductsController@delete');

});

// Products
Route::get('product/{id}',   'API\ProductsController@show');


Route::group(['as' => 'api.', 'namespace' => 'API'], function () {
        /*
         * Outlets Endpoints
         */
        Route::get('locationmap', 'LocationMapController@index')->name('outlets.index');
    });
    

