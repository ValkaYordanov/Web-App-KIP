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
Auth::routes();

Route::group(
    [
        'middleware' => ['auth'],
    ],
    function () {

        Route::group(
            [
                "prefix" => 'users',
                "as" => 'users.',
                "middleware" => 'admin',
            ],
            function () {

                Route::get('/allUsers', 'UserController@allUsers')->name('index');
                Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('delete');

            }
        );
        Route::group(
            [
                "prefix" => 'products',
                "as" => 'products.',
                "middleware" => 'admin',
            ],
            function () {

                Route::get('/addProduct', 'ProductController@addProduct')->name("add");
                Route::post('/addProduct', 'ProductController@createProduct')->name("add");
                Route::get('/{product}/delete', 'ProductController@delete')->name("delete");
                Route::get('/updateProduct/{id}', 'ProductController@showUpdateProduct')->name('update');
                Route::post('/updateProduct/{prod}', 'ProductController@updateProduct')->name('update');

            }
        );

        Route::group(
            [
                "prefix" => 'orders',
                "as" => 'orders.',
                "middleware" => 'admin',
            ],
            function () {
                Route::get('/orders', 'OrderController@showOrders')->name('orders');
                Route::get('/returnProducts/{order}', 'OrderController@returnProducts')->name('returnProducts');
                Route::get('/ordersMoveToProcess/{order}', 'OrderStatusController@moveToProcess')->name('moveToProcess');
                Route::get('/ordersMoveToReady/{order}', 'OrderStatusController@moveToReady')->name('moveToReady');

            }
        );

        Route::group(
            [

            ],
            function () {
                Route::get('/profile', 'UserController@profile')->name('profile');
                Route::post('/{user}/updateProfile', 'UserController@updateProfile')->name('updateProfile');
                Route::post('/finishOrder', 'OrderController@store')->name('finishOrder');
                Route::get('/logout', 'LoginController@destroyLogout')->name("logout");

            }
        );

    });

Route::get('/', 'ProductController@home')->name("home");

Route::get('/meat', 'ProductController@meatProducts')->name("meat");
Route::get('/salads', 'ProductController@saladProducts')->name("salads");
Route::get('/potatoes', 'ProductController@potatoeProducts')->name("potatoes");
Route::get('/drinks', 'ProductController@drinkProducts')->name("drinks");

Route::get('/addOrderLine/{id}', 'ProductController@addToCart')->name('addToCart');
Route::get('/shoppingCart', 'ProductController@getCart')->name('shoppingCart');
Route::get('/reduceOne/{id}', 'ProductController@reduceQuantityByOnee')->name('reduceOne');
Route::get('/removeProduct/{id}', 'ProductController@removeProductFromCart')->name('removeProduct');

Route::post('/login', 'LoginController@storeLogin')->name("login");
Route::get('/login', 'LoginController@login')->name("login");

Route::post('/registration', 'RegistrationController@create')->name("registration");
Route::get('/registration', 'RegistrationController@add')->name("addUser");

Route::get('/forgottenPassword', 'UserController@setEmail')->name("setEmail");
Route::post('/setEmail', 'UserController@passwordReset')->name("reset");
Route::get('{user}/changePassword', 'UserController@change')->name("change");
Route::post('{user}/changePassword', 'UserController@changePassword')->name("changePassword");

Route::get('/about', 'UserController@aboutPage')->name("about");
Route::get('/contact', 'UserController@contactPage')->name("contact");
