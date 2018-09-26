<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignInController extends Controller
{

	public function __construct(){
		//$this->middleware('guest');
	}

    public function showSignIn(){
    	return view('authentication.login');
    }

    public function createSignIn(){
    	//Attemp to authenticate the user
    	if(!auth()->attempt(request(['email', 'password']))){
    		return back();
    	}
    	return view('service.index');
    }
}
