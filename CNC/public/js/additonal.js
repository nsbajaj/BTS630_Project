$(document).ready(function () {
	/*
		  $(window).on('beforeunload', function(){
			 	if($("#flagsign").length > 0)
                  return 'Are you sure you want to leave?';
			  	else
					return "";
           });
	*/
    /*navbar*/
      $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });
    /*navbar*/
	  $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
	var errormesg="";
	$(".login form-group form").on('submit', function(){
		var retval;
		retval = ifBlank($("#password").val(),"password",errormesg);
		retval = validateemail($(".user").val());
		if(!retval){alert(errormesg);}
			return retval;
	});
	$(".Product #Model").on('change', function(){
		$("#prodImg").attr("src", "img/"+$(".Product #Model").val()+".jpg");
		var newprice = (10.00+(.25*(parseFloat($(".Product #Model").val())-1)))+parseFloat($(".Product #Options").val());//test  variable prices
		$("#pricelabel").text(+newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val())*( 10.00+((.25*(parseFloat($(".Product #Model").val())-1))) ))+parseFloat( $(".Product #Shipping").val())  + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Shipping").on('change', function(){
		var newprice = $(".Product #Shipping").val();//test  variable prices
		$("#shiplabel").text(newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val())*( 10.00+((.25*(parseFloat($(".Product #Model").val())-1))) ))+parseFloat( $(".Product #Shipping").val())  + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Options").on('change', function(){
	var newprice = ( 10.00+((.25*($(".Product #Model").val()-1))))+parseFloat($(".Product #Options").val());//test  variable prices
		$("#pricelabel").text(newprice);
		var newsubtotal = (parseFloat($(".Product #Quantity").val())*( 10.00+((.25*(parseFloat($(".Product #Model").val())-1))) ))+parseFloat( $(".Product #Shipping").val())  + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
	});
	$(".Product #Quantity").on('change', function(){
		$("#quantalabel").text($(".Product #Quantity").val());
		var newsubtotal = (parseFloat($(".Product #Quantity").val())*( 10.00+((.25*(parseFloat($(".Product #Model").val())-1))) ))+parseFloat( $(".Product #Shipping").val())  + parseFloat($(".Product #Options").val());
		$("#sublabel").text(newsubtotal);
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
function ifBlank(blankcheck, fieldname, errormesg){
	var  retval =(blankcheck!= "");
	if(!retval){errormesg+=fieldname+" Cannot  be blank \n";}
	return retval;	
}
function validatePhone( phone, errormesg) {
	var regex = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	var  retval = phone.match(regex);
	if(!retval){errormesg+="Please enter a proper phone number \n";}
	return retval;
}
function validateAlpha( alpha ,  fieldname, errormesg) {
	var regex = /^[a-zA-Z ]*$/;
	var  retval = alpha.match(regex);
	if(!retval){errormesg+="Please enter "+fieldname+" with only A-Z \n";}
	return retval;
}
function validatePassword( password1, password2, errormesg) {
	if (password1 != password2){
		errormesg+="passwords do not match";
		return  false;
	}else
		return true;
}
function validatePostal( postal, errormesg) {
	var regex = /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/;
	 retval = postal.match(regex);
	if(!retval){errormesg+="Please enter a proper Postal code  \n";}
	return retval;
}
function validateAlphaNumeric( alphaNum, fieldname, errormesg) {
	var regex = /^[\w\-\s]+$/;
	var  retval = alphaNum.match(regex);
	if(!retval){errormesg+="Please enter "+fieldname+" with only A-Z \n";}
	return retval;
}

function validateUserName( userName , errormesg) {
	var regex = /^[\w]+$/;
	var  retval = userName.match(regex);
	if(!retval){errormesg+="Please enter a valid Username \n";}
	return retval;
}
function validateEmail(email , errormesg) {
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var  retval = userName.match(regex);
	if(!retval){email+="Please enter a valid email\n";}
	return retval;
}


