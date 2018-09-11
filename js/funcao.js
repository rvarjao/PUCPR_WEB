$(document).ready(function(){
	
	var musicas = [];
	
	$("#bAdicionarMusica").click(function(){

		musicas.splice(0,0,$("#tNomeMusica").val());

		document.getElementById("divListaMusicas").innerHTML="";

		for (var i=0; i < musicas.length; i++) {

			$("#divListaMusicas").append("<div>" + musicas[i] + "</div>");

		}
		
	})

	$("#bRemoverMusica").click(function(){

		musicas.splice(parseInt($("#tPosicaoRemover").val()), parseInt($("#tQuantidadeRemover").val()));

		document.getElementById("divListaMusicas").innerHTML="";

		for (var i=0; i < musicas.length; i++) {

			$("#divListaMusicas").append("<div>" + musicas[i] + "</div>");

		}

	})

});
