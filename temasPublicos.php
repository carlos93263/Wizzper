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
        <!-- CARGAR JQUERY -->
        <script src="js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<!-- CARGAR JQUERY 2 -->
        <!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->
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
                <span class="item"><img class="ui small image" src="media/logo/loguito.png" onclick="location.href='index.php'"></span>
                <a class="item" href="index.php">
                    Bandeja de Entrada
                </a>
                 <a class="item" href="temasPublicos.php">
                    Temas Públicos
                </a>
                <div class="ui simple dropdown item">
                    Especialistas <i class="dropdown orange icon"></i>
                    <div class="menu">
                        <a class="item" href="psicologos.php">Psicólogos</a>
                        <a class="item" href="ayudas_sociales.php">Ayudas Sociales</a>
                    </div>
                </div>
               
                <div class="ui simple right floated dropdown item" id="user_options">
                    <img class="ui avatar image" src="media/img/users_avatar.png"><?php echo $_COOKIE["wizzper"];?><i class="dropdown orange icon"></i>
                    <div class="menu">
                        <a class="item" href="modificar_perfil.php">Modificar Perfil</a>
                        <a class="item" href="kill.php">Cerrar Sesión</a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- FIN DE MENU -->
		<!-- INICIO CUERPO -->
    		<div class="ui vertically divided stackable grid" id="grid_cuerpo">
                <?php
					if(isset($_SESSION['temanuevo'])&& $_SESSION['temanuevo'] != ""){
						echo "<h2>".$_SESSION['temanuevo']."</h2>";
						$_SESSION['temanuevo'] = "";
					}
				?>
				<div class="four column row">
					<div class="one wide column">
					</div>
                    <div class="ten wide column">
                        <!-- AQUI VA EL CONTINGUT QUE TENS DE LES DUES PESTANYES I VENTANA MODAL ETC... -->   
						<div class="ui top attached tabular menu">
							<div id="foro" class="item active">
								Categorías
							</div>
							<div class="right menu">
								<div class="item">
									<div id="menNuevo" class="ui tema button"> Crear Tema nuevo</div><br/>
								</div>
							</div>
						</div>
						<div class="ui bottom attached segment">
							<?php
							include ("generosTemasPublicos.php");
							?>
						</div>
                    </div>
                    <div class="four wide column">
                        <!-- AQUI ANIRAN TOTS ELS ANUNCIS I ETC... QUE VOLGUEM CARREGAR -->
                    </div>
					<div class="one wide column">
					</div>
				</div>
            </div>	
		<!-- VENTANA MODAL-->
		<div class="ui tema modal">
			<i class="close icon"></i>
			<div class="header">
				Crear Tema Nuevo
			</div>
			<br/>
			<form action="procs/nuevoTema.proc.php" method="get" class="ui tema form">
				<div class="required field">
					<label> Titulo del Tema</label>
					<input id="matter" name="matter" type="text">
				</div>
				<div class="required field">
					<label> Cuerpo del tema</label>
					<textarea id="body" name="body"></textarea>
				</div>
				
				<div class="ui vertically divided stackable grid" >
					<div class="two column row">
						<div class="eight wide column">
							<div class="required field">
								<select name="categoria" class="ui search dropdown">
									<option value="">Seleccione una Categoria</option>
									<option value="1">Amistad</option>
									<option value="2">Amor</option>
									<option value="3">Dinero</option>
									<option value="4">Estudios</option>
									<option value="5">Familia</option>
									<option value="6">Salud</option>
									<option value="7">Sexualidad</option>
									<option value="8">Trabajo</option>
									<option value="9">Otros</option>
								</select>
							</div>
						</div>
						<?php
							if($_SESSION['wizzperkous']==2){
						?>
						<div class="eight wide column">
							<div class="required field">
								<select name="pro" class="ui search dropdown">
									<option value="">Tipo de Artículo</option>
									<option value="1">Consulta/Necesito Ayuda</option>
									<option value="2">Articulo Profesional/Recomendaciones</option>
								</select>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				
				<div class="ui submit button">Enviar</div>
			</form>
		</div>
		<!-- FIN CUERPO -->
    </body>
</html>