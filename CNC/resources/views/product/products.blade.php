@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<style>
		body{padding-top: 120px;}
		.invalid-feedback{font-size:1.15em;padding: 0.75em;}
		footer{margin-top: 70px;
				border-top: #919aa1 solid 1px;
				padding-top: 2em;
}
        .Listings .products>div {
    border-top: 1px solid;
    padding: 1em .5em;
}
        .block30{
            float: left;
            width: 30%;
        }
        .block60{
            float:left;
            width: 60%;
        }
        .clear{clear:both;}
		</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/additional.js"></script>
</head>

<body>
	
	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3 products">
				@if(!empty($subsubcategory))
            	<h1> {{ $subsubcategory->name }}</h1>
            @endif
            @if(!empty($p))
            	@php
            	$i = 0;
            	@endphp
	        	@foreach ($p as $product)
	               	<div>
                 <div class="block30">
                     <img  alt="placeholderimg"/>
                 </div>
                  <div class="block60">
                      <a href="/CNC/public/product/{{ $product->product_id }}">{{ $product->name }}</a>
                      <p>{{ $product->description }}</p>
                      @if(!empty($prices))
                      <p>${{ $prices[$i++]->price }}</p>      
                      @endif
                  </div>
                  <div class="clear"></div>
              </div> 
	           	@endforeach
            @endif
               
                  
                   
            </div>
		</div>
	</div>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

</body>

</html>
