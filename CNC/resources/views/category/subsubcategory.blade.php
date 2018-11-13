@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Sub-Subcategory</title>
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
        .Listings .categories>div {
    border-top: 1px solid;
    padding: 1em .5em;
}
        .categories>div>a{ float:left ;width:10%; min-width:100px;display: block;}
        .clear{clear:both;}
		</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/additional.js"></script>
</head>

<body>
	
	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-9 col-md-offset-1 categories">
            @if(!empty($subcategory))
            	<h1> {{ $subcategory->name }}</h1>
            @endif
                  <div>
                   @if(!empty($sub))
	                	@foreach ($sub->subsubcategories as $s)
	                		<li><a href="">{{ $s->name }}</a></li>
	                   	@endforeach
                   @endif
                   <div class="clear"></div>
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
