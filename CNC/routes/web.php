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

use Faker\Factory as Faker;

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
Route::get('/users/edit/{user}', 'User\UserController@editAccount');
Route::post('/updateAccount/{id}', 'User\UserController@updateAccount');

//Delete Accounts
Route::get('/users/delete/{user}', 'User\UserController@deleteAccount');

//Main Page after logging in
Route::get('/', 'Service\ServiceController@show');

//Forgot Password
Route::get('/forgotpassword', 'Authentication\ForgotPassword@show');
Route::post('/forgotpassword', 'Authentication\ForgotPassword@sendEmail');

Route::get('/categories', 'Category\Category@showCategory');
Route::get('/subcategories/{category}', 'Category\Category@showsubcategory');
Route::get('/subsubcategories/{subcategory}', 'Category\Category@showSubSubcategory');


Route::get('/customers',function(){
	
/*
Route::get('/customers',function(){
    $faker = Faker::create('App\Role');
	for($i = 0; $i < 100; $i++) {
        print($faker->name);
    }
    */
});