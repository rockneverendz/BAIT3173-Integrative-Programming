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

Route::prefix('staff')->group(function(){
    Route::get('/home', 'Staff\StaffController@index')->name('staff.home');
    Route::get('/login', 'Staff\Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Staff\Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::get('/logout', 'Staff\Auth\StaffLoginController@logout')->name('staff.logout');

    Route::post('/password/email', 'Staff\Auth\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
    Route::get('/password/reset', 'Staff\Auth\StaffForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
    Route::post('/password/reset', 'Staff\Auth\StaffResetPasswordController@reset')->name('staff.password.update');
    Route::get('/password/reset/{token}', 'Staff\Auth\StaffResetPasswordController@showResetForm')->name('staff.password.reset');
    
});
