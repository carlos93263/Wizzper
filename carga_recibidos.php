<?php
    $missatge = $_POST['missatge'];
    echo $_POST['missatge'];	
    include ("conexion.php");
    
    $query_mess = "SELECT DISTINCT tbl_message.mess_id, tbl_message.mess_matter, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_messConver.meco_read from tbl_message inner join tbl_messUser on tbl_message.mess_id=tbl_messUser.mess_id inner join tbl_messConver on tbl_messUser.meus_id=tbl_messConver.meus_id Where tbl_message.user_id='6'";
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