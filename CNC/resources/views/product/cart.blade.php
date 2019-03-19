<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> session storage</title>
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<script>
        //Data incoming
        @if(!empty($data))
            var temp = {!! json_encode($data, JSON_HEX_TAG) !!};
            var json = JSON.parse(temp);
            console.log(temp);
            console.log(json["name"]);
        @endif
        
        
		var data = [];

        var product = {
            "id": 1,
            "name": "Gundam",
            "quantity": 1,
            "price": 3.50
        };
			
		var product2 = {
            "id": 3,
            "name": "Gundam3",
            "quantity": 1,
            "price": 5.50
        };
        function add() {
            var a = [];
            if (localStorage.getItem("products") == undefined) {
                a.push(product);
                localStorage.setItem("products", JSON.stringify(a));
            } else {
                a = JSON.parse(localStorage.getItem("products"));
				var exist= false;
               for (var i =0;i<a.length;i++) {
                    var productn = a[i];
                    if (productn.id == product.id) {
                        productn.quantity = productn.quantity + product.quantity;
						exist =true;
                    } 
                }
				if(!exist){
					a.push(product);
				}

                localStorage.setItem("products", JSON.stringify(a));
            }
        }
		
		function addspecific(product1) {
            var a = [];
            if (localStorage.getItem("products") == undefined) {
                a.push(product1);
                localStorage.setItem("products", JSON.stringify(a));
            } else {
                a = JSON.parse(localStorage.getItem("products"));
				var exist= false;
                for (var i =0;i<a.length;i++) {
                    var productn = a[i];
                    if (productn.id == product1.id) {
                        productn.quantity = productn.quantity + product1.quantity
						exist =true;
                    } 
                }
                if(!exist){
					a.push(product);
                    
				}
                localStorage.setItem("products", JSON.stringify(a));
            }
        }

        function update(mid, nammount) {
            var a = [];
			data =[];
			var finalsum =0;
            a = JSON.parse(localStorage.getItem("products"));
            if (nammount > 0) {
                for (var i =0;i<a.length;i++) {
                    var productn = a[i];
                    if (productn.id == mid) {
                        productn.quantity = nammount;
                    }
					addproducttovar(productn);
				    finalsum+=i.quantity*i.price;
                }
                localStorage.setItem("products", JSON.stringify(a));
            }else if(nammount==0){
                var b = [];
				
                 for (var i =0;i<a.length;i++) {
                    var productn = a[i];
                    if (productn.id != mid ) {
                       b.push(productn);
					 	addproducttovar(productn);
					    finalsum+=productn.quantity*productn.price;	
                    }
                }
				localStorage.setItem("products", JSON.stringify(b));
				$("#row"+mid).remove();
            }
			 updatetotal(finalsum);
        }
function createrow(name,quantity,price,id){
    var rowhtml = "<tr id='row"+id+"'> <td class='col-sm-8 col-md-6'><div class='media'><a class='thumbnail pull-left' href='#'>  </a><div class='media-body'><h4 class='media-heading'><a href='#'>"+name+"</a></h4></div> </div></td>  <td class='col-sm-1 col-md-1' style='text-align: center'><input type='email' class='form-control qtyctr' disabled id='exampleInputEmail1' value='"+quantity+ "'><a class='updateqty' data="+id+" href='javascript:void()'>update</a></td> <td class='col-sm-1 col-md-1 text-center'><strong>$"+price.toFixed(2)+"</strong></td><td class='col-sm-1 col-md-1 text-center'><strong>$"+(price*quantity).toFixed(2)+"</strong></td><td class='col-sm-1 col-md-1'> <button  type='button' data="+id+"  class='btn btn-danger removebtn'><span class='glyphicon glyphicon-remove'></span> Remove </button></td> </tr>"
    $("#cartbody").prepend(rowhtml);
    
}
function updatetotal(totals){
    $("#sub").text("$"+totals.toFixed(2));
    $("#tax").text("$"+(0.13*totals).toFixed(2));
    $("#total").text("$"+(1.13*totals).toFixed(2));
}
function addproducttovar(prod){
    var cartproduct = {
            "id": prod.id,           
            "quantity": prod.quantity
        };
    data.push(cartproduct);
     $("#itemlist").val(JSON.stringify(data));
}  
function loadpage(){
	 if (localStorage.getItem("products") == undefined) {
	 	$("#empty").show();
		$("#cartcontents").hide(); 
	 }else{
		$("#empty").hide();
		  var a = [];
		 var finalsum = 0;
		 data=[];
         a = JSON.parse(localStorage.getItem("products"));
          for (var i =0;i<a.length;i++) {
                    var productn = a[i];
			createrow(productn.name,productn.quantity,productn.price,productn.id)
				addproducttovar(productn);
				finalsum+=productn.quantity*productn.price;
			}
		 updatetotal(finalsum);
		$("#cartcontents").show(); 
	 }
}        
    </script>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<table class="table table-hover" id="cartcontents">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Total</th>
							<th> </th>
						</tr>
					</thead>
					<tbody id="cartbody">
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<h5>Subtotal</h5>
							</td>
							<td class="text-right">
								<h5><strong id="sub">$</strong></h5>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<h5>Estimated tax</h5>
							</td>
							<td class="text-right">
								<h5><strong id="tax">$</strong></h5>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<h3>Total</h3>
							</td>
							<td class="text-right">
								<h3><strong id="total">$</strong></h3>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
								</button></td>
							<td>
								<input type="hidden" id="itemlist" name="cart" value="" />
								<button type="button" class="btn btn-success">

									Checkout <span class="glyphicon glyphicon-play"></span>
								</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			loadpage();
			$('.removebtn').on("click",function(){
				update($(this).attr("data"),0);
			});
			$('.updateqty').on("click",function(){
				if($("#row"+$(this).attr("data")+ " .qtyctr").attr("disabled")!=undefined){
				$("#row"+$(this).attr("data")+ " .qtyctr").removeAttr("disable")
				}else{
					var uid =$(this).attr("data");
					var uqty = $("#row"+$(this).attr("data")+ " .qtyctr").val();		  
					update(uid,uqty);
				}
			});
		});
	</script>
</body>

</html>
