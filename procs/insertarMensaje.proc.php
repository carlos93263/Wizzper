<?php
	include ("../validacio.php");
	include ("../conexion.php");
	$user = $_SESSION['wizzperid'];
	//$_SESSION['wizzpernick'];

	if (!isset($_REQUEST['body']) || empty($_REQUEST['body']) || $_REQUEST['body'] == ""){
		echo "<script type=\"text/javascript\">
				history.go(-1);
			  </script>";
	}else{
		$cuerpo = $_REQUEST['body'];
		$id = $_REQUEST['id'];
		$data = date("Y") . "-" . date("m") . "-" . date("d");
		$hora = date("H") . ":" . date("i") . ":" . date("s");
		$user = $_SESSION['wizzperid'];
		$sql ='INSERT INTO `tbl_message`(`mess_textBody`, `mess_dateText`, `mess_timeText`, `user_id`, `meus_id`) VALUES ("'.$cuerpo.'","'.$data.'","'.$hora.'","'.$user.'","'.$id.'") ';
		//echo $sql;
		//$datos = mysqli_query($con, $sql);
		header("Location: ../index.php);
	}
?>