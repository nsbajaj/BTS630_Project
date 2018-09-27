@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users</title>
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
		@if(Auth::check() && Auth::user()->role_id == 1)
		<div class="bs-docs-section">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 ">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#profile">Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">Disabled</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">Users</h1>
						<a href="{{ url('/register') }}"><button type="button" class="btn btn-primary">Create New User</button></a>
					</div>
					<div class="bs-component">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Username</th>
									<th scope="col">Email</th>
									<th scope="col">Role</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($users))
									@foreach ($users as $user)
								    <tr class="table-active">
										<th scope="row" >
											<a href="/CNC/public/users/{{ $user->user_id}}">{{ $user->first_name . ' ' . $user->last_name }}
											</a>
										</th>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										@if($user->role_id === 1)
											<td>Administrator</td>
										@elseif($user->role_id == 2)
											<td>Buyer</td>
									    @elseif($user->role_id == 3)
											<td>Seller</td>
									    @endif
								</tr>
									@endforeach
								@endif
								<!--
								<tr>
									<th scope="row">Default</th>
									<td>Column content</td>
									<td>Column content</td>
									<td>Column content</td>
								</tr>
							-->
							</tbody>
						</table> 
					</div>
				</div>
			</div>
		</div>
		@endif
		@endsection

	</body>
	</html>