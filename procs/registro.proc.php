<?php
	//REEMPLAZAR SESION START POR ARCHIVO DE INCLUDE.
	session_start();
	if (isset($_SESSION['wizzper_email'])){
		header("location: index.php");
	}else{
		//Incluimos la conexion a BBDD
		include ("../conexion.php");
		//Recuperacion de variables pasadas con el formulario.
		$nickname = utf8_decode($_REQUEST['nickname']);
		$gender = utf8_decode($_REQUEST['gender']);
		$email = utf8_decode($_REQUEST['email']);
		$password = md5($_REQUEST['password']);
		$nombre = utf8_decode($_REQUEST['nombre']);
		$apellidos = utf8_decode($_REQUEST['apellidos']);
		$birth = $_REQUEST['dateofbirth'];
		//Lanzamiento de la consulta
		$sql = "INSERT INTO `bd_whisperinlight`.`tbl_user` (`user_id`,`user_nickname`, `user_email`, `user_password`, `user_name`, `user_surname`, `user_dateofbirth`, `user_avatar`, `user_gender`, `user_response`, `user_notification`) VALUES (NULL, '$nickname', '$email', '$password', '$nombre', '$apellidos', '$birth', 'users_avatar.png', '$gender', 1, 1)";
		$datos = mysqli_query($con,$sql);
		if (mysqli_affected_rows($con) == 1){
			$_SESSION['correcto_registro'] = "El usuario se ha creado correctamente, bienvenido a nuestra comunidad.";
			header("location: ../login.php");
		} else {
			$_SESSION['error_registro'] = "Ha habido un error con el registro, intentalo de nuevo por favor.";
			header("location: ../registro.php");
		}
	}
?>