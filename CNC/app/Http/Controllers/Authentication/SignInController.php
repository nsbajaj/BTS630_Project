<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use App\User;

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
        if(!Auth::check()){
        	if(!auth()->attempt(request(['email', 'password']))){
        		$error = "Invalid username or password. Please try again.";
                return view('authentication.signin')->with('error', $error);
                //return back();
        	}
            $user = User::where('email', request('email'))->first();
            $now = new DateTime();
            $user->last_signin = $now;
            $user->save();
            return view('service.index');
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
