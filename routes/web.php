<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;


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

Route::get('/hall', 'App\Http\Controllers\HallController@index')->middleware('auth');
Route::get('/add-hall', 'App\Http\Controllers\HallController@create')->middleware('auth');
Route::post('/add-hall', 'App\Http\Controllers\HallController@store');
Route::get('/edit-hall/{hall}', 'App\Http\Controllers\HallController@edit')->middleware('auth');
Route::put('/edit-hall/{hall}', 'App\Http\Controllers\HallController@update')->middleware('auth');
Route::delete('/delete-hall/{hall}', 'App\Http\Controllers\HallController@delete')->middleware('auth');
Route::get('/hall/{hall}', 'App\Http\Controllers\HallController@show');

Route::delete('/deleteimage/{id}','App\Http\Controllers\HallController@deleteimage')->middleware('auth');
Route::delete('/deletecover/{id}','App\Http\Controllers\HallController@deletecover')->middleware('auth');

Route::get('/package', 'App\Http\Controllers\PackageController@index')->middleware('auth');
Route::get('/add-package', 'App\Http\Controllers\PackageController@create')->middleware('auth');
Route::post('/add-package', 'App\Http\Controllers\PackageController@store');
Route::get('/edit-package/{package}', 'App\Http\Controllers\PackageController@edit')->middleware('auth');
Route::put('/edit-package/{package}', 'App\Http\Controllers\PackageController@update')->middleware('auth');
Route::delete('/delete-package/{package}', 'App\Http\Controllers\PackageController@delete')->middleware('auth');

Route::resource('search', 'App\Http\Controllers\SearchController');
Route::get('/home', 'App\Http\Controllers\HomeController@gallery');

Route::get('/', function(){
    return view('landing');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirects', 'App\Http\Controllers\HomeController@index');

//Booking Page
Route::get('/booking/{hall}', 'App\Http\Controllers\BookingController@index')->middleware('auth');
Route::post('/booking/{hall}', 'App\Http\Controllers\BookingController@store')->middleware('auth');

//Checkout Page -just untuk try. sebab lepas book akan terus ke checkout page-
Route::get('checkout/{bookingID}', 'App\Http\Controllers\BookingController@checkout')->middleware('auth');

//Payment using PayPal
Route::get('/payment', 'App\Http\Controllers\PaymentController@index');
Route::post('charge', 'App\Http\Controllers\PaymentController@charge');
Route::get('success', 'App\Http\Controllers\PaymentController@success');
Route::get('error', 'App\Http\Controllers\PaymentController@error');
/*Route::get('/userbooking', function(){
    return view('booking.userbooking');
});*/

Route::get('/userbooking/{userId}', 'App\Http\Controllers\userbookingController@index')->middleware('auth');
Route::put('/edit-userbooking/{booking}', 'App\Http\Controllers\userbookingController@edit')->middleware('auth');
Route::delete('/userbooking/{booking}', 'App\Http\Controllers\userbookingController@delete')->middleware('auth');

/*Route::get('/adminbooking', function(){
    return view('booking.adminbooking');
});*/
Route::get('/adminbooking', 'App\Http\Controllers\adminbookingController@index');
Route::delete('/adminbooking/{booking}', 'App\Http\Controllers\adminbookingController@delete');
Route::get('/search-booking', 'App\Http\Controllers\adminbookingController@search');

//Route::get('/redirects', 'App\Http\Controllers\DashboardController@chart');