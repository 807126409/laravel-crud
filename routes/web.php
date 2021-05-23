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

Route::group(['middleware' => ['auth']], function () {
    /*Route::get('/tasks','TaskController@index');
	Route::post('/tasks','TaskController@store');
	Route::get('/tasks/{id}','TaskController@show');
	Route::get('/tasks/{id}','TaskController@edit');
	Route::put('/tasks/{id}','TaskController@update');
	Route::delete('/tasks/{id}','TaskController@destroy');*/
	Route::resource('tasks', 'TaskController');
});
//Route::get('/dashboard','DashboardController@index')->name('dashboard');
// --------------------------authentication Form------------------------------
Route::get('/login', array('uses' => 'Auth\AuthenticationController@showAuthenticationForm'))->name('login');
// -----------------------------login-----------------------------------------
Route::post('/login', array('uses' => 'Auth\AuthenticationController@authenticate'));
// ------------------------------register-------------------------------------
Route::post('/register', array('uses' => 'Auth\AuthenticationController@storeUser'));
// ------------------------------logout-------------------------------------
Route::get('/logout', 'Auth\AuthenticationController@logout')->name('logout');

