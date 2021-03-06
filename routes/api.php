<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function(){
    // Login & Logout
    Route::post('/login', 'API\User\Auth\LoginController@login');
    Route::post('/logout', 'API\User\Auth\LoginController@logout');

    // Registration Routes
    Route::post('/register', 'API\User\Auth\RegisterController@register');

    Route::group(['middleware' => 'auth:api'], function() {
        // Meal
        Route::get('/meals', 'API\User\MealController@index');
        Route::get('/meals/{meal}', 'API\User\MealController@show');

        Route::post('/cart/checkout', 'API\User\Checkout@checkout');
        
        Route::get('/order/list', 'API\User\OrderController@index');
        Route::get('/order/{order}', 'API\User\OrderController@show');

    });

});

Route::prefix('/admin')->group(function(){
    // Login & Logout
    Route::post('/login', 'API\Admin\Auth\LoginController@login');
    Route::post('/logout', 'API\Admin\Auth\LoginController@logout');

    Route::group(['middleware' => 'auth:admin-api'], function() {
        // Meal
        Route::post('/topup', 'API\Admin\TopUpController@topup');
    });
});