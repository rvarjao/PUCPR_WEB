<?php
	global $retorno;

	$retorno = array();
	// foreach ($_POST as $key => $value) {
	// 	echo "$key : $value<br>";
	// }

    if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {
		$msg = "valor inicial";
		$login_valido = false;

      	$username = $_POST['username'];
      	$password = $_POST['password'];

     	$str = file_get_contents('usuarios/usuarios.json');
      	$json = json_decode($str, true); // decode the JSON into an associative array
      	if (isset($json['usuarios'][$username]) == false){
      		$retorno = '{"msg" : "Usuário inválido", "login_valido" : false}';
      	}else{
        	if ($json['usuarios'][$username]['senha'] == $password){
      		$retorno = '{"msg" : "", "login_valido" : true}';
	      		header("location: paginas/caixas.html");

        	}else{
      		$retorno = '{"msg" : "Senha inválida", "login_valido" : false}';
        	}
    	}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo_login_form.css">
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/script_login.js"></script>
	<title>Login</title>

</head>
<meta charset="utf-8">

<body>
<!-- formulario de login -->
<!-- utilizando um div principal contendo o formulario com os botoes e labels -->

	<div class="class_divForm" id="id_divForm">


 		<form id="loginForm" class="formLogin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">


<!-- EXPLICANDO -->
<!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
<!-- The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script.
 -->

 <!-- What is the htmlspecialchars() function?

The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.

MAIS DETALHES: https://www.w3schools.com/php/php_form_validation.asp
 -->


			<label class="classErrorLabel transparent" id="errorLabel" ><p>s</p></label>
			<input type="text" name="username" id="inputLogin" placeholder="Usuário" required autofocus><br>
			<input type="password" name="password" id="inputPassword" placeholder="Senha" required><br>
			<input type="hidden" id="retorno_do_php" value='<?php echo $retorno ?>'>
			<input type="submit" name="login" id="login" value="Acessar"><br>
			
			<label id="labelEsqueceuSenha" class="classLabelInsideDivLogin"><a href="">Esqueceu a sua senha?</a></label><label id="labelCadastrese" class="classLabelInsideDivLogin">Não tem uma conta? <a href="">Cadastre-se</a>

		</form>
	</div>
</body>
</html>