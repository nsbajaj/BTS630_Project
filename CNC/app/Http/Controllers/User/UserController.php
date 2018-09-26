<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function showAccounts(){
    	$users = User::all();
    	return view('user.index')->with('users', $users);
    }

    public function showAccount(User $user){
    	//dd($user);
    	print("T");
    	//$user = User::where('user_id', '=', $id)->get();
    	
    	//return view('user.user')->with('user', $user);
    }
}
