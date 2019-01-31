@extends('layout')
	@section('content')
	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-lg-12">

                           <h1>Orders</h1>
                <table class="table table-hover">
							<thead>
								<tr class="headtable">
                        <th>Order</th>
                        <th>contents</th>
                        <th>Date placed</th>
                        <th>User</th> 
                        <th>Adress</th> 
                        <th>Date sent</th>
                        <th>Status</th>
                        <th>Send</th>
                        
                    </tr>
					</thead>
                   <tbody>
                    <tr>
                        <td>00056</td>
                        <td><ul>
                                <li>1x headphones</li>
                                <li>2x cleaning cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-15 </td>
                        <td>3081</td>
                        <td>2 pikachu road Toronto On canada m3e 2ek </td>
                        <td>2019-01-18 </td>
                        <td>Arrived</td>
                        <td></td>
                    </tr>
                    <tr id="row067">
                        <td>00067</td>
                        <td><ul>
                                <li>1x clicker</li>
                                <li>1x cooking sheet</li>
                            </ul>
                        </td>
                        <td>2019-01-31 </td>
                        <td>1481</td>
                        <td>2 Ash ketchum road Toronto On canada m3e 2ek </td>                        
                        <td class="shipped">Not Shipped </td>
                        <td class="status">No</td>
                        <td><a href="javascript:void" class="Send" data="067">Cancel</a></td>
                    </tr>
                    <tr id="row071">
                        <td>00067</td>
                        <td><ul>
                                <li>1x guitar</li>
                                <li>2x cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-31 </td>
                        <td>1481</td>
                        <td>2 ketchum way Toronto On canada m3e 2ek </td>                        
                        
                        <td class="shipped">Not Shipped </td>
                        <td class="status">No</td>
                        <td><a href="javascript:void" class="Send" data="071">Cancel</a></td>
                    </tr>
                    <tbody>
                </table>
                  
                   
            </div>
		</div>
	</div>
	<script>
        $(document).ready(function () {
            $(".Send").on("click",function(){
                let d = new Date();
                if (window.confirm("Send order "+$(this).attr("data")+"?")){
                    $(this).hide();
                    $("#row"+$(this).attr("data")).find(".shipped").text(d);
                    $("#row"+$(this).attr("data")).find(".status").text("No");
                }
            });
        });
    </script>
    <style>
		 .headtable{background-color: #000; color:white;}
        .Send{color:white;background-color: limegreen; padding:.5em 1em;}
	</style>