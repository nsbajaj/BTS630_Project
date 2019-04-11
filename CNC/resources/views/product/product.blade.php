@extends('layout')
<link rel="stylesheet" href="{{ URL::asset('css/productcss.css') }}" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
  // var product = {
  //   "id": 1,
  //   "name": "Gundam",
  //   "quantity": 1,
  //   "price": 3.50
  // };
</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<main>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-10">
          <div class="card-header">
            <nav class="header-navigation">
              <a href="{{ url()->previous() }}" class="btn btn-link">Back to the list</a>

              <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                @if(!empty($genType))
                  <li class="breadcrumb-item"><a href="#">{{ $genType->get('0') }}</a></li>
                @endif
                @if(!empty($subsubType))
                  <li class="breadcrumb-item"><a href="#">{{ $subsubType->get('0') }}</a></li>
                @endif  
                @if(!empty($subType))
                  <li class="breadcrumb-item active" aria-current="page">{{ $subType->get('0') }}</li>
                @endif
              </ol>

              <div class="btn-group">
                <!-- <a href="#" class="btn btn-link btn-share">Share</a> 
                <a href="#" class="btn btn-link">Sell item like this</a> -->
              </div>
            </nav>
          </div>
          @if(!empty($product))
          <div class="card-body store-body">
            <div class="product-info">
              <div class="product-gallery">
                <div class="product-gallery-thumbnails">
                  <ol class="thumbnails-list list-unstyled">
                    @if(!empty($photos))
                      @foreach ($photos as $key => $value)
                          <li><img src="{{ URL::to('/') }}/files/{{$value}}" height="70px" width="70px" /></li>
                      @endforeach
                    @endif
                    <li><img src="https://via.placeholder.com/350x350/930000" alt=""></li>
                  </ol>
                </div>
                <div class="product-gallery-featured">
                  @if(!empty($photos))
                    <img src="{{ URL::to('/') }}/files/{{$photos[0]}}" alt="" height="350px" width="350px">
                  @else
                    <img src="{{ URL::to('/') }}/files/imagenotfound.png" alt="" height="350px" width="350px">
                  @endif
                </div>
              </div>
              <div class="product-seller-recommended">
                <h3 class="mb-5">More from {{ $user->get('0')->first_name }} {{ $user->get('0')->last_name }}'s Store</h3>
                <div class="recommended-items card-deck">
                 @foreach ($productsFromUser as $key => $value)
                    <div class="card">
                      <a href="/CNC/public/product/{{ $value->product_id }}"><img src="https://via.placeholder.com/157x157" alt="" class="card-img-top"></a>
                      <div class="card-body">
                        <h5 class="card-title">$ {{ $value->getPrice($value->product_id)->get('0') }}</h5>
                        <span class="text-muted"><small>{{ $value->name }}</small></span>
                      </div>
                    </div>
                 @endforeach      
                </div>
                <!-- /.recommended-items-->
                <p class="mb-5 mt-5"><a href="#">See all ads from this seller</a></p>
                <div class="product-description mb-5">
                  <h2 class="mb-5">Features</h2>
                  <dl class="row mb-5">
                    <!--
                    <dt class="col-sm-3">Brand</dt>
                    <dd class="col-sm-9">Nickony</dd>
                    <dt class="col-sm-3">Color</dt>
                    <dd class="col-sm-9">Red</dd>
                    <dt class="col-sm-3">Size</dt>
                    <dd class="col-sm-9">XXL</dd>
                    <dt class="col-sm-3">Fabric</dt>
                    <dd class="col-sm-9">Cottom</dd>
                  -->
                  <!-- @if(!empty($pAttType))
                    @foreach($pAttType as $key => $value)
                      @if($value['attribute_name'] == "Colour")
                        <dt class="col-sm-3">Color</dt>
                        <dd class="col-sm-9">{{ $value['value'] }}</dd>
                      @endif
                      @if($value['attribute_name'] == "Size")
                        <dt class="col-sm-3">Size</dt>
                        <dd class="col-sm-9">{{ $value['value'] }}</dd>
                      @endif
                    @endforeach
                  @endif -->

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(!empty($attArray))
                      @foreach($attArray as $key => $value)
                        <tr>
                          <td>{{ $value->get('0')->attribute_name }}</td>
                          <td>{{ $value->get('0')->value }}</td>
                        </tr>
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                  </dl>
                  <h2 class="mb-5">Description</h2>
                  <p>{{ $product->description }}</p>
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
                  <h5 class="mb-2">Or ask to {{ $user->get('0')->first_name }}'s Store</h5>
                  <form action="" class="form-inline mb-5">
                    <textarea name="" id="" cols="50" rows="2" class="form-control mr-4" placeholder="write a question"></textarea><button class="btn btn-lg btn-primary">Ask</button>
                  </form>
                  <h5 class="mb-5">Lastest Questions</h5>
                  <ol class="list-unstyled last-questions-list">
                    <li><i class="fa fa-comment"></i> <span>Hello {{ $user->get('0')->first_name }}, can i pay with credit card?</span></li>
                    <li><i class="fa fa-comment"></i> <span>can i send it to another address?</span></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="product-payment-details">
              <p class="last-sold text-muted"><small>145 items sold</small></p>
              <h4 class="product-title mb-2">{{ $product->name }}</h4>
              <h2 class="product-price display-4">$ {{ number_format($price->get('0'), 2) }}</h2>
              <!-- <p class="text-success"><i class="fa fa-credit-card"></i> 12x or  5x $ 5.00</p> -->
              <p class="mb-0"><i class="fa fa-truck"></i> Delivery in all territory</p>
              <div class="text-muted mb-2"><small>know more about delivery time and shipping forms</small></div>
              <label for="quant">Quantity</label>
              <form action="{{ url('/shoppingCart') }}" method="get">
                {{ csrf_field() }}
                <input type="hidden" id="productName" name="productName" value="{{ $product->name }}"> 
                <input type="hidden" id="price" name="price" value="{{ $price->get('0') }}"> 
                @if($product->quantity == 0)
                    <h4>Sorry, this product is currently out of stock.</h4>
                @elseif($product->quantity == -1)
                  <h4>Sorry, this product is no longer being offered.</h4>
                @endif
                <input type="number" name="quantity" min="1" id="quantity" class="form-control mb-5 input-lg" placeholder="Choose the quantity" required
                  @if($product->quantity == 0 || $product->quantity == -1)
                      disabled
                    @endif
                >
                
                <button id="addToCart" class="btn btn-primary btn-lg btn-block" 
                  @if($product->quantity == 0 || $product->quantity == -1)
                    disabled
                  @endif
                >Add to Cart</button>
              </form>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</main>
<script>
	var product =  {
            "id": {{ $product->product_id }},
            "name": "{{ $product->name }}",
            "quantity": 1,
            "price":{{ $price->get('0') }}
        };
	$(document).ready(function(){
		
		$('#addToCart').on("click",function(){
			product.quantity = $("#quantity").val();
			addProduct();
			window.location.href("/shoppingCart");
		});
	});
</script>
<script src="{{ asset('js/productjs.js') }}"></script>