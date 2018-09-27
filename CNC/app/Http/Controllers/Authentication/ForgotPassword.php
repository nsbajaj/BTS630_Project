<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ForgotPassword extends Controller
{
    public function show(){
    	return view('authentication.forgotpassword');
    }

    public function sendEmail(){
    	if(User::where('email', '=', request('email'))->exists()) {
    		print("exists");
    	}
    	else{
    		print("does not exist");
    	}
    }
}
