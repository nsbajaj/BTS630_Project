<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'CNC') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/updatecss.css') }}" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
		<div class="container">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" placeholder="Search" type="text">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
		</div>
	</nav>

	@yield('content')

	<footer class="section footer-classic context-dark bg-image">
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
						<dd>798 South Park Avenue, Jaipur, Raj</dd>
					</dl>
					<dl class="contact-list">
						<dt>email:</dt>
						<dd><a href="mailto:#">dkstudioin@gmail.com</a></dd>
					</dl>
					<dl class="contact-list">
						<dt>phones:</dt>
						<dd><a href="tel:#">+91 7568543012</a> <span>or</span> <a href="tel:#">+91 9571195353</a>
						</dd>
					</dl>
				</div>
				<div class="col-md-4 col-xl-3">
					<h5>Links</h5>
					<ul class="nav-list">
						<li><a href="#">About</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contacts</a></li>
						<li><a href="#">Pricing</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>