@extends('layout')
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
		
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default ">
                <div class="panel-heading text-center"><h1>Add Product</h1></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/CNC/public/addProduct">
                     	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="pname" class="col-md-6 control-label">Product Name</label>

                            <div class="col-md-12">
                                <input id="pname" type="text" class="form-control" name="pname" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Description" class="col-md-6 control-label">Description</label>

                            <div class="col-md-12">
                                <input id="description" type="text" class="form-control" name="description" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-6 control-label">Price</label>

                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control" name="price" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  ><!-- Remove  display block -->
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
		                    <label for="exampleSelect1" class="col-md-6 control-label">Category</label>
		                    <select class="form-control" id="exampleSelect1">
		                      <option>1</option>
		                      <option>2</option>
		                      <option>3</option>
		                      <option>4</option>
		                      <option>5</option>
		                    </select>
		                    <span class="invalid-feedback"  >
                                        <strong>Field has Errors</strong>
                                    </span>
		                  </div>

                        <div class="form-group">
                            <label for="picture" class="col-md-6 control-label">Picture</label>

                            <div class="col-md-12">
                               
								    <label class="btn btn-primary btn-file">
        Browse <input id="picture" type="file" class="form-control" name="picture" style="display: none;">
    </label>
                               
                                    <span class="invalid-feedback"  >
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="stock" class="col-md-6 control-label">Stock</label>

                            <div class="col-md-12">
                               
                                <input  id="stock" type="text" class="form-control" name="stock" value="" required autofocus>

                               
                                    <span class="invalid-feedback"  >
                                        <strong>Field has Errors</strong>
                                    </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="model" class="col-md-6 control-label">Model Or Colors</label>
                          <ul id="modelsAvailable"></ul>
                           <div class="row">
                               		<div class="col-md-6">
                               			<input id="text" type="model" class="form-control" name="model" value=""  autofocus>

                               
                                    <span class="invalid-feedback"  >
                                        <strong>Field has Errors</strong>
                                    </span>
                               		</div>
                               		<div class="col-md-3">
                               			 <input id="modelPrice" placeholder="Price increase" type="text" class="form-control" name="modelPrice" >
							   		</div>
                               		<div class="col-md-3"><button id="addOption" class="btn btn-primary">
                                    Add Model
                                </button></div>
                               	
                               </div>
                        </div>

                       <div class="form-group">
                           <label for="Eoption" class="col-md-6 control-label">Other Options</label>
                          <ul id="optionsAvailable"></ul>
                           <div class="row">
                               		<div class="col-md-6">
                               			 <input id="Eoption" type="text" class="form-control" name="Eoption" >

                               
                                    <span class="invalid-feedback"  >
                                        <strong>Field has Errors</strong>
                                    </span>
                               		</div>
                               		<div class="col-md-3">
                               			 <input id="EoptionPrice" placeholder="Price Increase" type="text" class="form-control" name="EoptionPrice" >
							   		</div>
                               		<div class="col-md-3"><button id="addEOption" class="btn btn-primary">
                                    Add Optionals
                                </button></div>
                               	
                               </div>
                        </div>
                    -->	
 <div class="form-group">
                          
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Product
                                </button>

                               
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
	</body>
</html>