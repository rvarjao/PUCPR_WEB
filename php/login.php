<?php

   if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {
	
      $username = $_POST['username'];
      $password = $_POST['password'];

      $str = file_get_contents('usuarios/usuarios.json');
      $json = json_decode($str, true); // decode the JSON into an associative array
      if (isset($json['usuarios'][$username]) == false){
            $_POST['login_valido'] = true;
            $_POST['msg'] = 'usuário inválido';
         // echo 'usuário inválido<br>';
      }else{
         if ($json['usuarios'][$username]['senha'] == $password){
            $_POST['login_valido'] = true;
            $_POST['msg'] = 'login valido';
            // echo json_encode("'login_valido' : true, 'msg' : ''");
         }else{
            $_POST['login_valido'] = false;
            $_POST['msg'] = 'login invalido';

            // echo json_encode("'login_valido' : false, 'msg' : 'Login inválido'");
         }
      }
   }

?>