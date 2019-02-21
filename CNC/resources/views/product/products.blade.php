@extends('layout')
<!--<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" media="screen">
</head>
  <div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3 products">
				@if(!empty($subsubcategory))
            	<h1> {{ $subsubcategory->name }}</h1>
            @endif
            @if(!empty($final))
            	@php
            	$i = 0;
            	@endphp
	        	@foreach ($final as $product)
	               	<div>
                 <div class="block30">
                     <img  alt="placeholderimg"/>
                 </div>
                  <div class="block60">
                      <a href="/CNC/public/product/{{ $product->product_id }}">{{ $product->name }}</a>
                      <p>{{ $product->description }}</p>
                      @if(!empty($prices))
                      <p>${{-- $prices[$i++]->price --}}</p>      
                      @endif
                  </div>
                  <div class="clear"></div>
              </div> 
	           	@endforeach
            @endif
            </div>
		</div>
	</div>
</body>

</html>
-->

<link href="{{ asset('css/gridcss.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="container">
    <h3 class="h3">Products</h3>
    <div class="row">
      @if(!empty($final))
            @foreach ($final as $product)
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="/CNC/public/product/{{ $product->product_id}}">
                      @if(!empty($pictures))
                            @foreach($pictures as $key => $value)
                              @foreach($value as $n)
                                @if($product->product_id == $n->product_id)
                                  <img class="pic-1" height="445" width="348" src="/CNC/public/files/{{ $n->filename }}">
                                  @break;
                                @endif
                              @endforeach
                            @endforeach
                        @endif
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" class="fa fa-shopping-bag"></a></li>
                        <li><a href="" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-discount-label">-20%</span>
                </div>
                <div class="product-content">
                    <div class="price">$ 8.00
                        <span>$ 10.00</span>
                    </div>
                    <span class="product-shipping">Free Shipping</span>
                    <h3 class="title"><a href="/CNC/public/product/{{ $product->product_id}}">{{ $product->name }}</a></h3>
                    <!-- <a class="all-deals" href="">See all deals <i class="fa fa-angle-right icon"></i></a> -->
                </div>
            </div>
        </div>

          @endforeach
        @endif
    </div>
</div>
<hr>