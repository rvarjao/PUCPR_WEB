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

 		<form class="formLogin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post" onsubmit="valida_login(<?php global $login_valido; echo $login_valido ?>, 'mensagem')">
            <!-- <?php global $login_valido; echo $login_valido ?>,<?php global $msg; echo $msg ?> -->

			<label class="classErrorLabel transparent" id="errorLabel" ><p><b>Erro!</b> Usuário inválido</p></label>
			<input type="text" name="username" id="inputLogin" placeholder="Usuário" required autofocus><br>
			<input type="password" name="password" id="inputPassword" placeholder="Senha" required><br>
			<input type="submit" name="login" id="login" value="Acessar"><br>
			
			<label id="labelEsqueceuSenha" class="classLabelInsideDivLogin"><a href="">Esqueceu a sua senha?</a></label><label id="labelCadastrese" class="classLabelInsideDivLogin">Não tem uma conta? <a href="">Cadastre-se</a>

		</form>
	</div>
</body>
</html>