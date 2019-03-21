@extends('layout')
	@section('content')
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<div class="container Listings">
		<div class="row justify-content-center">
						<div class="col-lg-12">
            <h1>Order Details</h1>
                 <table class="table table-hover">
					<thead>
					<tr class="headtable">
                        <th>Order</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                   <tbody>
                    @if(!empty($orderDetails))
                        @foreach($orderDetails as $o)
                        <tr id="row{{ $o->order_id }}">
                            <td><a href="{{ url('/orders') }}">{{ $o->order_id }}</a></td>
                            <td><a href="/CNC/public/product/{{ $o->product_id }}">{{ $o->product_id }}</a></td>
                            <td>{{ $o->quantity }}</td>
                        </tr>
                        @endforeach
                    @endif
<!--                     
                    <tr id="row071">
                        <td>00067</td>
                        <td><ul>
                                <li>1x guitar</li>
                                <li>2x cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-31 </td>
                        <td>2019-02-01 </td>
                        <td>2 - shipped</td>
                        <td>
                    </tr>
                    <tr id="row072">
                        <td>00067</td>
                        <td><ul>
                                <li>1x guitar</li>
                                <li>2x cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-31 </td>
                        <td>2019-02-01 </td>
                        <td>3 - completed</td>
                        <td>
                    </tr> -->
					 </tbody>
                </table>
                  
                   
            </div>
		</div>
	</div>
	<script>
        $(document).ready(function () {
            $(".remove").on("click",function(){
                if (window.confirm("delete order "+$(this).attr("data")+"?")){
                    $("#row"+$(this).attr("data")).hide();
                }
            });
        });
    </script> 
    <style>
		.headtable{background-color: #000; color:white;}
        .remove{color:white;background: red; padding:.5em 1em;}
	</style>