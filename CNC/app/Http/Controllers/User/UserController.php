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
        //Admin
        if(Auth::check() && Auth::user()->role_id == 1){
    	   return view('user.user')->with('user', $user);
        }
        //Current user can view his/her account
        else if(Auth::check() && Auth::user()->email == $user->email){
            return view('user.user')->with('user', $user);
        }
        //Error 404
        else{
            abort(404);
        }
    }

    public function editAccount(User $user){
        //Update so that only current user can view this page.
        return view('user.edit')->with('user', $user);
    }

    public function updateAccount($id){
        $messages = [
            'fname.required' => 'Please enter your first name.',
            'fname.max' => 'Please enter a shorter first name.',

            'lname.required' => 'Please enter your last name.',
            'lname.max' => 'Please enter a shorter last name.'
        ];

        $this->validate(request(), [
            'fname' => 'required|max:15',
            'lname' => 'required|max:15',
        ], $messages);

        $user = User::find($id);
        $user->first_name = request('fname');
        $user->last_name = request('lname');
        $user->save();

        //Admin
        return redirect('/users/' . $id);
    }

    public function deleteAccount(User $user){

    }
}
