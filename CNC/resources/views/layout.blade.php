<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" media="screen">
   <!-- <link href="{{ asset('css/updatecss.css') }}" rel="stylesheet"> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="{{ asset('js/additonal.js') }}"></script>
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
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ url('/') }}">CNC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/categories') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/products') }}">Products</a>
        </li>
        @if(Auth::check() && Auth::user()->role_id == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/users') }}">Users</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        @if(Auth::check() && !empty(Auth::user()->first_name) && !empty(Auth::user()->last_name))
          <li class="nav-item">
            <a class="nav-link" id="flagsign" href="{{ url('/signout') }}">Sign out, {{ Auth::user()->first_name }}</a>
          </li>
        @elseif(!Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/signin') }}">Sign in</a>
          </li>
        @endif
        @if(!Auth::check())
          <li class="nav-item">
          <a class="nav-link" href="{{ url('/register') }}">Register</a>
        </li>
        @endif
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{ url('/search') }}" method="get"> 
        <input class="form-control mr-sm-2" placeholder="Search" type="text" name="search" id="search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  @yield('content')


  <footer class="section footer-classic context-dark bg-image" >
    <div class="container">
      <div class="row row-30">
        <div class="col-md-4 col-xl-5">
          <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
            <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
            <!-- Rights-->
            <p class="rights"><span>©  </span><span class="copyright-year">2018</span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved.</span></p>
          </div>
        </div>
        <div class="col-md-4">
          <h5>Contacts</h5>
          <dl class="contact-list">
            <dt>Address:</dt>
            <dd>70 The Pond Rd ,North York, ON M3J 3M6</dd>
          </dl>
          <dl class="contact-list">
            <dt>email:</dt>
            <dd><a href="mailto:#">IdeaStore@gmail.com</a></dd>
          </dl>
          <dl class="contact-list">
            <dt>phones:</dt>
            <dd><a href="tel:#">+91 000000000</a> <span>or</span> <a href="tel:#">+91 0000000</a>
            </dd>
          </dl>
        </div>
        <div class="col-md-4 col-xl-3">
          <h5>User Functions</h5>
          <ul class="nav-list">
            <li><a href="{{ url('/orders') }}">Orders</a></li>
            <li><a href="{{ url('/orderstbs') }}">Orders to fill</a></li>
            <li><a href="{{ url('/inventory') }}">Inventory</a></li>
           
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
</body>
</html>
