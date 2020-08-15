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
