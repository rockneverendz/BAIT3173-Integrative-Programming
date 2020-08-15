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

Route::redirect('/staff', 'home');
Route::prefix('staff')->group(function(){
    Route::get('/home', 'Staff\StaffController@index')->name('staff.home');
    
    // Authentication
    Route::get('/login', 'Staff\Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Staff\Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::post('/logout', 'Staff\Auth\StaffLoginController@logout')->name('staff.logout');

    // Password Reset
    Route::post('/password/email', 'Staff\Auth\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
    Route::get('/password/reset', 'Staff\Auth\StaffForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
    Route::post('/password/reset', 'Staff\Auth\StaffResetPasswordController@reset')->name('staff.password.update');
    Route::get('/password/reset/{token}', 'Staff\Auth\StaffResetPasswordController@showResetForm')->name('staff.password.reset');

    // Top Up
    Route::get('/credit/topup', 'Staff\Credit\TopUpController@index')->name('staff.credit.topup');
    Route::post('/credit/topup', 'Staff\Credit\TopUpController@topUp')->name('staff.credit.topup.submit');

    // Meal
    Route::redirect('/meal', 'list');
    Route::get('/meal/list', 'Staff\Meal\ListMeals@index')->name('staff.meal.list');
    Route::get('/meal/create', 'Staff\Meal\CreateMeal@index')->name('staff.meal.create');
    Route::post('/meal/create', 'Staff\Meal\CreateMeal@createMeal')->name('staff.meal.create.submit');
    Route::get('/meal/retrive/{id}', 'Staff\Meal\RetriveMeal@retriveMeal')->name('staff.meal.retrive.submit');
});
