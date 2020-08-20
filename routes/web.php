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

Route::prefix('/user')->group(function(){
    Route::get('/home', 'User\HomeController@index')->name('user.home');
    
    // Login & Logout
    Route::post('/login', 'User\Auth\LoginController@login');
    Route::get('/login', 'User\Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/logout', 'User\Auth\LoginController@logout')->name('user.logout');

    // Password Confirm
    Route::get('/password/confirm', 'User\Auth\ConfirmPasswordController@showConfirmForm')->name('user.password.confirm');
    Route::post('/password/confirm', 'User\Auth\ConfirmPasswordController@confirm');
    
    // Password Reset
    Route::post('/password/email', 'User\Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('/password/reset', 'User\Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/reset', 'User\Auth\ResetPasswordController@reset')->name('user.password.update');
    Route::get('/password/reset/{token}', 'User\Auth\ResetPasswordController@showResetForm')->name('user.password.reset');

    // Registration Routes...
    Route::post('/register', 'User\Auth\RegisterController@register');
    Route::get('/register', 'User\Auth\RegisterController@showRegistrationForm')->name('user.register');

    // Email Verification
    Route::post('/email/resend', 'User\Auth\VerificationController@resend')->name('user.verification.resend');
    Route::get('/email/verify', 'User\Auth\VerificationController@show')->name('user.verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'User\Auth\VerificationController@verify')->name('user.verification.verify');    

    // Stall
    Route::get('/stall/list', 'User\Stall\ListStalls@index')->name('user.stall.list');
    Route::get('/stall/{stall_id}', 'User\Stall\ListStalls@showStallDetails')->name('user.stall.retrive');

    // Meal
    Route::get('/meal/{meal_id}', 'User\Meal\RetriveMeal@index')->name('user.meal.retrive');
    
    // Order
    Route::post('/cart/add', 'User\Cart\UpdateCart@addToCart')->name('user.cart.add');
    Route::get('/cart/list', 'User\Cart\ListCart@index')->name('user.cart.list');
    Route::get('/cart/delete/{meal_id}', 'User\Cart\RemoveItem@removeItem')->name('user.cart.delete');

});


Route::redirect('/admin', 'home');
Route::prefix('admin')->group(function(){
    Route::get('/home', 'Admin\AdminController@index')->name('admin.home');
    
    // Authentication
    Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

    // Password Reset
    Route::post('/password/email', 'Admin\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Admin\Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // Top Up
    Route::get('/credit/topup', 'Admin\Credit\TopUpController@index')->name('admin.credit.topup');
    Route::post('/credit/topup', 'Admin\Credit\TopUpController@topUp')->name('admin.credit.topup.submit');

    // Meal
    Route::redirect('/meal', 'list');
    Route::get('/meal/list', 'Admin\Meal\ListMeals@index')->name('admin.meal.list');
    Route::get('/meal/create', 'Admin\Meal\CreateMeal@index')->name('admin.meal.create');
    Route::post('/meal/create', 'Admin\Meal\CreateMeal@createMeal')->name('admin.meal.create.submit');
    Route::get('/meal/retrive/{id}', 'Admin\Meal\RetriveMeal@retriveMeal')->name('admin.meal.retrive');
    Route::post('/meal/update/{id}', 'Admin\Meal\UpdateMeal@updateMeal')->name('admin.meal.update');
    Route::get('/meal/delete/{id}', 'Admin\Meal\DeleteMeal@deleteMeal')->name('admin.meal.delete');

});
