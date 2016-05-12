<?php
	//Recojemos id de cookies & session
	include ("validacio.php");

    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Perfil</title>
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
                        <a href="modificar_perfil.php" class="item">Modificar perfil</a>
                        <a class="item">Logout</a>
                    </div>
                    
                </div>
            </nav>
        </header>
        <!-- FIN DE MENU -->

		<!-- INICIO CUERPO -->
		<div class="ui stackable grid" id="grid_cuerpo">
        	<div class="four column row">
        		<div class="one wide column"></div>
        		<div class="four wide center aligned column">
        			<img class="ui medium circular image" src="media/img/users_avatar.png"><br/>
					<div>
						<label for="file" class="ui orange icon button">
						<i class="upload icon"></i>
						Subir Imagen</label>
						<input type="file" id="file" style="display:none">
					</div>
        		</div>
        		<div class="ten wide column">
        			<form class="ui form">
        				<div class="ui horizontal segments">
							<div class="ui orange segment">
								<div class="field">
									<label>Nickname</label>
									<input type="text" name="mod_nickname" value="Prueba">
								</div>
							</div>
							<div class="ui orange segment">
								<div class="field">
									<label>Email</label>
									<input type="email" name="mod_email" value="email@gmail.com">
								</div>
							</div>
						</div>
						<div class="ui horizontal segments">
							<div class="ui orange segment">
								<div class="field">
									<label>New password</label>
									<input type="password" name="mod_password">
								</div>
								<div class="field">
									<label>Repeat new password</label>
									<input type="password" name="mod_repeat_pass">
								</div>
							</div>
							<div class="ui orange segment">
								<div class="field">
									<label>Name</label>
									<div class="two fields">
										<div class="field">
											<input type="text" name="mod_nombre" value="Nombre">
										</div>
										<div class="field">
											<input type="text" name="mod_apellidos" value="Apellidos">
										</div>
									</div>
								</div>
								<div class="field">
									<label>Fecha de nacimiento</label>
	                                <div class="ui left icon input">
	                                    <input type="date" name="dateofbirth" max='<?php echo $nuevafecha;?>' value='<?php echo $nuevafecha;?>'>
	                                    <i class="calendar icon"></i>
	                                </div>
                            	</div>
							</div>
						</div>
						<div class="ui horizontal segments">
							<div class="ui left aligned orange segment">
								<!-- <div class="ui left aligned segment"> -->
									<div class="ui toggle checkbox">
										<input type="checkbox" name="public">
										<label>Recibir mensajes de otros usuarios.</label>
									</div>
									<p></p>
									<div class="ui toggle checkbox">
										<input type="checkbox" name="public">
										<label>Recibir notificaciones en mi email cuando reciba una respuesta.</label>
									</div>
<!-- 								</div> -->
							</div>
						</div>
        			</form>
        		</div>
        		<div class="one wide column"></div>
        	</div>
			<div class=" row">
				<div class="sixteen wide center aligned column">
					<div class="ui buttons">
						<button class="ui grey button">Cancelar</button>
						<div class="or"></div>
						<button class="ui orange button">Guardar</button>
					</div>
				</div>
			</div>
        </div>
		<!-- FIN CUERPO -->
    </body>
</html>