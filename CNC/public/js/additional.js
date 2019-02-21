$(document).ready(function () {
	/*
		  $(window).on('beforeunload', function(){
			 	if($("#flagsign").length > 0)
                  return 'Are you sure you want to leave?';
			  	else
					return "";
           });
	*/
	$(".dropdown").hover(
		function () {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
			$(this).toggleClass('open');
		},
		function () {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
			$(this).toggleClass('open');
		}
	);
	var errormesg = "";
	$(".login form-group form").on('submit', function () {
		var retval;
		retval = ifBlank($("#password").val(), "password", errormesg);
		retval = validateemail($(".user").val());
		if (!retval) {
			alert(errormesg);
		}
		return retval;
	});
	$(".Product #Model").on('change', function () {
		$("#prodImg").attr("src", "img/" + $(".Product #Model").val() + ".jpg");
		var newprice = (10.00 + (.25 * (parseFloat($(".Product #Model").val()) - 1))) + parseFloat($(".Product #Options").val()); //test  variable prices
		$("#pricelabel").text(+newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val()) * (10.00 + ((.25 * (parseFloat($(".Product #Model").val()) - 1))))) + parseFloat($(".Product #Shipping").val()) + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Shipping").on('change', function () {
		var newprice = $(".Product #Shipping").val(); //test  variable prices
		$("#shiplabel").text(newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val()) * (10.00 + ((.25 * (parseFloat($(".Product #Model").val()) - 1))))) + parseFloat($(".Product #Shipping").val()) + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Options").on('change', function () {
		var newprice = (10.00 + ((.25 * ($(".Product #Model").val() - 1)))) + parseFloat($(".Product #Options").val()); //test  variable prices
		$("#pricelabel").text(newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val()) * (10.00 + ((.25 * (parseFloat($(".Product #Model").val()) - 1))))) + parseFloat($(".Product #Shipping").val()) + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Quantity").on('change', function () {
		$("#quantalabel").text($(".Product #Quantity").val());
		var newsubtotal = (parseFloat($(".Product #Quantity").val()) * (10.00 + ((.25 * (parseFloat($(".Product #Model").val()) - 1))))) + parseFloat($(".Product #Shipping").val()) + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".register form-group form").on('submit', function () {});
	$(".edituser form-group form").on('submit', function () {});
	$(".addproduct form-group form").on('submit', function () {});
	$(".addproduct form-group form").on('submit', function () {});
	$(".activateEdit").on('click', function () {
		$(".hide1").show();
		$(".tbhid").hide();
	});
	$(".cancelEdit").on('click', function () {
		$(".hide1").hide();
		$(".tbhid").show();
	});

});

function ifBlank(blankcheck, fieldname, errormesg) {
	var retval = (blankcheck != "");
	if (!retval) {
		errormesg += fieldname + " Cannot  be blank \n";
	}
	return retval;
}

function validatePhone(phone, errormesg) {
	var regex = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	var retval = phone.match(regex);
	if (!retval) {
		errormesg += "Please enter a proper phone number \n";
	}
	return retval;
}

function validateAlpha(alpha, fieldname, errormesg) {
	var regex = /^[a-zA-Z ]*$/;
	var retval = alpha.match(regex);
	if (!retval) {
		errormesg += "Please enter " + fieldname + " with only A-Z \n";
	}
	return retval;
}

function validatePassword(password1, password2, errormesg) {
	if (password1 != password2) {
		errormesg += "passwords do not match";
		return false;
	} else
		return true;
}

function validatePostal(postal, errormesg) {
	var regex = /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/;
	retval = postal.match(regex);
	if (!retval) {
		errormesg += "Please enter a proper Postal code  \n";
	}
	return retval;
}

function validateAlphaNumeric(alphaNum, fieldname, errormesg) {
	var regex = /^[\w\-\s]+$/;
	var retval = alphaNum.match(regex);
	if (!retval) {
		errormesg += "Please enter " + fieldname + " with only A-Z \n";
	}
	return retval;
}

function validateUserName(userName, errormesg) {
	var regex = /^[\w]+$/;
	var retval = userName.match(regex);
	if (!retval) {
		errormesg += "Please enter a valid Username \n";
	}
	return retval;
}

function validateEmail(email, errormesg) {
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var retval = userName.match(regex);
	if (!retval) {
		email += "Please enter a valid email\n";
	}
	return retval;
}

function addProduct() {
	var a = [];
	if (localStorage.getItem("products") == undefined) {
		a.push(product);
		localStorage.setItem("products", JSON.stringify(a));
	} else {
		a = JSON.parse(localStorage.getItem("products"));
		var exist = false;
		for (var i = 0; i < a.length; i++) {
			var productn = a[i];
			if (productn.id == product.id) {
				productn.quantity = productn.quantity + product.quantity;
				exist = true;
			}
		}
		if (!exist) {
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
		var exist = false;
		for (var i = 0; i < a.length; i++) {
			var productn = a[i];
			if (productn.id == product1.id) {
				productn.quantity = productn.quantity + product1.quantity
				exist = true;
			}
		}
		if (!exist) {
			a.push(product);

		}
		localStorage.setItem("products", JSON.stringify(a));
	}
}

function update(mid, nammount) {
	var a = [];
	data = [];
	var finalsum = 0;
	a = JSON.parse(localStorage.getItem("products"));
	if (nammount > 0) {
		for (var i = 0; i < a.length; i++) {
			var productn = a[i];
			if (productn.id == mid) {
				productn.quantity = nammount;
			}
			addproducttovar(productn);
			finalsum += i.quantity * i.price;
		}
		localStorage.setItem("products", JSON.stringify(a));
	} else if (nammount == 0) {
		var b = [];

		for (var i = 0; i < a.length; i++) {
			var productn = a[i];
			if (productn.id != mid) {
				b.push(productn);
				addproducttovar(productn);
				finalsum += productn.quantity * productn.price;
			}
		}
		localStorage.setItem("products", JSON.stringify(b));
		$("#row" + mid).remove();
	}
	updatetotal(finalsum);
}

function createrow(name, quantity, price, id) {
	var rowhtml = "<tr id='row" + id + "'> <td class='col-sm-8 col-md-6'><div class='media'><a class='thumbnail pull-left' href='#'>  </a><div class='media-body'><h4 class='media-heading'><a href='#'>" + name + "</a></h4></div> </div></td>  <td class='col-sm-1 col-md-1' style='text-align: center'><input type='email' class='form-control qtyctr' disabled id='exampleInputEmail1' value='" + quantity + "'><a class='updateqty' data=" + id + " href='javascript:void()'>update</a></td> <td class='col-sm-1 col-md-1 text-center'><strong>$" + price.toFixed(2) + "</strong></td><td class='col-sm-1 col-md-1 text-center'><strong>$" + (price * quantity).toFixed(2) + "</strong></td><td class='col-sm-1 col-md-1'> <button  type='button' data=" + id + "  class='btn btn-danger removebtn'><span class='glyphicon glyphicon-remove'></span> Remove </button></td> </tr>"
	$("#cartbody").prepend(rowhtml);

}

function updatetotal(totals) {
	$("#sub").text("$" + totals.toFixed(2));
	$("#tax").text("$" + (0.13 * totals).toFixed(2));
	$("#total").text("$" + (1.13 * totals).toFixed(2));
}

function addproducttovar(prod) {
	var cartproduct = {
		"id": prod.id,
		"quantity": prod.quantity
	};
	data.push(cartproduct);
	$("#itemlist").val(JSON.stringify(data));
}

function loadpage() {
	if (localStorage.getItem("products") == undefined) {
		$("#empty").show();
		$("#cartcontents").hide();
	} else {
		$("#empty").hide();
		var a = [];
		var finalsum = 0;
		data = [];
		a = JSON.parse(localStorage.getItem("products"));
		for (var i = 0; i < a.length; i++) {
			var productn = a[i];
			createrow(productn.name, productn.quantity, productn.price, productn.id)
			addproducttovar(productn);
			finalsum += productn.quantity * productn.price;
		}
		updatetotal(finalsum);
		$("#cartcontents").show();
	}
}
