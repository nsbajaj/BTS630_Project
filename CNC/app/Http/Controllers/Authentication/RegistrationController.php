<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showAccount(){
    	return view('authentication.register');
    }

    public function createAccount(){
    	//Validate the form
    	//Organization is optional
    	//Check if username/email is already taken, A-Z0-9
    	
    	$messages = [
    		'fname.required' => 'Please enter your first name.',
    		'fname.max' => 'Please enter a shorter first name.',

    		'lname.required' => 'Please enter your last name.',
    		'lname.max' => 'Please enter a shorter last name.',

    		'uname.required' => 'Please enter a user name.',
    		'uname.max' => 'Please enter a shorter username.'
		];

    	$this->validate(request(), [
    		'fname' => 'required|max:2',
    		'lname' => 'required|max:2',
    		'uname' => 'required|max:2',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	], $messages);

    	//Create and save the user
    	$user = new User;

    	$user->first_name = request('fname');
    	$user->last_name = request('lname');
    	$user->username = request('uname');
    	$user ->password = Hash::make(request('password'));
    	$user->email = request('email');
    	$user->role_id = '2';
    	$user->organization_id = '1';
    	$now = new DateTime();
    	$user->account_join_date = $now;
    	//$user->account_delete_date = "";
    	$user->last_login = $now;
    	$user->save();

    	//Sign them in
    	auth()->login($user);

    	//Redirect to the home page.
    	return("Success");
    }
}
