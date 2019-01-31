@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products</title>
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
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">Products</h1>
						<a href="{{ url('/addProduct') }}"><button type="button" class="btn btn-primary">Create New Product</button></a>
					</div>
					<div class="bs-component">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Created By</th>
									<th scope="col">Approval Status</th>
									<th scope="col">Price</th>
									<th scope="col">Edit</th>
									<th scope="col">Delete</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($deletedCollection))
									@php
					            		$i = 0;
					            	@endphp
									@foreach ($deletedCollection as $p)
									<!-- Product needing approval will be highlighted as danger -->
									@if($p->approved_product_id == null)
								    	<tr class="table-danger">
								    
								    @else
								    	<tr>
								    @endif
										<th scope="row" >
											<a href="/CNC/public/product/{{ $p->product_id}}">{{ $p->name }}
											</a>
										</th>
										<th>{{ $p->user_id }}</th>
										@if($p->approved_product_id == null)
											<th><a href="/CNC/public/approveProduct/{{ $p->product_id}}">Not Approved</a></th>
										@else
											<th>Approved</th>
									    @endif
									    @if(!empty($price))
									    <th>{{ $price[$i] }}</th>
									     @else
									     <th></th>
									     @endif
									    @php $i++; @endphp
									    <th><a href="/CNC/public/editProduct/{{ $p->product_id }}">Edit</a></th>
									    <th><a href="/CNC/public/deleteProduct/{{ $p->product_id }}">Delete</a></th>
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