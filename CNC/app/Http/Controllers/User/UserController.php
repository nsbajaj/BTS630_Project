<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DateTime;
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
        else if(Auth::check() && Auth::user()->user_id == $user->user_id){
            return view('user.user')->with('user', $user);
        }
        //Error 404
        else{
            abort(404);
        }
    }

    public function editAccount(User $user){
        if((Auth::check() && Auth::user()->role_id == 1) || (Auth::check() && Auth::user()->user_id == $user->user_id)){
            return view('user.edit')->with('user', $user);
        }
        else{
            abort(404);
        }
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

        return redirect('/users/' . $id);
    }

    //Check for delete_date in login.
    //Add filter/show deleted users in users list.
    public function deleteAccount(User $user){
        //Admin or Current user can view his/her account
        if((Auth::check() && Auth::user()->role_id == 1) || (Auth::check() && Auth::user()->user_id == $user->user_id)){
            $user = User::find($user->user_id);
            $now = new DateTime();
            $user->account_delete_date = $now;
            $user->save();
            
            //Admin - redirect to all users
            if(Auth::check() && Auth::user()->role_id == 1){
                return redirect('/users/');
            }
            else if(Auth::check() && Auth::user()->user_id == $user->user_id){
                Auth::logout();
                return redirect('/');
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
        
    }
}
