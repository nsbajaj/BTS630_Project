@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit User</title>
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
                    <div class="panel-heading text-center"><h1>Edit User</h1></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/CNC/public/updateAccount/{{Auth::user()->user_id}}">
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
                                    <input id="fname" type="text" class="form-control" name="fname" 
                                    @if(!empty($user->first_name))
                                        value={{ $user->first_name }}
                                    @endif
                                     required autofocus>
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
                            <input id="lname" type="text" class="form-control" name="lname"
                            @if(!empty($user->last_name))
                                        value={{ $user->last_name }}
                            @endif
                             required autofocus>

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
                            <input id="username" type="text" class="form-control" name="username" @if(!empty($user->username))
                                        value={{ $user->username }}
                            @endif disabled required autofocus>


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
                        <input id="organization" type="text" class="form-control" name="organization"  
                        @if(!empty($user->organization))
                                        value={{ $user->organization }}
                        @endif
                        disabled="" placeholder="Optional" autofocus>


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
                        <input id="email" type="email" class="form-control" name="email" @if(!empty($user->email))
                                        value={{ $user->email }}
                        @endif disabled autofocus>

                        <span class="invalid-feedback" style="display:block;" >
                            @if ($errors->has('email')) 
                            <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
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