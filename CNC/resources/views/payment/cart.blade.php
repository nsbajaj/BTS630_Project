@extends('layout')
	@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<div id="empty">
					<h2>The cart currently has no items</h2>
					<button type="button" class="btn btn-default returnshop">
									<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
								</button>
				</div>
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
								<button type="button" class="btn btn-default returnshop">
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
			$('.returnshop').on("click",function(){
				window.location.href("/products");
			}
		});
	</script>