@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CNC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
    body{
      padding-top: 120px;}
      .invalid-feedback{font-size:1.15em;padding: 0.75em;}
      footer{margin-top: 70px;
        border-top: #919aa1 solid 1px;
        padding-top: 2em;
    }
</style>
</head>
<body>
	@section('content')	
	    <div class="container">

	    	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-9 col-md-offset-1 categories">
            @if(Auth::check() && !empty(Auth::user()->first_name) && !empty(Auth::user()->last_name))
        		<h1>Welcome, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h1>
        	@elseif(!Auth::check())
        		<h1>Welcome</h1>
        	@endif
            <div class="welcomeBlock">
			@if(Auth::check())
                <div class="block50">
                    <a href="/CNC/public/users/{{ Auth::user()->user_id }}">Profile</a>
                </div>
			@else
			<div class="block50">
                    <a href="{{ url('signin') }}">Profile</a>
                </div>
			@endif
                <!--in admin it sees all orders-->
                <div class="block50">
                    <a href="{{ url('orders') }}">(Your) Orders</a>
                </div>
                @if(Auth::check() && Auth::user()->role_id == 1)
	                <!--Admin  functions -->
	                <div class="block50">
	                    <a href="{{ url('inventory') }}">Inventory</a>
	                </div>
	               <div class="block50">
	                    <a href="{{ url('users') }}">Users</a>
	                </div>
	                <div style="clear:both;"></div>
	            @endif
            </div>
             <div style="clear:both;"></div>
			<!------ Include the above in your HEAD tag ---------->
		    <style>
		        .block50 {
		    width:50%;
		    float:left;
		    min-height: 100px;
		}

		.welcomeBlock a {
		text-decoration:none!important;
		    font-size:2em;
		display:inline-block;
		text-align:center;
		width:90%;
		padding:5%;
		border:solid 1px;
		-webkit-box-shadow: 4px 5px 9px 0px rgba(135,135,135,1);
		-moz-box-shadow: 4px 5px 9px 0px rgba(135,135,135,1);
		box-shadow: 4px 5px 9px 0px rgba(135,135,135,1);}
		    </style>



	        <div class="row justify-content-center">
	            <div class="col-md-8 col-md-offset-2 ">
	                <div class="panel panel-default ">
	                    <div class="panel-heading text-center">
	                    	
	    			</div>
				</div>
			</div>
		</div>
	@endsection
</body>
</html>