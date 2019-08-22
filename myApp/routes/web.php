<?php

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

Route::get('/home', function () {
    return view('home');
});


Route::get('sample', 'SampleController@index');
Route::post('sample/store', 'SampleController@store');

Route::get('sample/response', 'SampleController@responseText');

// Signup
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// Login
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');

// Logout
Route::get('auth/logout', 'Auth\LoginController@logout');



Route::get('/spa/{any}', 'SpaController@index')->where('any', '.*');