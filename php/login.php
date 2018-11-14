<?php

            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               $username = $_POST['username'];
               $password = $_POST['password'];

               $str = file_get_contents('usuarios/usuarios.json');
               $json = json_decode($str, true); // decode the JSON into an associative array
               if (isset($json['usuarios'][$username]) == false){
                  echo 'usuário inválido<br>';
               }else{
                  if ($json['usuarios'][$username]['senha'] == $password){
                     echo json_encode("'login_valido' : true, 'msg' : ''");
                  }else{
                     echo json_encode("'login_valido' : false, 'msg' : 'Login inválido'");
                  }
               }
            }
?>