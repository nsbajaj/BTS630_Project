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

//Ban
Route::get('/users/ban/{user}', 'User\UserController@banAccount');

//Main Page after logging in
Route::get('/', 'Service\ServiceController@show');

//Forgot Password
Route::get('/forgotpassword', 'Authentication\ForgotPasswordController@show');
Route::post('/forgotpassword', 'Authentication\ForgotPasswordController@sendEmail');

//Categories
Route::get('/categories', 'Category\CategoryController@showCategory');
Route::get('/subcategories/{category}', 'Category\CategoryController@showsubcategory');
Route::get('/subsubcategories/{subcategory}', 'Category\CategoryController@showSubSubcategory');

//Products
Route::get('/products/{subsubcategory}', 'Product\ProductController@showProducts');
Route::get('/product/{id}', 'Product\ProductController@showProduct');
Route::get('/products', 'Product\ProductController@showAllProducts');
Route::get('/editProduct/{product}', 'Product\ProductController@editProduct');
Route::post('/updateProduct/{product}', 'Product\ProductController@updateProduct');
Route::get('/addProduct', 'Product\ProductController@showCreateProduct');
Route::post('/addProduct', 'Product\ProductController@createProduct');
Route::get('/approveProduct/{id}', 'Product\ProductController@approveProduct');
Route::get('/adminProductsView/', 'Product\ProductController@showAdminProductsView');
Route::get('/deleteProduct/{product}', 'Product\ProductController@deleteProduct');
Route::get('/deletedProducts/', 'Product\ProductController@deletedProducts');
Route::get('/inventory/', 'Product\ProductController@inventory');
Route::get('/search', 'Product\ProductController@search');
Route::get('/shoppingCart', 'Product\ProductController@shoppingCart');
Route::post('/checkout', 'Product\ProductController@checkout');

//orders to be changed to its own controll at later day
Route::get('/orders/', 'Product\ProductController@otp');
Route::get('/orderstbs/',  'Product\ProductController@otf');
//payment to be changed to its own control later
//Route::get('/cart',  'Product\ProductController@cart');//not in use
Route::get('/billing',  'Product\ProductController@billing');
Route::get('/placed',  'Product\ProductController@placed');
//extra



Route::get('/customers',function(){

	
/*
Route::get('/customers',function(){
    $faker = Faker::create('App\Role');
	for($i = 0; $i < 100; $i++) {
        print($faker->name);
    }
    */
});