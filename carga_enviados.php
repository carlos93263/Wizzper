<?php
include ("validacio.php");

    $missatge = $_POST['missatge'];
    include ("conexion.php");
    
    $query_mess = "SELECT DISTINCT tbl_message.mess_id, tbl_message.mess_matter, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_message.mess_read from tbl_message inner join tbl_messUser on tbl_message.meus_id=tbl_messUser.meus_id Where tbl_messUser.user_id1='$_SESSION[wizzperid]' AND tbl_messUser.meus_id=$missatge";
    $result_mess = mysqli_query($con,$query_mess);

    while ($row = mysqli_fetch_array($result_mess)){
        $htmlmsg=htmlentities($row['mess_matter']);
        echo  "<div id=". $row['mess_id'] ." class='item'>
					<div class='content'>
						<div class='header'>
							<i class='mail outline icon'></i>
							".$htmlmsg."
						</div>
						".$row['mess_dateText']." - ".$row['mess_timeText']."
					</div>
				</div>";
	}
		echo "<form action='#' method='get' class='ui tema form'>
				<div class='required field'>
				  <label>Respuesta</label>
				  <textarea id='body' name='body'></textarea>
				</div>
				<div class='ui submit button'>Enviar</div>
			  </form>";