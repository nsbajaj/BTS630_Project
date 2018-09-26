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
                        <div class="form-group">
                          <label for="fname" class="col-md-6 control-label">First Name</label>

                            <div class="col-md-12">
                                <input id="fname" type="text" class="form-control" name="fname" value="" required autofocus>

                               
                                    <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                                      @if ($errors->has('fname')) 
                                        <strong>{{ $errors->first('fname') }}</strong>
                                      @endif
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="col-md-6 control-label">Last Name</label>

                            <div class="col-md-12">
                                <input id="lname" type="text" class="form-control" name="lname" value="" required autofocus>

                               
                                    <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                                    @if ($errors->has('lname')) 
                                        <strong>{{ $errors->first('lname') }}</strong>
                                      @endif
                                    </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="uname" class="col-md-6 control-label">Username</label>

                            <div class="col-md-12">
                                <input id="uname" type="text" class="form-control" name="uname" value="" required autofocus>

                               
                                    <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
                                      @if ($errors->has('uname')) 
                                        <strong>{{ $errors->first('uname') }}</strong>
                                      @endif
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organization" class="col-md-6 control-label">Organization</label>

                            <div class="col-md-12">
                                <input id="organization" type="text" class="form-control" name="organization" value="" autofocus>

                               
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
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                               
                                    <span class="invalid-feedback" style="display:block;" ><!-- Remove  display block -->
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

                                
                                    <span class="invalid-feedback " style="display:block;" ><!-- Remove  display block -->
                                        <strong>Field has Errors </strong>
                                    </span>
                                
                            </div>
                        </div>
                      <div class="form-group">
                          
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