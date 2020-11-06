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

Route::post('/login', 'LoginController@storeLogin')->name("login");
Route::get('/login', 'LoginController@login')->name("login");

Route::get('/logout', 'LoginController@destroyLogout')->name("logout");

Route::post('/registration', 'RegistrationController@create')->name("registration");
Route::get('/registration', 'RegistrationController@add')->name("addUser");
