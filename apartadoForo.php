<?php
	//Incluimos la conexion a BBDD
	include ("conexion.php");
	$tema = $_REQUEST['tema'];
	//Lanzamiento de la consulta
	$sql = "SELECT tbl_message.mess_id, tbl_message.mess_matter, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_messConver.meco_read from tbl_message inner join tbl_messUser on tbl_message.mess_id=tbl_messUser.mess_id inner join tbl_messConver on tbl_messUser.meus_id=tbl_messConver.meus_id Where tbl_message.user_id='6'";
	$datos = mysqli_query($con, $sql);
	if(mysqli_num_rows($datos) > 0){
		while($send = mysqli_fetch_array($datos)){
			if($send['meco_read'] == 0){
				
			}else{
				
			}
			echo $send['mess_matter'];
			echo $send['mess_dateText'];
			echo $send['mess_timeText'];
			echo "<br/> ";
		}
	}else{
		echo "Aún no hay ningun tema sobre esta categoria";
	}
	mysqli_close($con);
?>