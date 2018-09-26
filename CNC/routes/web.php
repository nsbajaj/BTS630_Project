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
Route::post('/register', 'Authentication\RegistrationController@createAccount');
Route::get('/register', 'Authentication\RegistrationController@showAccount');


//Login
//Route::get('/login', 'SigninController@SignIn');
//Route::get('/login', 'SigninController@SignOut');