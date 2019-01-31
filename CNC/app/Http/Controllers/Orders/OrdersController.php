<?php

namespace App\Http\Controllers\Orders;


use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use App\User;

class OrdersController extends Controller
{
	public function otp()
    {
       return view('orders.otp');
    }
	
	public function otf()
    {
        return view('orders.otf');
    }
}