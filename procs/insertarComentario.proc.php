<?php
	include ("../validacio.php");
	include ("../conexion.php");
	$id_tema = $_REQUEST['id_tema'];
	//$_SESSION['wizzperid'];
	//$_SESSION['wizzpernick'];

	if (!isset($_REQUEST['cuerpoComentario']) || empty($_REQUEST['cuerpoComentario']) || $_REQUEST['cuerpoComentario'] == ""){
		
		header("Location: ../mostrarTemaPublico.php?pthe_id=".$_REQUEST['id_tema']);

	}else{
		$cuerpo = $_REQUEST['cuerpoComentario'];
		$data = date("Y") . "-" . date("m") . "-" . date("d");
		$hora = date("H") . ":" . date("i") . ":" . date("s");
		$user = $_SESSION['wizzperid'];
		$sql ="INSERT INTO `tbl_commentspublicthems` (`cpth_id`, `cpth_textBody`, `cpth_dateText`, `cpth_timeText`, `cpth_like`, `cpth_visible`, `user_id`, `pthe_id`) VALUES (NULL, '$cuerpo', '$data', '$hora', NULL, '1', '$user', '$id_tema')";
		//echo $sql;
		$datos = mysqli_query($con, $sql);
		header("Location: ../mostrarTemaPublico.php?pthe_id=".$_REQUEST['id_tema']);
	}
?>