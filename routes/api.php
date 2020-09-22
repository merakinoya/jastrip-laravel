<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Seller; // Opsional panggil Model jika ingin Gabung Controller dengan Router

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

Route::middleware('auth:api')->get('/user',

    function (Request $request) {
        return $request->user();
    }
);

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


/** CARA ROUTE GABUNG CONTROLLER
 * 
 Route::get('sellers', function () {
     // If the Content-Type and Accept headers are set to 'application/json', 
     // this will return a JSON structure. This will be cleaned up later.
     return Seller::all();
 });
 Route::get('sellers/{id}', function ($id) {
     return Seller::find($id);
 });
 
 
 Route::post('sellers', function (Request $request) {
     return Seller::create($request->all);
 });
 
 
 Route::put('sellers/{id}', function (Request $request, $id) {
     $seller = Seller::findOrFail($id);
     $seller->update($request->all());
 
     return $seller;
 });
 
 Route::delete('sellers/{id}', function ($id) {
     Seller::find($id)->delete();
 
     return 204;
 });
 */

