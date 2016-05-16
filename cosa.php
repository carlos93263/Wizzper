
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

		<!-- INICIO CUERPO -->
    		<div class="ui vertically divided stackable grid" id="grid_cuerpo">
                        <!-- AQUI VA EL CONTINGUT QUE TENS DE LES DUES PESTANYES I VENTANA MODAL ETC... -->   
						<div class="ui top attached tabular menu">
							<a id="foro22" class="item active">
								Temas Públicos
							</a>
						</div>
						<div class="ui bottom attached segment">
							<?php
								//Incluimos la conexion a BBDD
								include ("conexion.php");
								//Lanzamiento de la consulta
								$sql = "SELECT tbl_categories.cate_id, tbl_categories.cate_name from tbl_categories";
								$datos = mysqli_query($con, $sql);
								if(mysqli_num_rows($datos) > 0){
									echo "<div id='textaomplir'><div class='ui grid'>
											<div class='three wide column'>
												<div class='ui vertical fluid tabular menu'>";
								$count = 0;
									while($send = mysqli_fetch_array($datos)){
										//echo $send['cate_id'];
										if($count == 0){
											echo "<a id='$send[cate_name]' class='item active'>$send[cate_name]</a><br/> ";
											$count++;
										}else{
											echo "<a id='$send[cate_name]' class='item'>$send[cate_name]</a><br/> ";
										}
									}
										echo "</div>
										  </div>
										  <div class='thirteen wide stretched column'>
											<div class='ui segment'>
												<p id='texttema'>
												</p>
											</div>
										  </div>
										</div></div>";
								}
								mysqli_close($con);
							?>
						</div>

            </div>	

		<!-- FIN CUERPO -->
    </body>
</html>