@extends('layout')
<!--
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
  <h1 id="tables">Products</h1>
	@if(Auth::check()) 
    <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        @if(Auth::user()->role_id == 1)
        <a href="/CNC/public/adminProductsView">
          <button type="button" class="btn btn-primary">
            Admin View
          </button>
        </a>
        @endif
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
        <a href="{{ url('/addProduct') }}">
          <button type="button" class="btn btn-primary">Create New Product</button>
        </a>
        @endif
      </div>
    </div>
	@endif

  <div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3 products">
            @if(!empty($p))
          	@foreach ($p as $product)
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

<h1 id="tables">Products</h1>
  @if(Auth::check()) 
    <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        @if(Auth::user()->role_id == 1)
        <a href="/CNC/public/adminProductsView">
          <button type="button" class="btn btn-primary">
            Admin View
          </button>
        </a>
        @endif
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
        <a href="{{ url('/addProduct') }}">
          <button type="button" class="btn btn-primary">Create New Product</button>
        </a>
        @endif
      </div>
    </div>
  @endif

<link href="{{ asset('css/gridcss.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="container">
    <h3 class="h3">Products</h3>
    <div class="row">
        @if(!empty($p))
            @foreach ($p as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="/CNC/public/product/{{ $product->product_id }}">
                        <!-- <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-1.jpg"> -->
                        <img class="pic-1" src="/CNC/public/files/max.PNG">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                    <div class="price">$16.00
                        <span>$20.00</span>
                    </div>
                    <a class="add-to-cart" href="">+ Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
            @endif
        
    </div>
</div>
<hr>
