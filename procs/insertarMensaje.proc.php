<?php
	include ("../validacio.php");
	include ("../conexion.php");
	$user = $_SESSION['wizzperid'];
	//$_SESSION['wizzpernick'];

	$cuerpo = $_REQUEST['body'];
	$missatge = $_REQUEST['missatge'];
	$data = date("Y") . "-" . date("m") . "-" . date("d");
	$hora = date("H") . ":" . date("i") . ":" . date("s");
	$user = $_SESSION['wizzperid'];
	$sql ='INSERT INTO `tbl_message`(`mess_textBody`, `mess_dateText`, `mess_timeText`, `user_id`, `meus_id`) VALUES ("'.$cuerpo.'","'.$data.'","'.$hora.'","'.$user.'","'.$missatge.'") ';
	echo $sql;
	$datos = mysqli_query($con, $sql);
?>