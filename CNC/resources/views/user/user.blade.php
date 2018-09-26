@extends('layout')
<!DOCTYPE html>
<!---<html lang="en">

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

<body>-->
@section('content')
<div class="container">
	@if(Auth::check() && Auth::user()->role_id == 1)
	<div class="bs-docs-section">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3 ">
				<div class="panel panel-default ">
					<div class="panel-heading text-center">
						<h1>
							user</h1>
					</div>

					<div class="panel-body">

						@if(!empty($user))
						<!--<form class="form-horizontal" method="POST" action="">-->
						<div class="form-group">
							<label for="name" class="col-md-6 control-label">User Name</label>{{ $user->first_name . ' ' . $user->last_name }}</div>
						<div class="form-group">
							<label for="username" class="col-md-6 control-label">Username</label>{{ $user->username }}</div>
						<div class="form-group">
							<label for="email" class="col-md-6 control-label">Email</label>{{ $user->email }}
						</div>
						<div class="form-group">
							<label for="role" class="col-md-6 control-label">Role</label>
							@if($user->role_id === 1){
							Administrator
							}
							@elseif($user->role_id == 2){
							Buyer
							}
							@elseif($user->role_id == 3){
							Seller
							}
							@endif
						</div>
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
