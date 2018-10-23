<?php

$msg = '';
$login_granted = false;

$json_callback = json_decode("{ \"login_granted\" : false , \"msg\" : \"\"}", true);
$callback = "";

// nao sera tratado o caso em que username e password estao em branco 

if (isset($_POST['username']) && !empty($_POST['username']) 
   && isset($_POST['password']) && !empty($_POST['password'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

	
   $json_users = json_decode(file_get_contents("banco_de_dados/usuarios.json"), true);
   // print_r($json_users);
   // verifica se existe usuario

   if(!isset($json_users[$username] ) ){
      $json_callback['login_granted'] = 0;
      $json_callback['msg'] = 'Usuário inválido';
   }else{
      $user_password = $json_users[$username]["password"];
      if ($password != $user_password){
         $json_callback['login_granted'] = 0;
         $json_callback['msg'] = 'Senha inválida';
      }else if ($password == $user_password){
         $json_callback['login_granted'] = 1;
         $json_callback['msg'] = '';
      }
   }


}

   $callback = json_encode($json_callback);
	
?>