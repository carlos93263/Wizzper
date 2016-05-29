<?php
	session_start();
	//Incluimos la conexion a BBDD
	include ("../conexion.php");
	
	$matter = utf8_decode($_REQUEST['matter']);
	$body = utf8_decode($_REQUEST['body']);
	$numPer = $_REQUEST['numPer'];
	$opTip = $_REQUEST['opTip'];
	$data = date("Y") . "-" . date("m") . "-" . date("d");
	$hora = date("H") . ":" . date("i") . ":" . date("s");
	$user = $_SESSION['wizzperid'];
	
	//Lanzamiento de la consulta
	$sql = "SELECT `user_id`, `user_response` FROM `tbl_user` WHERE tbl_user.user_id != '$user' AND tbl_user.user_response = '1' order by tbl_user.user_dateofbirth ASC LIMIT 0, $numPer";
	echo $sql;
	echo "<br/>";
	$datos = mysqli_query($con, $sql);
	if(mysqli_num_rows($datos) > 0){
		while($send = mysqli_fetch_array($datos)){
			$user2 = $send['user_id'];
			$sql1 = "INSERT INTO `tbl_messuser`(`meus_matter`, `user_id1`, `user_id2`) VALUES ('$matter', '$user','$user2')";
			echo $sql1;
			echo "<br/>";
			$datos1 = mysqli_query($con, $sql1);
			$sql2 = "SELECT `meus_id` FROM `tbl_messuser` WHERE meus_matter='$matter' AND `user_id1`='$user' AND `user_id2`='$user2'";
			$datos2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($datos2) > 0){
				while($send2 = mysqli_fetch_array($datos2)){
					$id = $send2['meus_id'];
					$sql3 = "INSERT INTO `tbl_message`(`mess_textBody`, `mess_dateText`, `mess_timeText`, `user_id`, `meus_id`) VALUES ('$body', '$data', '$hora', '$user','$id')";
					echo $sql3;
					$datos3 = mysqli_query($con, $sql3);
				}
			}
		}
	}
	mysqli_close($con);
	
	//header("Location: ../index.php");
	//die();
?>