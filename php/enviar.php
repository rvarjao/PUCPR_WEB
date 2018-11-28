<?php
	
	$destinatario = $_POST["dest"];
	$email = $_POST["emdest"];
	$assunto = $_POST["assun"];
	$conteudo = $_POST["cont"];

	$xml_string = file_get_contents("../xml/emailsSaida.xml");
	$xml_objeto = simplexml_load_string($xml_string);
	
	$i = 0;
	$copia = [];

	foreach ($xml_objeto->Email as $key => $value) {
		$copia[$i] = [];

		foreach ($value as $key => $value2) {
			$copia[$i][$key] = $value2;
		}
		$i++;

	}


	$xml = new DOMDocument("1.0");
	
	$xml_novo = $xml->createElement("Emails");
	$xml->appendChild($xml_novo);

	for ($i = 0; $i < count($xml_objeto->Email); $i++) {

		$xml_nemail = $xml->createElement("Email");

		$xml_destinatario = $xml->createElement("Destinatario", $copia[$i]["Destinatario"]);
		$xml_emaildest = $xml->createElement("EmailDestinatario", $copia[$i]["EmailDestinatario"]);
		$xml_assunto = $xml->createElement("Assunto", $copia[$i]["Assunto"]);
		$xml_conteudo = $xml->createElement("Resumo", $copia[$i]["Resumo"]);

		$xml_nemail->appendChild($xml_destinatario);
		$xml_nemail->appendChild($xml_emaildest);
		$xml_nemail->appendChild($xml_assunto);
		$xml_nemail->appendChild($xml_conteudo);

		$xml_novo->appendChild($xml_nemail);



	}

	$xml_nemail = $xml->createElement("Email");


	$xml_destinatario = $xml->createElement("Destinatario", $destinatario);
	$xml_nemail->appendChild($xml_destinatario);

	$xml_emaildest = $xml->createElement("EmailDestinatario", $email);
	$xml_nemail->appendChild($xml_emaildest);

	$xml_assunto = $xml->createElement("Assunto", $assunto);
	$xml_nemail->appendChild($xml_assunto);

	$xml_conteudo = $xml->createElement("Resumo", $conteudo);
	$xml_nemail->appendChild($xml_conteudo);

	$xml_novo->appendChild($xml_nemail);


	$xml->save("../xml/emailsSaida.xml");


?>

