<?php
	//Recojemos id de cookies & session
	include ("validacio.php");
	include ("conexion.php");
	if((isset($_REQUEST['pthe_id'])) && ($_REQUEST['pthe_id']!="") && (!empty($_REQUEST['pthe_id']))){
		$mensaje_tema = $_REQUEST['pthe_id'];
	} else {
		header("Location: temasPublicos.php");
	}
	
	$id_usu=$_SESSION['wizzperid'];
	
	
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Mostrar tema</title>
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
    	<?php
    	$sqlito="SELECT * FROM tbl_publicthems WHERE tbl_publicthems.pthe_id='$mensaje_tema' AND tbl_publicthems.pthe_closed!='1'";
		$datitos=mysqli_query($con,$sqlito);
    	if (mysqli_num_rows($datitos) > 0){
    	?>
    	<!-- INICIO MENU -->
		<header>
            <nav class="ui stackable menu">
                <span class="item"><img class="ui small image" src="media/logo/loguito.png" onclick="location.href='index.php'"></span>
                <a class="item" href="index.php">
                    Home
                </a>
                 <a class="item" href="temasPublicos.php">
                    Temas Públicos
                </a>
                <div class="ui simple dropdown item">
                    Recomendaciones <i class="dropdown orange icon"></i>
                    <div class="menu">
                        <a class="item" href="psicologos.php">Psicólogos</a>
                        <a class="item" href="ayudas_sociales.php">Ayudas Sociales</a>
                    </div>
                </div>
               
                <div class="ui simple right floated dropdown item" id="user_options">
                    <img class="ui avatar image" src="media/img/users_avatar.png"><?php echo $_COOKIE["wizzper"];?><i class="dropdown orange icon"></i>
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
        <?php
			if(isset($_SESSION['temanuevo'])&& $_SESSION['temanuevo'] != ""){
				echo "<h2>".$_SESSION['temanuevo']."</h2>";
				$_SESSION['temanuevo'] = "";
			}
		?>
			<div class="four column row">
				<div class="one wide column"></div>
                <div class="ten wide column">
                <button class="ui orange button" type="button" onclick="location='temasPublicos.php'">Atrás</button>
                    <!-- AQUI VA EL CONTINGUT QUE TENS DE LES DUES PESTANYES I VENTANA MODAL ETC... -->   
					<div class="ui top attached tabular menu">
						<div class="item active">
							Temas Públicos
						</div>
					</div>
					<div class="ui bottom attached segment">

						<?php
							$onclick = 'return confirm("Estas seguro de eliminar este hilo?") && confirm("Estas realmente seguro de eliminar el hilo? No habrá vuelta atrás.");';
							$msg = "";
							$sql = "SELECT tbl_publicthems.pthe_id, tbl_publicthems.pthe_matter, tbl_publicthems.pthe_textBody, tbl_publicthems.pthe_dateText, tbl_publicthems.pthe_timeText, tbl_user.user_nickname, tbl_user.user_id, tbl_user.user_avatar from tbl_publicthems inner join tbl_user on tbl_publicthems.user_id=tbl_user.user_id WHERE pthe_id='$mensaje_tema'";
							$datos = mysqli_query($con,$sql);
							while ($send = mysqli_fetch_array($datos)){
								if ($send['user_id'] == $id_usu){
									$msg.= "<div class='item'>
											<div class='ui tiny circular image'>
												<img src='media/img/".$send['user_avatar']."'>
											</div>
											<div class='content'>
												<span class='header'>".$send['pthe_matter']."</span>
												<a href='procs/eliminarhilo.proc.php?pthe_id=".$mensaje_tema."' class='ui right floated red basic label' onClick='".$onclick."'>Elimnar Hilo</a>
												<a class='ui right floated orange basic label'>Editar</a>
												<div class='meta'>
													<span class='cinema'>". $send['user_nickname']."</span>
												</div>
												<div class='description'>
													<p>".$send['pthe_textBody']."</p>
												</div>
												<br/>
												<div class='extra'>
													<div class='ui orange label'>".$send['pthe_dateText']." - ".$send['pthe_timeText']."</div>
												</div>
											</div>
										</div>";
								}else{
									$msg.= "<div class='item'>
											<div class='ui tiny circular image'>
												<img src='media/img/".$send['user_avatar']."'>
											</div>
											<div class='content'>
												<span class='header'>".$send['pthe_matter']."</span>
												<div class='meta'>
													<span class='cinema'>". $send['user_nickname']."</span>
												</div>
												<div class='description'>
													<p>".$send['pthe_textBody']."</p>
												</div>
												<br/>
												<div class='extra'>
													<div class='ui orange label'>".$send['pthe_dateText']." - ".$send['pthe_timeText']."</div>
												</div>
											</div>
										</div>";
								}
								
							}
							$sql2 = "SELECT tbl_publicthems.pthe_matter, tbl_commentspublicthems.cpth_id, tbl_commentspublicthems.cpth_textBody, tbl_commentspublicthems.cpth_dateText, tbl_commentspublicthems.cpth_timeText, tbl_commentspublicthems.cpth_like, tbl_commentspublicthems.cpth_visible, tbl_commentspublicthems.user_id, tbl_commentspublicthems.pthe_id, tbl_user.user_nickname, tbl_user.user_avatar from tbl_commentspublicthems inner join tbl_user on tbl_commentspublicthems.user_id = tbl_user.user_id inner join tbl_publicthems on tbl_commentspublicthems.pthe_id=tbl_publicthems.pthe_id WHERE tbl_commentspublicthems.pthe_id='$mensaje_tema'";
							//echo $sql2;
							$datos2 = mysqli_query($con,$sql2);
							if (mysqli_num_rows($datos2) > 0){
								while($send2 = mysqli_fetch_array($datos2)){
									$msg.= "<div class='item'>
											<div class='ui tiny circular image'>
												<img src='media/img/".$send2['user_avatar']."'>
											</div>
											<div class='content'>
												<span class='header'><i class='comments outline icon'></i>RE: ".$send2['pthe_matter']."</span>
												<div class='meta'>
													<span class='cinema'>". $send2['user_nickname']."</span>
												</div>
												<div class='description'>
													<p>".$send2['cpth_textBody']."</p>
												</div>
												<br/>
												<div class='extra'>
													<div class='ui orange label'>".$send2['cpth_dateText']." - ".$send2['cpth_timeText']."</div>
													<div class='ui orange right floated icon button'>
														<i class='thumbs outline up icon icon'></i>
													</div>
													<a class='ui right floated basic orange left pointing label'>
														69
													</a>
												</div>
											</div>
										</div>";
								}
							}
						?>
						<div class="ui divided items">
							<?php echo $msg ?>
						</div>
						<form class="ui form" action="procs/insertarComentario.proc.php" method="POST">
							<input type="hidden" name="id_tema" value="<?php echo $mensaje_tema ?>">
							<div class="required field">
								
								<label>Escribir una respuesta:</label>
								<textarea id="cuerpoComentario" name="cuerpoComentario"></textarea>
							</div>
							<button class="ui button" type="submit">Responder</button>
						</form>
					</div>
                </div>
                <div class="four wide column">
                    <!-- AQUI ANIRAN TOTS ELS ANUNCIS I ETC... QUE VOLGUEM CARREGAR -->
                </div>
				<div class="one wide column"></div>
			</div>
        </div>
		<!-- FIN CUERPO -->
		<?php
		}else{
			header("Location: temasPublicos.php");	
		}
    	?>
    </body>
</html>
