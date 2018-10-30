@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign in</title>
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
  @section('content') 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3 ">
        <div class="panel panel-default ">
          <div class="panel-heading text-center"><h1>Sign in</h1></div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="/CNC/public/signin">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="email" class="col-md-6 control-label">E-Mail Address or Username</label>

                <div class="col-md-12">
                  <input id="emailUsername" type="text" class="form-control" name="emailUsername" value="{{ old('email') }}" required autofocus>
                  <span class="invalid-feedback" style="display:block;" >
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-md-6 control-label">Password</label>
                <div class="col-md-12">
                  <input id="password" type="password" class="form-control" name="password" required>
                  <span class="invalid-feedback " style="display:block;" >
                  
                  @if(!empty($error))
                    <strong>{{ $error }}</strong>  
                  @endif
                  
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

                  <a class="btn btn-link" href="">
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
  @endsection
</body>
</html>