<?php
	session_start();
	session_destroy();
	setcookie("wizzper", "",time()-1, "/");
	header("Location: login.php");
?>