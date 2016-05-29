<?php
	session_start();
	//Incluimos la conexion a BBDD
	include ("../conexion.php");
	
	$matter = utf8_decode($_REQUEST['matter']);
	$body = utf8_decode($_REQUEST['body']);
	$data = date("Y") . "-" . date("m") . "-" . date("d");
	$hora = date("H") . ":" . date("i") . ":" . date("s");
	$user = $_SESSION['wizzperid'];
	
	
	//Lanzamiento de la consulta
	$sql = "SELECT `user_id`, `user_response` FROM `tbl_user` WHERE tbl_user.user_id != '$user' AND tbl_user.user_response = '1' order by tbl_user.user_dateofbirth ASC";
	echo $sql;
	//$datos = mysqli_query($con, $sql);
	$sql1 = "INSERT INTO `tbl_messuser`(`meus_matter`, `user_id1`, `user_id2`) VALUES ('$matter', '$user',[value-4])";
	echo $sql1;
	//$datos1 = mysqli_query($con, $sql1);
	$sql2 = "SELECT `meus_id`, `meus_matter`, `user_id1`, `user_id2` FROM `tbl_messuser` WHERE 1";
	echo $sql2;
	//$datos2 = mysqli_query($con, $sql2);
	$sql3 = "INSERT INTO `tbl_message`(`mess_id`, `mess_textBody`, `mess_dateText`, `mess_timeText`, `mess_read`, `user_id`, `meus_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])";
	echo $sql3;
	//$datos3 = mysqli_query($con, $sql3);

	mysqli_close($con);
?>