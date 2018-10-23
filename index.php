

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
	<?php include 'script_php/verify_login.php';?>
	


<!-- formulario de login -->
<!-- utilizando um div principal contendo o formulario com os botoes e labels -->
	
	<div class="class_divForm" id="id_divForm">


		<form role = "form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id="divLoginFields" class="formLogin">

			<label class="classErrorLabel display_none" id="label_login_error"></label>
			<input type="text" name="username" id="inputLogin" placeholder="Usuário" required autofocus><br>
			<input type="password" name="password" id="inputPassword" placeholder="Senha" required><br>
			<input type="submit" name="inputSubmit" id="inputSubmit" value="Acessar"><br>
			
			<label id="labelEsqueceuSenha" class="classLabelInsideDivLogin"><a href="">Esqueceu a sua senha?</a></label><label id="labelCadastrese" class="classLabelInsideDivLogin">Não tem uma conta? <a href="">Cadastre-se</a>

		</form>

	</div>

	<script type="text/javascript">

		var string_callback = String('<?php echo($callback); ?>');

		var callback = JSON.parse(string_callback);
		if (callback.login_granted == 1){
			window.location.href = 'paginas/caixas.php?username=' + '<?php echo $_POST['username'];?>'
		}
		ajusta_mensagem_erro_login(callback);
	</script>

</body>
</html>