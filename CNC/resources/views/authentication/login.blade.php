<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Lux</title>
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
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
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
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="panel panel-default ">
                <div class="panel-heading text-center"><h1>Login</h1></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                     
                        <div class="form-group">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                               
                                    <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-6 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                
                                    <span class="invalid-feedback " style="display:block;" ><!-- Remove  display block -->
                                        <strong>Field has Errors </strong>
                                    </span>
                                
                            </div>
                        </div>
 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
</div>
				</form>
			</div>
			
		  </div>
		  </div>
		  </div>
		  </div>
		  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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