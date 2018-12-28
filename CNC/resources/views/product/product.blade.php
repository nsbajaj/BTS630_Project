@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>{{ $product->name }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" media="screen">
	<style>
		body{padding-top: 120px;}
		.invalid-feedback{font-size:1.15em;padding: 0.75em;}
		footer{margin-top: 70px;
				border-top: #919aa1 solid 1px;
				padding-top: 2em;
}
		img{width: 100%;}
		</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/additional.js"></script>
</head>

<body>
	<div class="container Product">
		@if(!empty($product))
		<div class="row justify-content-center">
			<div class="col-md-9 col-md-offset-3 ">
				<div class="row">
					<div class="col-md-8">
						<div>
							<img src="img/1.jpg" alt="productname" id="prodImg"/>
							<label>Product name</label>
						</div>
						<div>
						@if(!empty($photos))
							@foreach ($photos as $key => $value)
							    <img src="{{ URL::to('/') }}/files/{{$value}}" height="100px" width="100px" />
							@endforeach
						@endif
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi incidunt quibusdam tempora pariatur aut ex fugit est? Nisi, quibusdam rem officia quam voluptate, assumenda doloremque neque vitae alias ipsa odio.</p>
						</div>
					</div>
					<div class="col-md-4">
						<h1>{{ $product->name }}</h1>
						<!-- <h2>Detail</h2> -->
						<p>
						{{ $product->description }}
						</p>
						<div>
							<!--
							<p>Flavor</p>
							<select class="form-control" id="Model">
								<option value="1">Cola</option>
								<option value="2">Lime</option>
								<option value="3">Orange</option>
								<option value="4">Diet</option>
								<option value="5">Mello</option>
							</select>
							-->
							<div class="form-group">
                                <label for="exampleSelect1">Category</label>
                                <!--<select class="form-control" id="subcategories" name="subcategories" required>
                                    <option></option> -->
                                  @if(!empty($finalSub))
                                    @foreach ($finalSub as $s)
                                        <!-- <option value="{{$s->subcategory_types_id}}">{{ $s->name }}</option> -->
                                        <ul>
                                        	<li>{{ $s->name }}</li>
                                        </ul>
                                    @endforeach
                                  @endif
                                <!-- </select> -->
                                </div>
                                <div class="form-group">
                                <label for="exampleSelect1">Attributes</label>
	                                @if(!empty($finalAtt))
	                                    @foreach ($finalAtt as $a)
	                                        <ul>
                                        		<li>{{ $a->attribute_name . " " . $a->value }}</li>
                                        	</ul>
	                                    @endforeach
	                                @endif
	                            </div>
						</div>
						
						<div>
							<p>shipping</p>
							<select class="form-control" id="Shipping">
								<option value="10">Normal 10</option>
								<option value="15.50">Fast 15.50</option>
								<option value="20">Super Fast 20</option>
							</select>
						</div>
						<div>
							<p> Optional extras</p>
							<select class="form-control" id="Options" >
								<option value=0>No extra</option>
								<option value="3">Sugar +3</option>
								<option value="1">Extra syrup +1</option>							
							</select>
						</div>
						<div>
							<p> Quantity</p>
							<select class="form-control" id="Quantity" >
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>							
							</select>
						</div>
						<div>
							<ul>
								<li>shipping : $<span id="shiplabel">10.00</span></li>
								<li>price :<span id="quantalabel">1</span> $<span id="pricelabel">10.00</span></li>
								<li>subtotal : $<span id="sublabel">20.00</span></li>
							</ul>
							
						
							 <button type="submit" class="btn btn-primary">
                                    Add To Cart
                                </button>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</body>

</html>
