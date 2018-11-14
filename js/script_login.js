function valida_login(loginValido, msg){
	if (loginValido == false){
		$("#errorLabel").removeClass("transparent");
	}else{
		$("#errorLabel").addClass("transparent");
	}
	
	console.log("login: " + loginValido);
	console.log("msg: " + msg);

}
