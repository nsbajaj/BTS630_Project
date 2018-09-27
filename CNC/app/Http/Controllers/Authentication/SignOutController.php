<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SignOutController extends Controller
{
	public function signOut(){
		if(Auth::check()){
    		Auth::logout();
	  	}
	  	return view('authentication.signin');
    }
}
