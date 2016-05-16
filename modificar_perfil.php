<?php
	//Recojemos id de cookies & session
	include ("validacio.php");
	include ("conexion.php");
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '-18 year' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
    $sql = "SELECT * FROM tbl_user WHERE user_id='$_SESSION[wizzperid]'";
    $datos = mysqli_query($con, $sql);
    while($send = mysqli_fetch_array($datos)){
		$nickname=utf8_encode($send['user_nickname']);
		$email=utf8_encode($send['user_email']);
		$nombre=utf8_encode($send['user_name']);
		$apellidos=utf8_encode($send['user_surname']);
		$birth=$send['user_dateofbirth'];
		$respuestas=$send['user_response'];
		$notificaciones=$send['user_notification'];
	}
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
                <a class="item" href="index.php">
                    Home
                </a>
                <a class="item" href="rankings.php">
                    Rankings
                </a>
                <div class="ui simple dropdown item">
                    Recomendaciones <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="psicologos.php">Psicólogos</a>
                        <a class="item" href="ayudas_sociales.php">Ayudas Sociales</a>
                    </div>
                </div>
                <a class="item" href="temasPublicos.php">
                    Temas Públicos
                </a>
                <div class="ui simple right floated dropdown item" id="user_options">
                    <img class="ui avatar image" src="media/img/users_avatar.png"><?php echo $_COOKIE["wizzpercookielogin"];?><i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="modificar_perfil.php">Modificar Perfil</a>
                        <a class="item" href="kill.php">Logout</a>
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
        			<form class="ui modifcarPerfil form" name="modi" method="POST" action="procs/modificar_perfil.proc.php">
        				<div class="ui horizontal segments">
							<div class="ui orange segment">
								<div class="field">
									<label>Nickname</label>
									<input type="text" name="mod_nickname" value="<?php echo $nickname; ?>">
								</div>
							</div>
							<div class="ui orange segment">
								<div class="field">
									<label>Email</label>
									<input type="email" name="mod_email" value="<?php echo $email; ?>">
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
									<input type="password" name="mod_repeat_password">
								</div>
							</div>
							<div class="ui orange segment">
								<div class="field">
									<label>Name</label>
									<div class="two fields">
										<div class="field">
											<input type="text" name="mod_nombre" value="<?php echo $nombre; ?>">
										</div>
										<div class="field">
											<input type="text" name="mod_apellidos" value="<?php echo $apellidos; ?>">
										</div>
									</div>
								</div>
								<div class="field">
									<label>Fecha de nacimiento</label>
	                                <div class="ui left icon input">
	                                    <input type="date" name="mod_dateofbirth" max='<?php echo $nuevafecha;?>' value='<?php echo $birth;?>'>
	                                    <i class="calendar icon"></i>
	                                </div>
                            	</div>
							</div>
						</div>
						<div class="ui horizontal segments">
							<div class="ui left aligned orange segment">
								<div class="ui checkbox">
								<?php
									if($respuestas!=0){
								?>
										<input type="checkbox" name="recibir_mensajes" checked>
										<label>Recibir mensajes de otros usuarios.</label>
								<?php
									}else{
								?>
										<input type="checkbox" name="recibir_mensajes">
										<label>Recibir mensajes de otros usuarios.</label>
								<?php
									}
								?>
								</div>
								<p></p>
								<div class="ui checkbox">
									<?php
									if($notificaciones!=0){
									?>
										<input type="checkbox" name="notif_email" checked>
										<label>Recibir notificaciones en mi email cuando reciba una respuesta.</label>
									<?php
									}else{
									?>
										<input type="checkbox" name="notif_email">
										<label>Recibir notificaciones en mi email cuando reciba una respuesta.</label>
									<?php
									}
									?>
								</div>
								<div class="ui error message"></div>
								<p></p>
								<div class="ui right floated buttons">
									<button class="ui grey button" type="reset">Cancelar</button>
									<div class="or"></div>
									<button class="ui orange button" type="submit">Guardar</button>
								</div>
							</div>
						</div>
					</form>
        		</div>	
        		<div class="one wide column"></div>
        	</div>
			
		</div>
		<!-- FIN CUERPO -->
    </body>
</html>
