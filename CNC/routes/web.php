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

Route::get('/', function () {
    return view('welcome');
});

//Registration
Route::get('/register', 'Authentication\RegistrationController@showAccount');
Route::post('/register', 'Authentication\RegistrationController@createAccount');

//Sign in
Route::get('/login', 'Authentication\SigninController@showSignIn');
Route::post('/login', 'Authentication\SigninController@createSignIn');

//Sign out
Route::get('/logout', 'Authentication\SignOutController@signOut')->middleware('auth');

//Main Page after logging in
Route::get('/index', 'Service\ServiceController@show')->middleware('auth');

//Implement 403/404 pages
//Refill form values if error