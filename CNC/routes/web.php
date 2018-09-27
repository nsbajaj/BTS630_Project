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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Registration
Route::get('/register', 'Authentication\RegistrationController@showAccount');
Route::post('/register', 'Authentication\RegistrationController@createAccount');

//Sign in
Route::get('/signin', 'Authentication\SigninController@showSignIn');
Route::post('/signin', 'Authentication\SigninController@createSignIn');

//Sign out
Route::get('/signout', 'Authentication\SignOutController@signOut');

//Users
//Reading Accounts
Route::get('/users', 'User\UserController@showAccounts');
Route::get('/users/{user}', 'User\UserController@showAccount');

//Update Accounts
Route::get('/users/edit/{user}', 'User\UserController@updateAccount');

//Update Accounts
Route::get('/users/delete/{user}', 'User\UserController@deleteAccount');

//Main Page after logging in
Route::get('/', 'Service\ServiceController@show');

//Implement 403/404 pages
//Refill form values if error