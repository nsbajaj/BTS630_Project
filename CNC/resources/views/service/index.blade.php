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
	        <div class="row justify-content-center">
	            <div class="col-md-8 col-md-offset-2 ">
	                <div class="panel panel-default ">
	                    <div class="panel-heading text-center">
	                    	@if(Auth::check() && !empty(Auth::user()->first_name) && !empty(Auth::user()->last_name))
	                    		<h1>Welcome, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h1></div>
	                    	@elseif(!Auth::check())
	                    		<h1>Welcome</h1>
	                    	@endif
	    			</div>
				</div>
			</div>
		</div>
	@endsection
</body>
</html>