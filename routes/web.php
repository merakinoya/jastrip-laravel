<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'products' => 'ProductsController',
    'seller' => 'SellerController',
    'userprofile' => 'UserProfileController'
]);


/* 
Route::get('userprofile/edit',[
    'as' => 'userprofile.edit', 
    'uses' => 'UserProfileController@edit'
    ]);
    
Route::patch('usersprofile/{user}/update',[
    'as' => 'usersprofile.update',
    'uses' => 'UserProfileController@update'
    ]);
*/ 

//Ubah profil user
//Route::get('/userprofile/edit','UserProfileController@edit')->name('userprofile.edit');
//Route::patch('/userprofile','UserProfileController@update')->name('userprofile.update');