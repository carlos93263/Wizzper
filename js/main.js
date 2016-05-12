$(document).ready(function(){
	//AJAX PARA CARGAR LA PRIMERA VEZ LA PAGINA
	if(document.getElementById("mMenu1")) {
		$.ajax({
			type: "POST",
			url: "./mensajesRecibidos.php",
			success: function(a) {
				$('#textaomplir').html(a);
			}
		});
	}else if (document.getElementById("foro")){
		$.ajax({
			type: "POST",
			url: "./generosTemasPublicos.php",
			success: function(a) {
				$('#textaomplir').html(a);
			}
		});
	}
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
	//ABRIR VENTANA MODAL nuevo tema
	$('.tema.button').click(function(){
		// show modal now
		$('.tema.modal')
			.modal('show')
		;
	});
	//VALIDACION VENTANA MODAL nuevo tema
	$('.ui.tema.form').form({
		fields: {
			matter: {
				identifier: 'matter',
				rules: [
					{
						type   : 'empty',
						prompt : 'Escribe el asunto del tema'
					}
				]
			},
			body: {
				identifier: 'body',
				rules: [
					{
						type   : 'empty',
						prompt : 'Escribe el tema que quieras enviar'
					}
				]
			}
		}
	});	
	//CAMBIAR A LA PESATAÑAS DEL MENU DEL FORO
		$('#1').click(function(){
			document.getElementById("1").className="item active";
			document.getElementById("2").className="item";
			document.getElementById("3").className="item";
			document.getElementById("4").className="item";
			document.getElementById("5").className="item";
			document.getElementById("6").className="item";
			document.getElementById("7").className="item";
			document.getElementById("8").className="item";
			$.ajax({
				type: "POST",
				url: "./mensajesRecibidos.php",
				success: function(a) {
					$('#textaomplir').html(a);
				}
			});
		});
		$('#2').click(function(){
			document.getElementById("1").className="item";
			document.getElementById("2").className="item active";
			document.getElementById("3").className="item";
			document.getElementById("4").className="item";
			document.getElementById("5").className="item";
			document.getElementById("6").className="item";
			document.getElementById("7").className="item";
			document.getElementById("8").className="item";
			$.ajax({
				type: "POST",
				url: "./mensajesRecibidos.php",
				success: function(a) {
					$('#textaomplir').html(a);
				}
			});
		});
});