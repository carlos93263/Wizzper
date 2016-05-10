<?php
	$servidor = 'localhost';
	$usuario = 'root';
	$password = '';
	$base_datos = 'bd_whisperinlight';
	$con = mysqli_connect($servidor,$usuario,$password,$base_datos) or die ("No se puede conectar a la base de datos!!");
?>