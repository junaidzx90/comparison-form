jQuery(function( $ ) {
	'use strict';
	$('#product__one, #product__two').selectize({
		placeholder: "Select a product"
	});

	var redirectUrl = "", productOne = "", productTwo = "";

	function getComparingURL(){
		if(productOne !== "" && productTwo !== ""){
			redirectUrl = comparison_ajax.url+productOne+","+productTwo;
			$("#do_compare").removeAttr("disabled").attr("href", redirectUrl);
		}else{
			$("#do_compare").attr({"href": "#", "disabled": "disabled"});
		}
	}

	$("#product__one").on("change", function(){
		productOne = $(this).val();
		getComparingURL();
	});
	$("#product__two").on("change", function(){
		productTwo = $(this).val();
		getComparingURL();
	});


	$("#comparison_form").show();
});


