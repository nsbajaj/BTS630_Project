$(document).ready(function () {
	/*
		  $(window).on('beforeunload', function(){
			 	if($("#flagsign").length > 0)
                  return 'Are you sure you want to leave?';
			  	else
					return "";
           });
	*/
	var errormesg="";
	$(".login form-group form").on('submit', function(){
		var retval;
		retval = ifBlank($("#password").val(),"password",errormesg);
		retval = validateemail($(".user").val());
		if(!retval){alert(errormesg);}
			return retval;
	});
	$(".register form-group form").on('submit', function(){
	});
	$(".edituser form-group form").on('submit', function(){
	});
	$(".addproduct form-group form").on('submit', function(){
	});
	$(".addproduct form-group form").on('submit', function(){
	});
	$(".activateEdit").on('click',function(){$(".hide1").show();$(".tbhid").hide();});
	$(".cancelEdit").on('click',function(){$(".hide1").hide();$(".tbhid").show();});
	
});
Function ifBlank(var blankcheck,var fieldname,var errormesg){
	var  retval = alpha.match(regex);
	if(!retval){errormesg+=fieldname" Cannot  be blank \n";}
	return retval;	
}
Function validatePhone(var phone,var errormesg) {
	var regex = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	var  retval = phone.match(regex);
	if(!retval){errormesg+="Please enter a proper phone number \n";}
	return retval;
}
Function validateAlpha(var alpha , var fieldname,var errormesg) {
	var regex = /^[a-zA-Z ]*$/;
	var  retval = alpha.match(regex);
	if(!retval){errormesg+="Please enter "+fieldname" with only A-Z \n";}
	return retval;
}
Function validatePassword(var password1,var password2,var errormesg) {
	if (password1 != password2){
		errormesg+="passwords do not match";
		return  false;
	}else
		return true;
}
Function validatePostal(var postal,var errormesg) {
	var regex = /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/
	ar  retval = postal.match(regex);
	if(!retval){errormesg+="Please enter a proper Postal code  \n";}
	return retval;
}
Function validateAlphaNumeric(var alphaNum,var fieldname,var errormesg) {
	var regex = /^[\w\-\s]+$/;
	var  retval = alphaNum.match(regex);
	if(!retval){errormesg+="Please enter "+fieldname" with only A-Z \n";}
	return retval;
}

Function validateUserName(var userName ,var errormesg) {
	var regex = /^[\w]+$/;
	var  retval = userName.match(regex);
	if(!retval){errormesg+="Please enter a valid Username \n";}
	return retval;

Function validateEmail(var email var errormesg) {
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var  retval = userName.match(regex);
	if(!retval){email+="Please enter a valid email\n";}
	return retval;
}


