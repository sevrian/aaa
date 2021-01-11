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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/', 'DashboardController@index');
Route::get('/ubahpassword', 'AuthController@ubahpass');
Route::patch('/changepass', 'AuthController@updatePassword');
Route::get('/logout', 'AuthController@logout');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/ubahpassword', 'AuthController@ubahpass');
//     Route::patch('/changepass', 'AuthController@updatePassword');
//     Route::get('/logout', 'AuthController@logout');
// });
