<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Input;

class SignInController extends Controller
{
	public function __construct(){
		//$this->middleware('guest');
	}

    public function showSignIn(){
        if(!Auth::check()){
    	   return view('authentication.signin');
        }
        else{
            //Change page to Admin Dashboard
            if(Auth::check() && Auth::user()->role_id == 1){
                return view('service.index');
            }
            else if(Auth::check() && Auth::user()->role_id >= 2){
                return view('service.index');
            }
        }
    }

    public function createSignIn(){
        //Attemp to authenticate the user
        $emailUsername = request('emailUsername'); //the input field has name='username' in form
        $error = "Invalid email/username or password. Please try again.";

        if(!Auth::check()){
            //Logging in using email
        	if(filter_var($emailUsername, FILTER_VALIDATE_EMAIL)) {
                //Email login successful
                if (Auth::attempt(['email' => $emailUsername, 'password' => request('password')], request('customCheck1'))){
            		if(Auth::user()->account_delete_date == null){
                        /*
                        $user = User::where('email', request('email'))->first();
                        $now = new DateTime();
                        $user->last_signin = $now;
                        $user->save();
                        */
                        return view('service.index');
                    }
                    //Account Deleted
                    else{
                        Auth::logout();
                        return view('authentication.signin')->with('error', $error);
                    }
                }
                //Email login failed
                else{
                    return view('authentication.signin')->with('error', $error);
                }
        	}
            //Else, username
            else{
                //Username login successful
                if (Auth::attempt(['username' => $emailUsername, 'password' => request('password')], request('customCheck1'))){
                    if(Auth::user()->account_delete_date == null){
                        return view('service.index');
                    }
                    //Account deleted
                    else{
                        Auth::logout();
                        return view('authentication.signin')->with('error', $error);
                    }
                }
                //Username login failed
                else{
                    return view('authentication.signin')->with('error', $error);
                }
            }
        }
        else{
            //Change page to Admin Dashboard
            if(Auth::user()->role_id == 1){
                return view('service.index');
            }
            else{
                return view('service.index');
            }
        }
    }
}
