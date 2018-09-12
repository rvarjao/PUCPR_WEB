$(document).ready(function(){
	

	$("#buttonAcessar").click(function (){
		var password = "";
		var login = "";

		password = $("#inputPassword").val();
		login = $("#inputLogin").val();

		if(validCredentials(login, password) == true){
			alert("validos");
		}else{
			alert("Login e senha inválidos");
		}
	});

	function validCredentials(login, password){
		// so para teste
		var validLogin = "admin";
		var validPassword = "admin";

		if ((login == validLogin) && (password == validPassword)){
			return true
		}else{
			return false;
		}
	};


});