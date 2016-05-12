<?php
	//REEMPLAZAR SESION START POR ARCHIVO DE INCLUDE.
	session_start();
	if (isset($_SESSION['wizzper_email'])){
		header("location: index.php");
	}else{
		//Incluimos la conexion a BBDD
		include ("../conexion.php");
		//Recuperacion de variables pasadas con el formulario.
		$nickname = utf8_decode($_REQUEST['mod_nickname']);
		$email = utf8_decode($_REQUEST['mod_email']);
		$nombre = utf8_decode($_REQUEST['mod_nombre']);
		$apellidos = utf8_decode($_REQUEST['mod_apellidos']);
		$birth = $_REQUEST['mod_dateofbirth'];

		$sql = "UPDATE tbl_user SET user_nickname='$nickname', user_email='$email', user_name='$nombre', user_surname='$apellidos', user_dateofbirth='$birth'";
		 
		if ((isset($_REQUEST['mod_password'])) && (!empty($_REQUEST['mod_password']))){
			$password = md5($_REQUEST['mod_password']);
			$sql .= ", user_password='$password'";
		}

		if (isset($_REQUEST['recibir_mensajes'])){
			$recibir = 1;
			$sql .= ", user_response='$recibir'";
		}else{
			$recibir = 0;
			$sql .= ", user_response='$recibir'";
		}

		if (isset($_REQUEST['notif_email'])){
			$notif_email = 1;
			$sql .= ", user_notification='$notif_email'";
		}else{
			$notif_email = 0;
			$sql .= ", user_notification='$notif_email'";
		}
		$sql .= " WHERE user_id=$_SESSION[wizzperid]";


		//Lanzamiento de la consulta
		$datos = mysqli_query($con,$sql);
		if (mysqli_affected_rows($con) == 1){
			header("location: ../modificar_perfil.php");
		} else {
			header("location: ../modificar_perfil.php");
		}
	}
?>