@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootswatch: Lux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body{padding-top: 120px;}
    .invalid-feedback{font-size:1.15em;padding: 0.75em;}
    footer{margin-top: 70px;
        border-top: #919aa1 solid 1px;
        padding-top: 2em;
}
        
        .step2{display:none;}
    </style>
  <script>
         $(document).ready(function () {
            $('.nextstep1').click(function(){
                
                $(".step1").fadeOut();
                $(".step2").fadeIn();
            });
             $('.prevstep1').click(function(){
                $(".step2").fadeOut();
                $(".step1").fadeIn();
            });
         });
    </script>
    <script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
</head>

<body>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="panel panel-default ">
                    <div class="panel-heading text-center">
                        <h1>Add Product</h1>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/CNC/public/addProduct" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="step1">
                                <div class="form-group">
                            <label for="pname" class="col-md-6 control-label">Product Name</label>

                            <div class="col-md-12">
                                <input id="pname" type="text" class="form-control" name="pname" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                      @if ($errors->has('pname')) 
                                            <strong>{{ $errors->first('pname') }}</strong>
                                        @endif
                                    </span>
                                </div>
                              </div>
                                <div class="form-group">
                            <label for="Description" class="col-md-6 control-label">Description</label>

                            <div class="col-md-12">
                                <input id="description" type="text" class="form-control" name="description" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                         @if ($errors->has('description')) 
                                            <strong>{{ $errors->first('description') }}</strong>
                                        @endif
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-6 control-label">Price</label>

                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control" name="price" value="" required autofocus>

                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                        @if ($errors->has('price')) 
                                            <strong>{{ $errors->first('price') }}</strong>
                                        @endif
                                    </span>
                            </div>
                        </div>
                                
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <a class="nextstep1" href="javascript:void(0)">
                                            <button type="button" class="btn btn-primary">
                                            Next
                                        </button>
                                      </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="step2">
                              <div class="form-group">
                                <label for="exampleSelect1">Category</label>
                                <select class="form-control" id="subcategories" name="subcategories" required>
                                    <option></option>
                                  @if(!empty($subcategory))
                                    @foreach ($subcategory as $s)
                                        <option value="{{$s->subcategory_types_id}}">{{ $s->name }}</option>
                                    @endforeach
                                  @endif
                                </select>
                                <span class="invalid-feedback" style="display:block;">
                                    @if ($errors->has('subcategories')) 
                                        <strong>{{ $errors->first('subcategories') }}</strong>
                                    @endif
                                </span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelect1">Attributes</label>
                                    <select class="form-control" id="attributes" name="attributes" required>
                                        <option></option>
                                      @if(!empty($attributes))
                                        @foreach ($attributes as $a)
                                            <option value="{{$a->attribute_id}}">{{ $a->attribute_name . " " . $a->value }}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                    <span class="invalid-feedback" style="display:block;">
                                        @if ($errors->has('attributes')) 
                                            <strong>{{ $errors->first('attributes') }}</strong>
                                        @endif
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelect1">Sellers</label>
                                    <select class="form-control" id="sellers" name="sellers">
                                        <option></option>
                                      @if(!empty($sellers))
                                        @foreach ($sellers as $s)
                                            <option value="{{$s->user_id}}">{{ $s->first_name . " " . $s->last_name }}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                    <span class="invalid-feedback" style="display:block;">
                                        @if ($errors->has('sellers')) 
                                            <strong>{{ $errors->first('sellers') }}</strong>
                                        @endif
                                    </span>
                                </div>

                                <div class="form-group">
                                    <div class="input-group control-group increment" >
                                  <input type="file" name="filename[]" class="form-control">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                  </div>
                                </div>
                                <!--
                                <div class="clone hide">
                                  <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <a href="javascript:void(0)" class="prevstep1">
                                            <button type="button" class="btn btn-primary">
                                            Go Back
                                        </button>
                                      </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>




















