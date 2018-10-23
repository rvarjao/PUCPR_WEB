$(document).ready(function(){


});

function ajusta_mensagem_erro_login(json_login_granted){
		
	if (json_login_granted.login_granted == 1){
		$("#label_login_error").addClass("display_none");
		
	}else{
		$("#label_login_error").removeClass("display_none");
		$("#label_login_error").text(json_login_granted.msg);
	}

}
	