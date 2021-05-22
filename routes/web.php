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


// --------------------------Task Resource Controller------------------------------
Route::resource('tasks', 'TaskController');
//Route::get('/dashboard','DashboardController@index')->name('dashboard');
// --------------------------authentication Form------------------------------
Route::get('/', array('uses' => 'Auth\AuthenticationController@showAuthenticationForm'));
// -----------------------------login-----------------------------------------
Route::post('/login', array('uses' => 'Auth\AuthenticationController@authenticate'));
// ------------------------------register-------------------------------------
Route::post('/register', array('uses' => 'Auth\AuthenticationController@storeUser'));
// ------------------------------logout-------------------------------------
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// -----------------------------login-----------------------------------------
// Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
// Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');

// // ------------------------------register---------------------------------------
// Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
// Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@storeUser')->name('register');

// -----------------------------forget password ------------------------------
Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
