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
                        <th>Order #</th>
                        <th>Product Name</th>
                        <th>Quantity Ordered</th>
                    </tr>
                    </thead>
                   <tbody>
                    @if(!empty($orderDetails))
                        @foreach($orderDetails as $o)
                        <tr id="row{{ $o->order_id }}">
                            <td><a href="{{ url('/orders') }}">{{ $o->order_id }}</a></td>
                            <td><a href="/CNC/public/product/{{ $o->product_id }}">{{ $o->name($o->product_id)[0] }}</a></td>
                            <td>{{ $o->quantity }}</td>
                        </tr>
                        @endforeach
                    @endif
					 </tbody>
                </table>
                
                @if(Auth::check() && Auth::user()->role_id == 1)
                <p>Status: </p>
                <form class="form-inline my-2 my-lg-0"  action="/CNC/public/updateShippingStatus/{{ $id }}" method="get">
                    {{ csrf_field() }}
                    <select name="shippingStatusForm" class="form-control">
                        @if(!empty($orderStatusTypes))
                            @foreach($orderStatusTypes as $key => $value)
                                <option 
                                @if($key == $orderStatus[0])
                                    selected 
                                @endif                                        
                                value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Update Status</button>
                </form>
                @endif
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