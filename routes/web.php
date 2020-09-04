<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Seller;
use App\Products;

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

Route::get('/', function ()
{
    $pagename = 'Featured Trips';
    $products = Products::all();

    return view('home', compact('products', 'pagename'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'products' => 'ProductsController',
    'seller' => 'SellerController',
    'userprofile' => 'UserProfileController'
]);

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


// User needs to be authenticated to enter here.
Route::middleware(['auth'])->group(function () {
    
    Route::get('products/create', 'ProductsController@create');
    Route::get('products/{id}/edit', 'ProductsController@edit');



    Route::get('sellerprofile', 'SellerController@edit')->name('sellerprofile.edit');

    //Photo Profile User
    Route::get('photo', 'UserProfileController@photo')->name('userprofile.photo');
    Route::post('photo', 'UserProfileController@uploadPhoto')->name('userprofile.uploadPhoto');

    Route::post('/userprofile','UserProfileController@updatePassword')->name('userprofile.updatePassword');
    
    // Activate Seller
    Route::get('activate-seller', 'UserProfileController@signupSeller')->name('signup-seller');
    Route::post('/activate-seller', 'UserProfileController@activateSeller')->name('activate-seller-now');
});

