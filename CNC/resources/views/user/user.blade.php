@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<style>
		body {
			padding-top: 120px;
		}

		.invalid-feedback {
			font-size: 1.15em;
			padding: 0.75em;
		}

		footer {
			margin-top: 70px;
			border-top: #919aa1 solid 1px;
			padding-top: 2em;
		}

	</style>
</head>

<body>
@section('content')
<div class="container">
	@if((Auth::check() && Auth::user()->role_id == 1) || Auth::check() && Auth::user()->user_id == $user->user_id) 
	<div class="bs-docs-section">
		<div class="row justify-content-center">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-default ">
					<div class="panel-heading text-center">
						<h1>user</h1>
					</div>
					<div class="panel-body">

						@if(!empty($user))
						<!--<form class="form-horizontal" method="POST" action="">-->
						<div class="form-group">
							<label for="name" class="col-md-6 control-label">Name:</label>
							@if(!empty($user->first_name) && !empty($user->last_name))
								{{ $user->first_name . ' ' . $user->last_name }}
							@endif
						</div>
						
						<div class="form-group">
							<label for="username" class="col-md-6 control-label">Username:</label>
							@if(!empty($user->username))
								{{ $user->username }}</div>
							@endif
						<div class="form-group">
							<label for="email" class="col-md-6 control-label">Email:</label>
							@if(!empty($user->username))
								{{ $user->email }}
							@endif
						</div>
						<div class="form-group">
							<label for="role" class="col-md-6 control-label">Role:</label>
							@if(!empty($user->role_id))
								@if($user->role_id === 1)
									Administrator
								@elseif($user->role_id == 2)
									Buyer
								@elseif($user->role_id == 3)
									Seller
								@endif
							@endif
						</div>
						<div class="form-group">
							<label for="account_join_date" class="col-md-6 control-label">Join Date:</label>
							@if(!empty($user->account_join_date))
								{{ $user->account_join_date }}
							@endif
						</div>
						<div class="form-group">
							<label for="account_delete_date" class="col-md-6 control-label">Delete Date:</label>
							@if(!empty($user->account_delete_date))
								{{ $user->account_delete_date }}
							@endif
						</div>
						<div class="form-group">
							<label for="last_signin" class="col-md-6 control-label">Last Sign in:</label>
							@if(!empty($user->last_signin))
								{{ $user->last_signin }}
							@endif
						</div>
						<div class="form-group">
							<label for="activation_datetime" class="col-md-6 control-label">Activation Date and time:</label>
							@if(!empty($user->activation_datetime))
								{{ $user->activation_datetime }}
							@endif
						</div>
						<a href="/CNC/public/users/edit/{{ $user->user_id}}"><button type="button" class="btn btn-primary">Edit Account</button></a>
						<a href="/CNC/public/users/delete/{{ $user->user_id}}"><button type="button" class="btn btn-primary">Delete Account</button></a>
						<!-- form-->
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>

@endsection
