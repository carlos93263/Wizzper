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
                    <img class="ui avatar image" src="media/img/users_avatar.png"><?php echo $_COOKIE["wizzper"];?><i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="modificar_perfil.php">Modificar Perfil</a>
                        <a class="item" href="kill.php">Logout</a>
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
							<a id="psicologos" class="item active">
								Psicologos
							</a>
							<a id="ayudasSociales" class="item">
								Ayudas Sociales
							</a>
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
		<!-- FIN CUERPO -->
    </body>
</html>