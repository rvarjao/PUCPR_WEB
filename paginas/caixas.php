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
				<button id="bCaixaDeEntrada" style="width: 100%" onclick="atualiza_tabela('caixa_de_entrada')">
					Caixa de Entrada</button><br>
				<button id="bItensEnviados" style="width: 100%" onclick="atualiza_tabela('caixa_de_saida')"> Itens Enviados </button><br>
				<button id="bLixeira" style="width: 100%"> Lixeira </button><br>
			</div>
		
		    <div style="size: -calc(90% - 190px); margin-left: 190px; background-color: gray; bottom: 0px; height: 100%;">
				
				<table id="email_table" width="100%" style="height: 100%">
					
					<tr>
						<th></th>
						<th></th>
						<th>Data e hora</th>
						<th>De</th>
						<th>Para</th>
						<th>Título</th>
						<th>Mensagem</th>
					</tr>
				
				</table>

			</div>
		</div>


		<script type="text/javascript">
			
			atualiza_tabela(<?php $_GET['caixa_atual']?>);

			function atualiza_tabela(caixa_atual){
				var string_emails = Array(<?php echo json_encode($json_emails_usuario_atual); ?>);
				// console.log(string_emails[0]);
				var json_emails = JSON.parse(string_emails);
				console.log(json_emails);
				completa_tabela_emails(json_emails, "email_table", caixa_atual);
			}
		</script>



	</body>
</html>

