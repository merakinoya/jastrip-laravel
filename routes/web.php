<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


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
    $products = Products::all();

    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'products' => 'ProductsController',
    'seller' => 'SellerController',
    'locationmap' => 'LocationMapController'
]);

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


// User needs to be authenticated to enter here.
Route::middleware(['auth'])->group(function () {
    
    Route::get('products/create', 'ProductsController@create');
    Route::get('products/{id}/edit', 'ProductsController@edit');
    

    Route::get('products/{id}/booking', 'BookingController@create')->name('booking.create');
    Route::post('products/{id}/booking', 'BookingController@store')->name('booking.store');

    // Seller
    Route::get('sellerprofile', 'SellerController@edit')->name('sellerprofile.edit');

    //Photo Profile User
    Route::get('photo', 'UserProfileController@photo')->name('userprofile.photo');
    Route::post('photo', 'UserProfileController@uploadPhoto')->name('userprofile.uploadPhoto');
    
    // Password User
    Route::get('/userprofile','UserProfileController@index')->name('userprofile.index');
    Route::post('/userprofile','UserProfileController@updatePassword')->name('userprofile.updatePassword');

    Route::delete('/userprofile/order/{id}','BookingController@delete')->name('booking.delete');
    Route::patch('/userprofile/order/{id}','BookingController@cancelBooking')->name('booking.cancel');


    // User Profile Edit Update
    Route::get('/userprofile/edit/','UserProfileController@edit')->name('userprofile.edit');
    Route::post('/userprofile/edit/','UserProfileController@update')->name('userprofile.update');
    


    // Activate Seller
    Route::get('activate-seller', 'UserProfileController@signupSeller')->name('signup-seller');
    Route::post('/activate-seller', 'UserProfileController@activateSeller')->name('activate-seller-now');
});


/*
 * Map Routes
 */
Route::get('/locationmap/all', 'LocationMapController@getMap')->name('outlet_map.index');


Route::get('/booking', function ()
{
    $pagename = 'Featured Trips';

    return view('booking/summary', compact('pagename'));
});