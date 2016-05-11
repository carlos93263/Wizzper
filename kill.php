<?php
	session_start();
	session_destroy();
	setcookie("wizzpercookielogin", time()-1);
	
?>