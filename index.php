<?php
	ob_start();
	session_start();
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
	<?php 		global $login_granted; $login_granted = false?>

<!-- formulario de login -->
<!-- utilizando um div principal contendo o formulario com os botoes e labels -->

	<div class="class_divForm" id="id_divForm">


		<form role = "form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id="divLoginFields" class="formLogin">

			<label class="classErrorLabel opacity0"><p>
			<?php

	            $msg = '';
	            $login_granted = false;

	            if (isset($_POST['username']) && !empty($_POST['username']) 
	               && !empty($_POST['password'])) {
					
	               if ($_POST['username'] == 'admin' && 
	                  $_POST['password'] == 'admin') {
	                  $_SESSION['valid'] = true;
	                  $_SESSION['timeout'] = time();
	                  $_SESSION['username'] = 'tutorialspoint';
	                  $msg = 'You have entered valid use name and password';
	                  $login_granted = true;
	               }else {
	                  $msg = 'Wrong username or password';
	               }
	            }
	            if ($msg != ""){
					echo "$msg";
	            }
         	?>

     </p></label>
			<input type="text" name="username" id="inputLogin" placeholder="Usuário" required autofocus><br>
			<input type="password" name="password" id="inputPassword" placeholder="Senha" required><br>
			<input type="submit" name="inputSubmit" id="inputSubmit" value="Acessar"><br>
			
			<label id="labelEsqueceuSenha" class="classLabelInsideDivLogin"><a href="">Esqueceu a sua senha?</a></label><label id="labelCadastrese" class="classLabelInsideDivLogin">Não tem uma conta? <a href="">Cadastre-se</a>

		</form>

	</div>
</body>
</html>