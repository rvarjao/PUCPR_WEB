function completa_tabela_emails(json_emails, tabela_id, caixa_atual){

	cabecalho_tabela(tabela_id);
	if (caixa_atual == null){
		caixa_atual = "caixa_de_entrada";
	}
	// console.log(json_emails);
	// console.log(caixa_atual);
	// console.log(json_emails[caixa_atual].email);

	var texto_tabela = "";
	// var caixa_atual = "caixa_atual";


	for (index in json_emails[caixa_atual].email){
		
		var de = json_emails[caixa_atual].email[index].de;
		var para = json_emails[caixa_atual].email[index].para;
		
		var titulo = json_emails[caixa_atual].email[index].titulo;
		if (titulo.length > 20){
			titulo = titulo.substring(0,20) + "...";
		}
	
		var mensagem = json_emails[caixa_atual].email[index].mensagem;
		if (mensagem.length > 20){
			mensagem = mensagem.substring(0,20) + "...";
		}

		var data_e_hora = json_emails[caixa_atual].email[index].data_e_hora;

		texto_tabela = texto_tabela + "<tr>";
		texto_tabela = texto_tabela + "<td>" + "</td>";
		texto_tabela = texto_tabela + "<td>" + "</td>";

		texto_tabela = texto_tabela + "<td>" + data_e_hora + "</td>";
		texto_tabela = texto_tabela + "<td>" + de + "</td>";
		texto_tabela = texto_tabela + "<td>" + para + "</td>";
		texto_tabela = texto_tabela + "<td>" + titulo + "</td>";
		texto_tabela = texto_tabela + "<td>" + mensagem + "</td>";

		texto_tabela = texto_tabela + "</tr>";


		$( "#" + tabela_id).append(texto_tabela);
		// console.log(texto_tabela);
		texto_tabela = "";
	}

	function cabecalho_tabela(tabela_id){
		$("#" + tabela_id + " tr ").remove();

		var cabecalho = `
					<tr>
						<th></th>
						<th></th>
						<th>Data e hora</th>
						<th>De</th>
						<th>Para</th>
						<th>Título</th>
						<th>Mensagem</th>
					</tr>
				 `; 

		// console.log(cabecalho);
		$("#" + tabela_id).prepend(cabecalho);

	}

}