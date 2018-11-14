$( document ).ready(function() {
	
	var IS_JSON = true;
	try{
	   		var json_retorno = JSON.parse($("#retorno_do_php").val());
			
			if (json_retorno.login_valido == false){
				$("#errorLabel").removeClass("transparent");
				$("#errorLabel").empty();
				$("#errorLabel").append("<p>" + json_retorno.msg +  "</p>");
			}else{
				$("#errorLabel").addClass("transparent");
			}


	   	}
	   	catch(err){
        	IS_JSON = false;
			$("#errorLabel").addClass("transparent");
        	return;
		}


});
