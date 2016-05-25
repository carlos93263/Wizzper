<?php
	session_start();
	//Incluimos la conexion a BBDD
	include ("../conexion.php");	
	$matter = utf8_decode($_REQUEST['matter']);
	$body = utf8_decode($_REQUEST['body']);
	if(isset($_REQUEST['pro'])){
		if($_REQUEST['pro']==2){
			$pro = 1;	
		} else{
			$pro = 0;
		}
	}else{
		$pro = 0;
	}
	
	$data = date("Y") . "-" . date("m") . "-" . date("d");
	$hora = date("H") . ":" . date("i") . ":" . date("s");
	$user = $_SESSION['wizzperid'];
	$categoria = $_REQUEST['categoria'];
	echo $categoria;
	//Lanzamiento de la consulta
	$sql = "INSERT INTO `tbl_publicthems`(`pthe_matter`, `pthe_textBody`, `pthe_dateText`, `pthe_timeText`,  `pthe_ProfesionalArticle`, `user_id`, `cate_id`) VALUES ('$matter', '$body', '$data', '$hora', '$pro','$user','$categoria')";
	//echo $sql;
	$datos = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1){
		$_SESSION['temanuevo'] = "El tema se ha creado correctamente";
		header("location: ../temasPublicos.php");
	} else {
		$_SESSION['temanuevo'] = "Ha habido un error en la creacion del tema, intentalo de nuevo por favor.";
		header("location: ../temasPublicos.php");
	}
	mysqli_close($con);
?>