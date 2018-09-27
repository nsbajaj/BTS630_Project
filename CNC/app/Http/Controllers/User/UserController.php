<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showAccounts(){
        if(Auth::check() && Auth::user()->role_id == 1){
        	$users = User::all();
        	return view('user.index')->with('users', $users);
        }
        else{
            abort(404);
        }
    }

    public function showAccount(User $user){
        if(Auth::check() && Auth::user()->role_id == 1){
    	   return view('user.user')->with('user', $user);
        }
        else{
            abort(404);
        }
    }

    public function updateAccount(User $user){
    	dd($user);
    }

    public function deleteAccount(User $user){

    }
}
