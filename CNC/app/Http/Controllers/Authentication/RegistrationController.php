<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

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
    		'fname' => 'required|max:15',
    		'lname' => 'required|max:15',
    		'uname' => 'required|max:20',
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
        }
        else{
            $user->role_id = '2';
        }
    	
        $user->organization_id = '1';
    	$now = new DateTime();
    	$user->account_join_date = $now;
    	//$user->account_delete_date = "";
    	$user->last_login = $now;
    	$user->save();

    	//Sign them in
        //If  not logged in (Account creating is a buyer/seller) and sign in the user.
        if(!Auth::check()){
            auth()->login($user);
            return view('service.index');
        }
        else if(Auth::check() && Auth::user()->role_id == 1){
            return view('user.index');
        }
    }
}
