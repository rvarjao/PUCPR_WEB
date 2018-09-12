$(document).ready(function(){
	
	// retorno na tentativa de entrar com as credenciais
	var credentials_return = {"login_error":1, "password_error":2, "valid":3};
	Object.freeze(credentials_return);

	$( "#inputPassword" ).keyup(function() {
	  if (event.keyCode === 13) {
	  	$("#buttonAcessar").click();
	  }
	});

	$( "#inputLogin" ).keyup(function() {
	  if (event.keyCode === 13) {
	  	$("#buttonAcessar").click();
	  }
	});

	$("#buttonAcessar").click(function (){
		var password = "";
		var login = "";

		password = $("#inputPassword").val();
		login = $("#inputLogin").val();

		var result = validCredentials(login, password);

		if(result == credentials_return.login_error){
			alert("Usuário não cadastrado");
		}else if (result == credentials_return.password_error){
			alert("Senha inválida");
		}else if (result == credentials_return.valid){
			window.open("paginas/caixas.html","_self");
		}
	});

	function validCredentials(login, password){
		// so para teste
		var validLogin = "admin";
		var validPassword = "admin";

		if (login != validLogin){
			return credentials_return.login_error;
		}else if(password != validPassword){
			return credentials_return.password_error;
		}else{
			return credentials_return.valid;
		}
	};


});