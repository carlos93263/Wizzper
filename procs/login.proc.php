<?php
	session_start();
	if (isset($_POST['login'])){
		//Incluimos la conexion a BBDD
		include ("../conexion.php");
		//Recuperacion de variables pasadas con el formulario.
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		//Lanzamiento de la consulta
		$sql = "SELECT user_email, user_id, user_password FROM tbl_user WHERE user_email='$email' AND user_password='$password'";
		$datos = mysqli_query($con, $sql);
		if(mysqli_num_rows($datos) > 0){
			while($send = mysqli_fetch_array($datos)){
				$_SESSION['mail']= $send['user_email'];
				$_SESSION['id']= $send['user_id'];
				$_SESSION['pass']= $send['user_password'];
				header("Location: ../index.html");
				die();
			}
		}else{
			$_SESSION['error_login'] = 'Debes introducir un email';
			header("Location: ../login.php");
			die();
		}
		mysqli_close($con);
	}else{
		$_SESSION['validarse'] = 'Email o contraseña incorrectos';
		header("Location: ../login.php");
		die();
	}
?>