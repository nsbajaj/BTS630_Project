@extends('layout')
	@section('content')
	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-lg-12">
            <h1>Inventory</h1>
                <table class="table table-hover">
							<thead>
								<tr class="headtable">
                        <th>Product</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Ammount</th>                        
                        <th>Cancel</th>
                        
                    </tr>
                    </thead>
                   <tbody>
                    <tr id="row056">
                        <td>00056</td>
                        <td>
                            Headphones
                        </td>
                        <td> headphones everyday use</td>
                        <td><span class="tbu" >10</span> <a href="javascript:void" data="056" class="update">Update quantity </a>
                        <input type="number" style="display: none;" value="10" class="upn"/><a style="display: none;" href="javascript:void" class="updated" data="056">Update quantity </a>
                         </td>                        
                        <td><a href="javascript:void" class="tfs" data="056">Stop Offering</a><a href="javascript:void" style="display: none;" class="tfe" data="056">Re-Offer</a></td>
                    </tr>
                    <tr id="row067">
                        <td>00067</td>
                        <td>
                            table cloth
                        </td>
                        <td>Basic Table cloth for standard table</td>
                         <td><span class="tbu" >10</span> <a href="javascript:void" class="update" data="067">Update quantity </a>
                        <input type="number" value="10"style="display: none;" class="upn"/><a style="display: none;" href="javascript:void" class="updated" data="067">Update quantity </a>
                         </td> 
                        <td><a href="javascript:void" class="tfs" data="067">Stop Offering</a> <a href="javascript:void" style="display: none;" class="tfe" data="067">Re-Offer</a></td>
                    </tr>
                    <tr id="row071">
                        <td>00071</td>
                        <td>
                            towel
                        </td>
                        <td>Basic Bathroom towel </td>
                         <td><span class="tbu" >10</span> <a href="javascript:void" data="071" class="update">Update quantity </a>
                        <input type="number" value="10" style="display: none;" class="upn"/><a href="javascript:void" style="display: none;" class="updated" data="067">Update quantity </a>
                         </td> 
                        <td>
                            <a href="javascript:void" class="remove" data="071">Cancel Aproval</a>
                            <a href="javascript:void" style="display: none;" class="reaproval" data="071">Request Aproval</a>
                        
                        </td>
                    </tr>
                <tbody>
                </table>
                  
                   
            </div>
		</div>
	</div>
	<script>
        $(document).ready(function () {
             $(".update").on("click",function(){
                  $("#row"+$(this).attr("data")).find(".tbu").hide();
                  $("#row"+$(this).attr("data")).find(".update").hide();
                  $("#row"+$(this).attr("data")).find(".upn").show();
                  $("#row"+$(this).attr("data")).find(".updated").show();
             });
            $(".updated").on("click",function(){
                $("#row"+$(this).attr("data")).find(".tbu").text( $("#row"+$(this).attr("data")).find(".upn").val()); 
                $("#row"+$(this).attr("data")).find(".tbu").show();
                  $("#row"+$(this).attr("data")).find(".update").show();
                  $("#row"+$(this).attr("data")).find(".upn").hide();
                  $("#row"+$(this).attr("data")).find(".updated").hide();
             });
            $(".remove").on("click",function(){
                if (window.confirm("Cancel product "+$(this).attr("data")+" Aproval?")){
                    $("#row"+$(this).attr("data")).find(".remove").hide();
                    $("#row"+$(this).attr("data")).find(".reaproval").show();
                     $("#row"+$(this).attr("data")).find(".update").hide();
                }
            });
             $(".reaproval").on("click",function(){
                if (window.confirm("Reuqest product "+$(this).attr("data")+" Aproval?")){
                    $("#row"+$(this).attr("data")).find(".remove").show();
                    $("#row"+$(this).attr("data")).find(".reaproval").hide();
                     $("#row"+$(this).attr("data")).find(".update").show();
                }
            });
            $(".tfs").on("click",function(){
                if (window.confirm("Discontinue product "+$(this).attr("data")+"?")){
                   // $("#row"+$(this).attr("data")).hide();
                     $("#row"+$(this).attr("data")).find(".update").hide();
                    $("#row"+$(this).attr("data")).find(".tfs").hide();
                    $("#row"+$(this).attr("data")).find(".tfe").show();
                }
            });
             $(".tfe").on("click",function(){
                if (window.confirm("Re offer product "+$(this).attr("data")+"?")){
                   // $("#row"+$(this).attr("data")).hide();
                     $("#row"+$(this).attr("data")).find(".update").show();
                    $("#row"+$(this).attr("data")).find(".tfs").show();
                    $("#row"+$(this).attr("data")).find(".tfe").hide();
                }
            });
            
        });
    </script>
    <style>
	.headtable{background-color: #000; color:white;}
        .remove,.tfs{color:white;background: red; padding:.5em 1em;display: inline-block;    text-align: center;}
        .tfe,.reaproval {color:white;background: limegreen; padding:.5em 1em;display: inline-block;    text-align: center;}
        
		
	</style>