<?php 
	// pegar o login do usuario na url
	$username = $_GET['username'];
	// echo "username: $username<br>";
	// a partir do nome do usuario, pega todos os demais dados
	// abre o xml
	$filename_usuarios = "../banco_de_dados/usuarios.json";
	$string_usuarios = file_get_contents($filename_usuarios);
	
	$json_usuarios = json_decode($string_usuarios, true);
	// print_r($json_usuarios);
	// echo "<br>";

	// print_r("atual: $json_usuarios['admin']");

	$array_usuario_atual = $json_usuarios[$username];
	// print_r($array_usuario_atual);
	// echo "<br>";

	$string_emails_usuario_atual = file_get_contents("../banco_de_dados/emails/".$array_usuario_atual["arquivo_email"]);

	$xml_emails_usuario_atual = simplexml_load_string($string_emails_usuario_atual, "SimpleXMLElement", LIBXML_NOCDATA);

	//xml para json
	$json_emails_usuario_atual = json_encode($xml_emails_usuario_atual);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloCaixas.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		<script type="text/javascript" src="../js/caixa_email.js"></script>
		<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
		<!-- <script>tinymce.init({ selector:'textarea' });</script> -->

		<meta charset="utf-8">
</head>


	<body>
		
		<div id="topo" style="width: 100%; height: 80px; align-items: center;">
			<table id="tabTopo" width="85%" style="margin-left: 15%;">
				<tr>
					<td id="imLogo"></td>
					<td id="lBusca">Busca</td>
					<td id="inpBusca"><input type="text" name="tBusca" id="tBusca"></td>
					<td><a href=""><img src="../imagens/pesquisa.png" id="imgBusca" width="23px"></a></td>
					<td id="lEmail"><?php echo $username ?></td>
					<td id="imConf"><a href=""><img src="../imagens/settings.png" height="30px"></a></td>
				</tr>

			</table>
		</div>


		<div id='inferior' style= "width: 100%; height: 100%; overflow: hidden; margin-top: 10px;">
			<div style="width: 180px; float: left;"> 
				<button id="bNovoEmail" style="width: 100%" onclick="">Novo email</button><br>
				<button id="bCaixaDeEntrada" style="width: 100%" onclick="atualiza_tabela('caixa_de_entrada')">
					Caixa de Entrada</button><br>
				<button id="bItensEnviados" style="width: 100%" onclick="atualiza_tabela('caixa_de_saida')"> Itens Enviados </button><br>
				<button id="bLixeira" style="width: 100%"> Lixeira </button><br>
			</div>
		
		    <div style="size: -calc(90% - 190px); margin-left: 190px; bottom: 0px; height: 100%;">
				
				<table id="email_table" width="100%" style="height: 100%", style="table-layout: fixed;">
					
				</table>

			</div>
		</div>


		<script type="text/javascript">

			atualiza_tabela(<?php $_GET['caixa_atual']?>);

			function atualiza_tabela(caixa_atual){
				var string_emails = Array(<?php echo json_encode($json_emails_usuario_atual); ?>);
				// console.log(string_emails[0]);
				var json_emails = JSON.parse(string_emails);
				completa_tabela_emails(json_emails, "email_table", caixa_atual);
			}
		</script>


		<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content" style="display: block;">

		    <span class="close">&times;</span>
		    
		    <span id="spanPara" >Para:</span>
		    <input type="text" name="inputPara" id="inputPara" style="width: 80%"><br>
		    
		    <span id="spanAssunto">Assunto:</span>
		    <input type="text" name="inputAssunto" id="inputAssunto" style="width: 80%"><br>
		    
		    <span id="spanMensagem">Mensagem:</span><br>
		    <input type="textarea" name="inputMensagem" style="width: 80%">	

		  </div>

		</div>


		<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("bNovoEmail");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			    modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		</script>




	</body>
</html>

