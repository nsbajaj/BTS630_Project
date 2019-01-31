@extends('layout')
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
