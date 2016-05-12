<?php
	//Incluimos la conexion a BBDD
	include ("conexion.php");
	//Lanzamiento de la consulta
	$sql = "SELECT tbl_categories.cate_id, tbl_categories.cate_name from tbl_categories";
	$datos = mysqli_query($con, $sql);
	if(mysqli_num_rows($datos) > 0){
		echo "<div class='ui grid'>
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
			</div>";
	}
	mysqli_close($con);
?>
    