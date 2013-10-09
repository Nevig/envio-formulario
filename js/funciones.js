$(document).ready(function(){

	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	$(".boton").click(function(e){
		var resultado = '<div class="result_ok">Email enviado correctamente</div>';

		$(".error").remove();
		if($(".nombre").val() == ""){
			$(".nombre").focus().after("<p class='error'>Ingrese su nombre</p>");
			return false;
		}else if($(".email").val() == "" || !emailreg.test($(".email").val())){
			$(".email").focus().after("<p class='error'>Ingrese un email correcto</p>");
			return false;
		}else if($(".message").val() == ""){
			$(".message").focus().after("<p class='error'>Ingrese un mensaje</p>");
			return false;
		}else{
			e.preventDefault(e);
			$('.input').val('');
			$('#resultado').html(resultado);

		}
	});
	$(".nombre, .message").keyup(function(){
		if($(this).val() != ""){
			$(".error").fadeOut();
			return false;
		}
	});
	$(".email").keyup(function(){
		if($(this).val() != "" && emailreg.test($(this).val())){
			$(".error").fadeOut();
			return false;
		}
	});


});