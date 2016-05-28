<?php
	//Recojemos id de cookies & session
	include ("../validacio.php");
	include ("../conexion.php");
	$mensaje_eliminar = $_REQUEST['pthe_id'];
	$sql = "UPDATE tbl_publicthems SET pthe_closed='1' WHERE tbl_publicthems.pthe_id='$mensaje_eliminar'";
	$datos = mysqli_query($con,$sql);
	header("Location: ../temasPublicos.php");
?>