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
		//CAMBIAR A LA PRIMERA PESTAÑA DEL MENU PRINCIPAL
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
		//CAMBIAR A LA SEGUNDA PESTAÑA DEL MENU PRINCIPAL
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
	//VALIDACION DEL FORMULARIO DE MODIFICAR PERFIL
	$('.ui.modifcarPerfil.form').form({
		fields: {
  			mod_nickname: {
        		identifier : 'mod_nickname',
        		rules:[{
            		type   : 'empty',
            		prompt : 'Debes introducir un nickname.'
          		}]
      		},
      		mod_email: {
        		identifier : 'mod_email',
        		rules:[{
            		type   : 'email',
            		prompt : 'Introduce un correo electrónico válido.'
          		}]
      		},
      		mod_repeat_password: {
        		identifier  : 'mod_repeat_password',
        		rules: [{
            		type   : 'match[mod_password]',
            		prompt : 'Please put the same value in both fields'
          		}]
      		},
      		mod_nombre: {
        		identifier : 'mod_nombre',
        		rules:[{
            		type   : 'empty',
            		prompt : 'Debes introducir un nombre.'
          		}]
      		},
      		mod_apellidos: {
        		identifier : 'mod_apellidos',
        		rules:[{
            		type   : 'empty',
            		prompt : 'Debes introducir un apellido.'
          		}]
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
	//CAMBIAR A LA PESTAÑAS DEL MENU DEL FORO
	$('#Amistad').click(function(){
		document.getElementById("Amistad").className="item active";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Amistad",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Amor').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item active";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Amor",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Dinero').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item active";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Dinero",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Estudios').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item active";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Estudios",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Familia').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item active";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Familia",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Salud').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item active";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Salud",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Trabajo').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item active";
		document.getElementById("Varios").className="item";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Trabajo",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
	$('#Varios').click(function(){
		document.getElementById("Amistad").className="item";
		document.getElementById("Amor").className="item";
		document.getElementById("Dinero").className="item";
		document.getElementById("Estudios").className="item";
		document.getElementById("Familia").className="item";
		document.getElementById("Salud").className="item";
		document.getElementById("Trabajo").className="item";
		document.getElementById("Varios").className="item active";
		$.ajax({
			type: "POST",
			url: "./apartadoForo.php?tema=Varios",
			success: function(a) {
				$('#texttema').html(a);
			}
		});
	});
});