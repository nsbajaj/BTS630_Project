@extends('layout')
	@section('content')
	<div class="container Listings">
		<div class="row justify-content-center">
			<div class="col-md-9 col-md-offset-1 categories">
            <h1>Orders</h1>
                <table>
                    <tr class="headtable">
                        <th>Order</th>
                        <th>contents</th>
                        <th>Date placed</th>
                        <th>Date sent</th>
                        <th>Arrived</th>
                        <th>Cancel</th>
                        
                    </tr>
                    <tr>
                        <td>00056</td>
                        <td><ul>
                                <li>1x headphones</li>
                                <li>2x cleaning cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-15 </td>
                        <td>2019-01-18 </td>
                        <td>yes</td>
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
                        <td>Not Shipped </td>
                        <td>No</td>
                        <td><a href="javascript:void" class="remove" data="067">Cancel</a></td>
                    </tr>
                    <tr id="row071">
                        <td>00067</td>
                        <td><ul>
                                <li>1x guitar</li>
                                <li>2x cloth</li>
                            </ul>
                        </td>
                        <td>2019-01-31 </td>
                        <td>Not Shipped </td>
                        <td>No</td>
                        <td><a href="javascript:void" class="remove" data="071">Cancel</a></td>
                    </tr>
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