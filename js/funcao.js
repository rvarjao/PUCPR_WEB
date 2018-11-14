$(document).ready(function(){

	fLocalCaixaDeEntrada();


	$("#bCaixaDeEntrada").click(function(){
		fLocalCaixaDeEntrada();
		return false;
	});

	$("#bItensEnviados").click(function(){
		fLocalCaixaDeSaida();
		return false;
	});

	$("#bLixeira").click(function(){
		fLocalLixeira();
		return false;
	});

});

function fLocalCaixaDeEntrada() {

	$.ajax({
		type: "POST",
		dataType: "xml",
		url: "../xml/emailsEntrada.xml",

		success:function(data) {
			
			$("#caixAberta").children().remove();

			$(data).find("Email").each( function() {

				if($(this).find("Estado").text() == 1) {
					var conteudo = '<div class="Linha">';
					conteudo += '<div class="colMarcar"><input type="checkbox" name=""></div>';
					conteudo += '<a href=""><div class="colEstado"><img src="../imagens/email_estado/trans/mail-icon.png"></div>';
				}
				if($(this).find("Estado").text() == 2) {
					var conteudo = '<div class="Linha2">';
					conteudo += '<div class="colMarcar"><input type="checkbox" name=""></div>';
					conteudo += '<a href=""><div class="colEstado"><img src="../imagens/email_estado/trans/correio-envelope-de-volta-com-uma-folha-de-papel-no-interior_318-50434.png"></div>';
				}

				conteudo += '<div class="colRemetente"> ' + $(this).find("Remetente").text() + '</div>'; 
				conteudo += '<div class="colEmail">' + $(this).find("EmailRemetente").text() + '</div>'; 
				conteudo += '<div class="colAssunto">' + $(this).find("Assunto").text() + '</div>';  
				conteudo += '<div class="colResumo">' + $(this).find("Resumo").text() + '</div></a></div>';

				$("#caixAberta").append(conteudo);
				
			});
		}
	});
}

function fLocalCaixaDeSaida() {

	$.ajax({

		type: "POST",
		dataType: "xml",
		url: "../xml/emailsSaida.xml", 

		success:function(data) {
			
			$("#caixAberta").children().remove();

			$(data).find("Email").each( function() {

				var conteudo = '<div class="Linha2">';
				conteudo += '<div class="colMarcar"><input type="checkbox" name=""></div>';
				conteudo += '<a href=""><div class="colEstado"><img src="../imagens/email_estado/trans/email_enviados.png"></div>';
				conteudo += '<div class="colRemetente"> ' + $(this).find("Destinatario").text() + '</div>'; 
				conteudo += '<div class="colEmail">' + $(this).find("EmailDestinatario").text() + '</div>'; 
				conteudo += '<div class="colAssunto">' + $(this).find("Assunto").text() + '</div>';  
				conteudo += '<div class="colResumo">' + $(this).find("Resumo").text() + '</div></a></div>';

				$("#caixAberta").append(conteudo);

			});
		}
	});

}

function fLocalLixeira() {

	$.ajax({
		type: "POST",
		dataType: "xml",
		url: "../xml/emailsLixeira.xml",

		success:function(data) {
			
			$("#caixAberta").children().remove();

			$(data).find("Email").each( function() {

				var conteudo = '<div class="Linha2">';
				conteudo += '<div class="colMarcar"><input type="checkbox" name=""></div>';

				if ($(this).find("Estado").text() == 1){
					conteudo += '<a href=""><div class="colEstado"><img src="../imagens/email_estado/trans/correio-envelope-de-volta-com-uma-folha-de-papel-no-interior_318-50434.png"></div>';
				}

				if ($(this).find("Estado").text() == 2){
					conteudo += '<a href=""><div class="colEstado"><img src="../imagens/email_estado/trans/email_enviados.png"></div>';
				}

				conteudo += '<div class="colRemetente"> ' + $(this).find("Remetente").text() + '</div>'; 
				conteudo += '<div class="colEmail">' + $(this).find("EmailRemetente").text() + '</div>'; 
				conteudo += '<div class="colAssunto">' + $(this).find("Assunto").text() + '</div>';  
				conteudo += '<div class="colResumo">' + $(this).find("Resumo").text() + '</div></a></div>';

				$("#caixAberta").append(conteudo);

			});
		}
	});

}

