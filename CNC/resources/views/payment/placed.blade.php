@extends('layout')
	@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<div id="empty">
					<h2>No Order in place</h2>
					<a href="/">Return home</a>
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
								
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			loadpage1();
			
			$('.returnshop').on("click",function(){
				window.location.href("/products");
			}
		});
	</script>