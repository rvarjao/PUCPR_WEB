$(document).ready(function(){

	fLocalCaixaDeEntrada();

	$("#bCaixaDeEntrada").click(function(){
		fLocalCaixaDeEntrada();
		return false;
	});

	$("#bCaixaDeEntrada2").click(function(){
		fLocalCaixaDeEntrada2();
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

	$("#bEnviarEmail").click(function(){ //abre a caixa para enviar um email
		mostrar();
		return false;
	});

	$("#bFecharEnviar").click(function(){ //fecha a caixa
		esconder();
		return false;
	});

	$("#bEnviarEmailComp").click(function(){
		
		console.log("inicio enviar email");

		vazio = "";
		cont = 0;

		if (vazio == $("#tDest").val()) {
			$("#tDest").addClass("branco");
			cont = 1;
		} else {
			$("#tDest").removeClass("branco");
			cont = 0;
		}

		if (vazio == $("#tEmDest").val()) {
			$("#tEmDest").addClass("branco");
			cont = 1;
		} else {
			$("#tEmDest").removeClass("branco");
			cont = 0;
		}

		if (vazio == $("#tAssun").val()) {
			$("#tAssun").addClass("branco");
			cont = 1
		} else {
			$("#tAssun").removeClass("branco");
			cont = 0;
		}

		if (cont == 0) {
			console.log("vai enviar msg");
			enviarMsg();
			esconder();
		}

		return false; //?
	});
});

function enviarMsg() {
	
	console.log("funcao enviarMsg");

	var destinatario = $("#tDest").val();
	var email = $("#tEmDest").val();
	var assunto = $("#tAssun").val();
	var conteudo = $("#tCont").val();

	console.log("conteudo: " + conteudo);

	console.log("msg: " + destinatario + email + assunto + conteudo);

	$.ajax({
		type: "POST",
		url: "../php/enviar.php",
		data: {
			dest: destinatario,
			emdest: email,
			assun: assunto,
			cont: conteudo
		},
		success:function(response) {	
			console.log("sucesso: " + response);
		},
		error:function(){
			console.log("error")
		}
	});
}

function esconder() {
	$("#tEnviarEmail").removeClass("sendEmail");
	$("#tEnviarEmail").addClass("transparent");
}

function mostrar() {
	$("#tEnviarEmail").removeClass("transparent");
	$("#tEnviarEmail").addClass("sendEmail");
}

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

function fLocalCaixaDeEntrada2() {

	$.ajax({
		type: "POST",
		dataType: "xml",
		url: "../xml/emailsEntrada2.xml",

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
				conteudo += '<div class="colResumo">' + $(this).find("Resumo").text() + '</div>';
				conteudo += '<div class="colBla">' + $(this).find("Bla").text() + '</div></a></div>';

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

