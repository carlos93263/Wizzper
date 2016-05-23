<?php
	//Incluimos la conexion a BBDD
	include ("conexion.php");
	$tema = $_REQUEST['tema'];
	//Lanzamiento de la consulta
	$sql = "SELECT tbl_user.user_nickname, tbl_publicThems.pthe_id, tbl_publicThems.pthe_matter, tbl_publicThems.pthe_dateText, tbl_publicThems.pthe_timeText, tbl_publicThems.pthe_closed, tbl_publicThems.pthe_ProfesionalArticle from tbl_publicThems inner join tbl_categories on tbl_publicThems.cate_id=tbl_categories.cate_id inner join tbl_user on tbl_publicThems.user_id=tbl_user.user_id Where tbl_categories.cate_name='$tema'";
	//echo $sql;
	$datos = mysqli_query($con, $sql);
	if(mysqli_num_rows($datos) > 0){
		echo "<div class='ui grid'>";
		$count = 0;
		while($send = mysqli_fetch_array($datos)){
			if(($count % 2)>0){
				echo "<div class='sixteen wide column' style='background-color:red'>";
			}else {
				echo "<div class='sixteen wide column' style='background-color:blue'>";
			}
			$count++;
			if($send['pthe_closed'] == 1){
				echo "<a class='item'>Articulo Cerrado</a>";
			}
			if($send['pthe_ProfesionalArticle'] == 1){
				echo "Articulo Profesional";
			}
			echo $send['pthe_id'];
			echo $send['pthe_matter'];
			echo $send['pthe_dateText'];
			echo $send['pthe_timeText'];
			echo "</div>";
		}
	}else{
		echo "Aún no hay ningun tema sobre esta categoria<br>";
		echo $tema;
	}
	mysqli_close($con);
?>