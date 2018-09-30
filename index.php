<?php
	ob_start();
	session_start();
?>

<?php
	

	// decode the JSON into an associative array
	$result = verifica_login_senha("asd", "asd");
	echo "$result";
	
	function verifica_login_senha($testa_login, $testa_senha){
		
		$str = file_get_contents('banco_de_dados/usuarios.json');
		$json_decodificado = json_decode($str, true); 
		
		if (array_key_exists($testa_login, $json_decodificado) == false){
			return "nao existe esse usuario";
		}
		// bool array_key_exists ( mixed $key , array $array )

		// foreach ($json_decodificado["usuarios"] as $key => $value) {
		// echo "key: $key<br>";
		// $senha = $value["senha"];
		// echo "$senha<br>";
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


		<form class="formLogin" role = "form" action="<? php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">

			<label class="classErrorLabel opacity0" ><p><b>Erro!</b> Usuário inválido</p></label>
			<input type="text" name="inputLogin" id="inputLogin" placeholder="Usuário" required autofocus><br>
			<input type="password" name="inputPassword" id="inputPassword" placeholder="Senha" required><br>
			<input type="submit" name="inputSubmit" id="inputSubmit" value="Acessar"><br>
			
			<label id="labelEsqueceuSenha" class="classLabelInsideDivLogin"><a href="">Esqueceu a sua senha?</a></label><label id="labelCadastrese" class="classLabelInsideDivLogin">Não tem uma conta? <a href="">Cadastre-se</a>

		</form>
	</div>
</body>
</html>