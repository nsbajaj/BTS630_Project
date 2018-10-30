<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Mail\Activation;
use Redirect;

class RegistrationController extends Controller
{
    public function showAccount(){
        if(!Auth::check()){
    	   return view('authentication.register');
        }
        else if(Auth::check() && Auth::user()->role_id == 1){
            return view('authentication.register');
        }
        else{
            abort(404);
        }
    }

    public function createAccount(){
    	//Validate the form
    	//Organization is optional
    	//Check if A-Z0-9, _ ,
        //Admin username needs to be firstname.lastname
        //5 tries for login
        
    	$messages = [
    		'fname.required' => 'Please enter your first name.',
    		'fname.max' => 'Please enter a shorter first name.',

    		'lname.required' => 'Please enter your last name.',
    		'lname.max' => 'Please enter a shorter last name.',

    		'username.required' => 'Please enter a user name.',
    		'username.max' => 'Please enter a shorter username.',
            'username.unique' => 'The username entered is already being used. Please try again.',

            'email.unique' => 'The email entered is already being used. Please try again.',

            'customCheck1.required' => 'You must agree to the Conditions of Use and Privacy Notice agreement in order to continue registration.'
		];
        
        $this->validate(request(), [
    		'fname' => 'required|max:15',
    		'lname' => 'required|max:15',
    		'username' => 'required|unique:users|max:20',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed',
            'customCheck1' => 'required'
    	], $messages);

    	//Create and save the user
    	$user = new User;

    	$user->first_name = request('fname');
    	$user->last_name = request('lname');
    	$user->username = request('username');
    	$user ->password = Hash::make(request('password'));
    	$user->email = request('email');

    	//Logged in and Admin
        if(Auth::check() && Auth::user()->role_id == 1){
            if(request('role') == 'administration'){
                $user->role_id = '1';
            }   
            else if(request('role') == 'buyer'){
                $user->role_id = '2';
            }
            else if(request('role') == 'seller'){
                $user->role_id = '3';
            }
            else{
                $user->role_id = '2';
            }
        }
        else{
            $user->role_id = '2';
        }
        $user->organization_id = '1';
    	$now = new DateTime();
    	$user->account_join_date = $now;
    	$user->last_signin = $now;
        $user->save();

    	//Sign them in
        //If  not logged in (Account creating is a buyer/seller) and sign in the user.
        if(Auth::check() && Auth::user()->role_id == 1){
            \Mail::to($user)->send(new Activation($user));
            return redirect('/users');
        }
        else if(!Auth::check()){
            auth()->login($user);
            \Mail::to($user)->send(new Activation($user));
            return view('service.index');
        }
    }
}
