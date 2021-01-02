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

Route::get('/', 'ProductController@home')->name("home");
Route::get('/allProducts', 'ProductController@printAllProducts')->name("allProducts");
Route::get('/addProduct', 'ProductController@addProduct')->name("addProduct");
Route::post('/addProduct', 'ProductController@createProduct')->name("createProduct");
Route::get('/{product}/delete', 'ProductController@delete')->name("product.delete");
Route::get('/meat', 'ProductController@meatProducts')->name("meat");
Route::get('/salads', 'ProductController@saladProducts')->name("salads");
Route::get('/potatoes', 'ProductController@potatoeProducts')->name("potatoes");
Route::get('/drinks', 'ProductController@drinkProducts')->name("drinks");

Route::get('/addOrderLine/{id}', 'ProductController@addToCart')->name('addToCart');
Route::get('/shoppingCart', 'ProductController@getCart')->name('shoppingCart');
Route::get('/reduceOne/{id}', 'ProductController@reduceQuantityByOnee')->name('reduceOne');
Route::get('/removeProduct/{id}', 'ProductController@removeProductFromCart')->name('removeProduct');
Route::get('/updateProduct/{id}', 'ProductController@showUpdateProduct')->name('showUpdateProduct');
Route::post('/updateProduct/{prod}', 'ProductController@updateProduct')->name('updateProduct');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/{user}/updateProfile', 'UserController@updateProfile')->name('updateProfile');
Route::get('/allUsers', 'UserController@allUsers')->name('allUsers');
Route::get('/deleteUSer/{id}', 'UserController@deleteUSer')->name('deleteUser');

Route::post('/finishOrder', 'OrderController@store')->name('finishOrder');
Route::get('/orders', 'OrderController@showOrders')->name('orders');
Route::get('/returnProducts/{order}', 'OrderController@returnProducts')->name('returnProducts');

Route::get('/ordersMoveToProcess/{order}', 'OrderStatusController@moveToProcess')->name('moveToProcess');
Route::get('/ordersMoveToReady/{order}', 'OrderStatusController@moveToReady')->name('moveToReady');

Route::post('/login', 'LoginController@storeLogin')->name("login");
Route::get('/login', 'LoginController@login')->name("login");

Route::get('/logout', 'LoginController@destroyLogout')->name("logout");

Route::post('/registration', 'RegistrationController@create')->name("registration");
Route::get('/registration', 'RegistrationController@add')->name("addUser");
