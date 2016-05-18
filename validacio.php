<?php
	session_start();
		if(isset($_SESSION['error_login']))$error = $_SESSION['error_login'];
		if(isset($_SESSION['validarse']))$error = $_SESSION['validarse'];
	if(isset($_COOKIE["wizzper"])){
		$user = $_COOKIE["wizzper"]; 
		setcookie("wizzper", $user, time()+60*60*24*30, "/");//30 dies de vida de la cookie
		$pagelog = strpos($_SERVER['PHP_SELF'], "login.php");
		if($pagelog != 0){
			header("Location: index.php");
			die();
		}
	}
	if(isset($error) || !isset($_SESSION["wizzperid"])){
		if(isset($_COOKIE["wizzper"])){
			$user = $_COOKIE["wizzper"];
			setcookie("wizzper", $user, time()-1, "/");
		}
		session_destroy();
		$pagelog = strpos($_SERVER['PHP_SELF'], "login.php");
		if($pagelog == 0){
			header("Location: login.php");
			die();
		}
	}
?>