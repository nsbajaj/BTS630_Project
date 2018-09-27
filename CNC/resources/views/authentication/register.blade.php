@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
    body{
      padding-top: 120px;}
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
            <div class="col-md-8 col-md-offset-2 ">
                <div class="panel panel-default ">
                    <div class="panel-heading text-center"><h1>Register</h1></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/CNC/public/register">
                            {{ csrf_field() }}
                            @if(Auth::check() && Auth::user()->role_id == 1) <!-- If user is signed in and has admin privileges.-->
                            <div class="form-group">
                                <label for="role" class="col-md-6 control-label">Role</label>
                                <div class="col-md-12">
                                    <select name="role" class="form-control">
                                        <option value="">Select a role</option>
                                        <option value="administration">Administration</option>
                                        <option value="buyer">Buyer</option>
                                        <option value="seller">Seller</option>
                                    </select> 
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="fname" class="col-md-6 control-label">First Name</label>
                                <div class="col-md-12">
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>
                                    <span class="invalid-feedback" style="display:block;" >
                                        @if ($errors->has('fname')) 
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lname" class="col-md-6 control-label">Last Name</label>

                            <div class="col-md-12">
                            <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                            <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                                @if ($errors->has('lname')) 
                                <strong>{{ $errors->first('lname') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-md-6 control-label">Username</label>

                        <div class="col-md-12">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>


                            <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                              @if ($errors->has('username')) 
                              <strong>{{ $errors->first('username') }}</strong>
                              @endif
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="organization" class="col-md-6 control-label">Organization</label>

                    <div class="col-md-12">
                        <input id="organization" type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Optional" autofocus>


                        <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                            @if ($errors->has('organization')) 
                            <strong>{{ $errors->first('organization') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        <span class="invalid-feedback" style="display:block;" >
                            @if ($errors->has('email')) 
                            <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-6 control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <span class="invalid-feedback " style="display:block;" ><!-- Remove  display block -->
                            @if ($errors->has('password')) 
                            <strong>{{ $errors->first('password') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-md-6 control-label">Confirm Password</label>

                    <div class="col-md-12">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        <span class="invalid-feedback " style="display:block;" >
                            @if ($errors->has('password_confirmation')) 
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">I agree to the Conditions of Use and Privacy Notice agreement.</label>
                        <span class="invalid-feedback " style="display:block;" >
                            @if ($errors->has('customCheck1')) 
                            <strong>{{ $errors->first('customCheck1') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
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