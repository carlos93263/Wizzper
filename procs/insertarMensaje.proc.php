<?php
	include ("../validacio.php");
	include ("../conexion.php");
	$id_tema = $_REQUEST['id_tema'];
	//$_SESSION['wizzperid'];
	//$_SESSION['wizzpernick'];

	if (!isset($_REQUEST['body']) || empty($_REQUEST['body']) || $_REQUEST['body'] == ""){
		echo "<script type=\"text/javascript\">
				history.go(-1);
			  </script>";
	}else{
		$cuerpo = $_REQUEST['body'];
		$data = date("Y") . "-" . date("m") . "-" . date("d");
		$hora = date("H") . ":" . date("i") . ":" . date("s");
		$user = $_SESSION['wizzperid'];
		$sql ="INSERT ";
		//echo $sql;
		//$datos = mysqli_query($con, $sql);
		header("Location: ../index.php);
	}
?>