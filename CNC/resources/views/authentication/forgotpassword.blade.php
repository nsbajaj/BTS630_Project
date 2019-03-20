@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Forgot Password?</title>
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
          <div class="panel-heading text-center"><h1>Forgot Password?</h1></div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="/CNC/public/forgotpassword">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                <div class="col-md-12">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                  <span class="invalid-feedback" style="display:block;" >
                  </span>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Send Email
                  </button>
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










@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/CNC/public/forgotpassword">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
