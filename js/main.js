$(document).ready(function(){
	//AJAX PARA CARGAR LA PRIMERA VEZ LA PAGINA
	$.ajax({
		type: "POST",
		url: "./mensajesRecibidos.php",
		success: function(a) {
			$('#textaomplir').html(a);
		}
	});
	//ABRIR VENTANA MODAL
	$('.mensaje.button').click(function(){
		// show modal now
		$('.mensaje.modal')
			.modal('show')
		;
	});
	//VALIDACION VENTANA MODAL
	$('.ui.mensaje.form').form({
		fields: {
			matter: {
				identifier: 'matter',
				rules: [
					{
						type   : 'empty',
						prompt : 'Escribe el asunto del mensaje'
					}
				]
			},
			body: {
				identifier: 'body',
				rules: [
					{
						type   : 'empty',
						prompt : 'Escribe el mensaje que quieras enviar'
					}
				]
			}
		}
	});	
	$('.ui.radio.checkbox')
		.checkbox()
	;
	//MENU DEL INDEX
		//CAMBIAR A LA PRIMERA PESATAÑA DEL MENU PRINCIPAL
		$('#mMenu1').click(function(){
			document.getElementById("mMenu1").className="item active";
			document.getElementById("mMenu2").className="item";
			$.ajax({
				type: "POST",
				url: "./mensajesRecibidos.php",
				success: function(a) {
					$('#textaomplir').html(a);
				}
			});
		});
		//CAMBIAR A LA SEGUNDA PESATAÑA DEL MENU PRINCIPAL
		$('#mMenu2').click(function(){
			document.getElementById("mMenu1").className="item";
			document.getElementById("mMenu2").className="item active";
			$.ajax({
				type: "POST",
				url: "./mensajesEnviados.php",
				success: function(a) {
					$('#textaomplir').html(a);
				}
			});
		});
		
	//VALIDACION LOGIN
	$('.ui.center.aligned.login.orange.form').form({
		fields: {
  			email: {
        		identifier : 'email',
        		rules:[{
            		type   : 'email',
            		prompt : 'Introduce un correo electrónico válido.'
          		}]
      		},
  			password: {
    			identifier : 'password',
    			rules: [{
        			type   : 'empty',
        			prompt : 'Introduce tu contraseña.'
      			},]
      		},
		}
	});

	//VALIDACION REGISTRO
	$('.ui.center.aligned.registro.orange.form').form({
		fields: {
  			nickname: {
        		identifier : 'nickname',
        		rules:[{
            		type   : 'text',
            		prompt : 'Debes introducir un nickname.'
          		}]
      		},
      		email: {
        		identifier : 'email',
        		rules:[{
            		type   : 'email',
            		prompt : 'Introduce un correo electrónico válido.'
          		}]
      		},
  			password: {
    			identifier : 'password',
    			rules: [{
        			type   : 'empty',
        			prompt : 'Debes introducir una contraseña.'
      			},]
      		},
      		nombre: {
        		identifier : 'nombre',
        		rules:[{
            		type   : 'text',
            		prompt : 'Debes introducir un nombre.'
          		}]
      		},
      		apellidos: {
        		identifier : 'apellidos',
        		rules:[{
            		type   : 'text',
            		prompt : 'Debes introducir un apellido.'
          		}]
      		},
      		terms: {
        		identifier: 'terms',
        		rules: [{
            		type   : 'checked',
            		prompt : 'Tienes que aceptar los terminos y condiciones de uso.'
          		},]
      		},
		}
	});

});