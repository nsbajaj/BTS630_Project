@extends('layout')
	@section('content')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   

	<div class="container Listings">
		<div class="row justify-content-center">
		    <div class="col-lg-12">
            <h1>Orders</h1>
                 <table class="table table-hover">
					<thead>
					<tr class="headtable">
                        <th>Order</th>
                        <th>Date placed (DD/MM/YY)</th>
                        <!-- <th>Date shipped (DD/MM/YY)</th> -->
                        <th>status</th>
                        <th>View Details</th>
                        <th>Cancel</th>
                    </tr>
                    </thead>
                   <tbody>
                    @if(!empty($orders))
                        @foreach($orders as $o)
                        <tr id="row{{ $o->order_id }}">
                            <td>{{ $o->order_id }}  </td>
                            <td>{{ date('d-m-Y', strtotime($o->order_placed_date)) }}</td>
                            <!-- <td>{{ date('d-m-Y', strtotime($o->order_paid_date)) }}</td> -->
                            
                            @if(!empty($o->order_status_code))
                                @if($o->order_status_code == 1)
                                    <td>Placed</td>
                                @elseif($o->order_status_code == 2)
                                    <td>Shipped</td>
                                @elseif($o->order_status_code == 3)
                                    <td>Completed</td>
                                @elseif($o->order_status_code == 4)
                                    <td>Cancelled</td>
                                @endif
                            @endif
                            <td><a href="/CNC/public/orderDetails/{{ $o->order_id }}"><button class="btn btn-primary" type="button">Details</button></a></td>

                            @if(!empty($o->order_status_code))
                                @if($o->order_status_code == 1 && empty($o->deleted_at))                                       
                                    <td><a href="/CNC/public/deleteOrder/{{ $o->order_id }}" class="remove btn btn-primary" data="{{ $o->order_id }}">Cancel Order</a></td>
                                @endif
                            @endif
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
			@if(!empty($orderSuccess))
				var dummy = [];
                localStorage.setItem( "products", JSON.stringify(dummy)); 
			@endif
				
        });
    </script> 
    <style>
		.headtable{background-color: #000; color:white;}
        .remove{color:white;background: red; padding:.5em 1em;}
	</style>