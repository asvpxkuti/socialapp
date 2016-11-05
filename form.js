$(document).ready(function(){

	// alert("hello world");
	$("#eventForm").submit(function(e)	{

		var errors = validateForm();

		if(errors == " "){
			return true;
		}else{
			errorFeedback(errors);
			e.preventDefault();
			return false;
		}

	});

	function validateForm(){
		var errorfields = new Array();

		if($("#name").val() == ''){
			errorfields.push('name');
		}

		if($("#last").val() == ''){
			errorfields.push('last');
		}

		if($("#city").val() == ''){
			errorfields.push('city');
		}

		if($("#email").val() == ''){
			errorfields.push('email');
		}
		

		if($("#phone").val() == ''){
			errorfields.push('phone');
		}

		if($("#street").val() == ''){
			errorfields.push('street');
		}
			return errorfields;
	}//end of errorfield


	function errorFeedback (incomingErrors) {

		for (var i = 0; i < incomingErrors.length; i++) 
		{
			$("#" + incomingErrors[i]).addClass("errorSpan");
			$("#" + incomingErrors[i] + "Err").removeClass("errorfeedback");
			}
			$("#errorDiv").html("Please fill out required fields");
		
	}

	function removeFeedback () {
		$("#errorDiv").html(" ");

		$('input').each(function(){
			$(this).removeClass("errorSpan");
		});

		$('.errorSpan').each(function(){
			$(this).addClass("errorfeedback");
		});
	}


});