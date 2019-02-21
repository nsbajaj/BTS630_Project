@extends('layout')
<!--
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
						<!-- <h2>Detail</h2>
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
							
							<div class="form-group">
                                <label for="exampleSelect1">Category</label>
                                <!--<select class="form-control" id="subcategories" name="subcategories" required>
                                    <option></option>
                                  @if(!empty($finalSub))
                                    @foreach ($finalSub as $s)
                                        <!-- <option value="{{$s->subcategory_types_id}}">{{ $s->name }}</option> 
                                        <ul>
                                        	<li>{{ $s->name }}</li>
                                        </ul>
                                    @endforeach
                                  @endif
                                <!-- </select> 
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
-->
<link rel="stylesheet" href="{{ URL::asset('css/productcss.css') }}" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<main>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-10">
          <div class="card-header">
            <nav class="header-navigation">
              <a href="#" class="btn btn-link">Back to the list</a>

              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Man</a></li>
                <li class="breadcrumb-item"><a href="#">Clothes</a></li>
                <li class="breadcrumb-item active" aria-current="page">T-Shirts</li>
              </ol>

              <div class="btn-group">
                <a href="#" class="btn btn-link btn-share">Share</a>
                <a href="#" class="btn btn-link">Sell item like this</a>
              </div>
            </nav>
          </div>
          <div class="card-body store-body">
            <div class="product-info">
              <div class="product-gallery">
                <div class="product-gallery-thumbnails">
                  <ol class="thumbnails-list list-unstyled">
                    <li><img src="https://via.placeholder.com/350x350/ffcf5b" alt=""></li>
                    <li><img src="https://via.placeholder.com/350x350/f16a22" alt=""></li>
                    <li><img src="https://via.placeholder.com/350x350/d3ffce" alt=""></li>
                    <li><img src="https://via.placeholder.com/350x350/7937fc" alt=""></li>
                    <li><img src="https://via.placeholder.com/350x350/930000" alt=""></li>
                  </ol>
                </div>
                <div class="product-gallery-featured">
                  <img src="https://via.placeholder.com/350x350/ffcf5b" alt="">
                </div>
              </div>
              <div class="product-seller-recommended">
                <h3 class="mb-5">More from David's Store</h3>
                <div class="recommended-items card-deck">
                  <div class="card">
                    <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">U$ 55.00</h5>
                      <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                    </div>
                  </div>
                  <div class="card">
                    <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">U$ 55.00</h5>
                      <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                    </div>
                  </div>
                  <div class="card">
                    <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">U$ 55.00</h5>
                      <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                    </div>
                  </div>
                  <div class="card">
                    <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">U$ 55.00</h5>
                      <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                    </div>
                  </div>
                </div>
                <!-- /.recommended-items-->
                <p class="mb-5 mt-5"><a href="#">See all ads from this seller</a></p>
                <div class="product-description mb-5">
                  <h2 class="mb-5">Features</h2>
                  <dl class="row mb-5">
                    <dt class="col-sm-3">Brand</dt>
                    <dd class="col-sm-9">Nickony</dd>
                    <dt class="col-sm-3">Color</dt>
                    <dd class="col-sm-9">Red</dd>
                    <dt class="col-sm-3">Size</dt>
                    <dd class="col-sm-9">XXL</dd>
                    <dt class="col-sm-3">Fabric</dt>
                    <dd class="col-sm-9">Cottom</dd>
                  </dl>
                  <h2 class="mb-5">Description</h2>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit nemo reiciendis quisquam a quis delectus consectetur ipsa eligendi aliquam earum in vitae voluptate ratione fugiat similique nostrum debitis dolor, ipsam quo officiis quas
                    necessitatibus? Magnam eveniet iure, eligendi est ullam consectetur repellat quis doloremque ad perspiciatis assumenda ducimus distinctio quaerat sit repudiandae illo praesentium modi dolor. Veritatis aperiam, minima natus assumenda
                    ipsum voluptatem reprehenderit? Possimus nobis, voluptate, blanditiis, temporibus ad nostrum corrupti quos corporis voluptas tempora aliquid magnam quia voluptatem rerum odit fugiat facere necessitatibus adipisci sunt. Veritatis architecto,
                    perferendis labore sit nobis eaque perspiciatis et iusto, in doloribus est!</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vel reiciendis voluptatibus assumenda tempora vitae aut adipisci harum, corporis in id perferendis quia repellat reprehenderit temporibus aspernatur ab ullam magni error
                    consectetur, facilis inventore ipsum, veniam voluptas. Error laboriosam atque quisquam facere esse repellat consectetur quos eum, quaerat blanditiis saepe?</p>
                </div>
                <div class="product-faq mb-5">
                  <h2 class="mb-3">Questions and Answers</h2>
                  <p class="text-muted">What information do you need?</p>
                  <div class="main-questions d-inline" data-container="body" data-toggle="popover" data-placement="right" data-content="Are you in doubt? these shortcuts can help you!">
                    <a href="#" class="btn btn-outline-primary">Cost and Delivery time</a>
                    <a href="#" class="btn btn-outline-primary">Warranty</a>
                    <a href="#" class="btn btn-outline-primary">Payment options</a>
                  </div>
                </div>
                <div class="product-comments">
                  <h5 class="mb-2">Or ask to David's Store</h5>
                  <form action="" class="form-inline mb-5">
                    <textarea name="" id="" cols="50" rows="2" class="form-control mr-4" placeholder="write a question"></textarea><button class="btn btn-lg btn-primary">Ask</button>
                  </form>
                  <h5 class="mb-5">Lastest Questions</h5>
                  <ol class="list-unstyled last-questions-list">
                    <li><i class="fa fa-comment"></i> <span>Hello david, can i pay with credit card?</span></li>
                    <li><i class="fa fa-comment"></i> <span>can i send it to another address?</span></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="product-payment-details">
              <p class="last-sold text-muted"><small>145 items sold</small></p>
              <h4 class="product-title mb-2">T-shirt Nickony - XXL Black and White - 100% cotton - Limited Stock</h4>
              <h2 class="product-price display-4">$ 25.00</h2>
              <p class="text-success"><i class="fa fa-credit-card"></i> 12x or  5x $ 5.00</p>
              <p class="mb-0"><i class="fa fa-truck"></i> Delivery in all territory</p>
              <div class="text-muted mb-2"><small>know more about delivery time and shipping forms</small></div>
              <label for="quant">Quantity</label>
              <input type="number" name="quantity" min="1" id="quant" class="form-control mb-5 input-lg" placeholder="Choose the quantity">
              <button class="btn btn-primary btn-lg btn-block">Buy Now</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="{{ asset('js/productjs.js') }}"></script>