<?php
	//Recojemos id de cookies & session
	include ("validacio.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Plantilla HTML de Wizzper</title>
        <!-- CARGAR MI CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- CARGAR  JQUERY -->
        <script src="js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<!-- CARGAR  JQUERY 2 -->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <!-- CARGAR CSS SEMANTIC -->
        <link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
        <!-- CARGAR JS SEMANTIC -->
        <script src="dist/semantic.min.js" type="text/javascript"></script>
        <!-- CARGAR MI JS -->
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
    	<!-- INICIO MENU -->
		<header>
            <nav class="ui stackable menu">
                <span class="item"><img class="ui mini image" src="media/logo/loguito.png"></span>
                <a class="item">
                    Home
                </a>
                <a class="item">
                    Rankings
                </a>
                <div class="ui simple dropdown item">
                    Recomendaciones <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item">Psicólogos</a>
                        <a class="item">Ayudas Sociales</a>
                    </div>
                </div>
                <a class="item">
                    Temas Públicos
                </a>
                <div class="ui simple right floated dropdown item" id="user_options">
                    <img class="ui avatar image" src="media/img/users_avatar.png"><?php echo $_COOKIE["wizzpercookielogin"]; ?><i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="#">Psicólogos</a>
                        <a class="item">Ayudas Sociales</a>
                    </div>
                    
                </div>
            </nav>
        </header>
        <!-- FIN DE MENU -->

		<!-- INICIO CUERPO -->
    		<div class="ui vertically divided stackable grid" id="grid_cuerpo">
                <div class="four column row">
					<div class="one wide column">
					</div>
                    <div class="ten wide column">
                        <!-- AQUI VA EL CONTINGUT QUE TENS DE LES DUES PESTANYES I VENTANA MODAL ETC... -->   
						<div class="ui top attached tabular menu">
							<a id="mMenu1"class="item active">
								Mensajes Recibidos
							</a>
							<a id="mMenu2"class="item">
								Mensajes Enviados
							</a>
							<div class="right menu">
								<div class="item">
									<div id="menNuevo" class="ui mensaje button"> Crear Mensaje nuevo</div><br/>
								</div>
							</div>
						</div>
						<div class="ui bottom attached segment">
							<p id="textaomplir"></p>
						</div>
                    </div>
                    <div class="four wide column">
                        <!-- AQUI ANIRAN TOTS ELS ANUNCIS I ETC... QUE VOLGUEM CARREGAR -->
                    </div>
					<div class="one wide column">
					</div>
					</div>
                </div>
            </div>	
		<!-- VENTANA MODAL-->
		<div class="ui mensaje modal">
			<i class="close icon"></i>
			<div class="header">
				Crear Mensaje Nuevo
			</div>
			<br/>
			<form action="" class="ui mensaje form">
				<div class="required field">
					<label> Asunto del Mensaje</label>
					<input id="matter" type="text">
				</div>
				<div class="required field">
					<label> Cuerpo del mensaje</label>
					<textarea id="body"></textarea>
				</div>
				<div class="inline required fields">
					<label for="fruit">A cuantas personas quieres enviar el mensaje:</label>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="numPer" checked="" tabindex="0" class="hidden">
							<label>1 Personas</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="numPer" tabindex="0" class="hidden">
							<label>5 Personas</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="numPer" tabindex="0" class="hidden">
							<label>10 Personas</label>
						</div>
					</div>
				</div>
				<div class="inline required fields">
					<label for="opTip">Opinión :</label>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="opTip" checked="" tabindex="0" class="hidden">
							<label>Femenina</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="opTip" tabindex="0" class="hidden">
							<label>Masculina</label>
						</div>
					</div>
				</div>
				<div class="ui submit button">Enviar</div>
			</form>
		</div>
		<!-- FIN CUERPO -->
    </body>
</html>