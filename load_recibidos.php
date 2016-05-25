<?php
include ("validacio.php");
//if($_POST['page']){
    $page = $_POST['page'];
    $cur_page = $page;
    $page -= 1;
    $per_page = 10;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;
	
    include ("conexion.php");
    
    $query_pag_data = "SELECT DISTINCT tbl_messUser.meus_id, tbl_message.mess_id, tbl_message.mess_matter, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_message.mess_read FROM tbl_message INNER JOIN tbl_messUser ON tbl_message.meus_id=tbl_messUser.meus_id Where tbl_messUser.user_id2='$_SESSION[wizzperid]' group by tbl_message.meus_id LIMIT $start, $per_page";
	//echo $query_pag_data;
    $result_pag_data = mysqli_query($con,$query_pag_data);
    $msg = "";

    while ($row = mysqli_fetch_array($result_pag_data,MYSQLI_ASSOC)){
        $htmlmsg=htmlentities($row['mess_matter']);
        if ($row['mess_read']!=1){
            $msg .= "<div id=". $row['meus_id'] ." class='item'>
						<div m=". $row['meus_id'] ." id=". $row['meus_id'] ." class='content'>
							<div class='header'>
								<i class='file text outline icon'></i>
								".$htmlmsg."
							</div>
							".$row['mess_dateText']." - ".$row['mess_timeText']."
						</div>
					</div>";
        } else {
            $msg .= "<div id=". $row['meus_id'] ." class='item'>
						<div m=". $row['meus_id'] ." id=". $row['meus_id'] ." class='content'>
							<div class='header'>
								<i class='mail outline icon'></i>
								".$htmlmsg."
							</div>
							".$row['mess_dateText']." - ".$row['mess_timeText']."
						</div>
					</div>";
        }
    }
	$msg = $msg . "";
    $msg = "<div class='row'>
				<div class='four wide column'>
					<div class='ui vertical fluid tabular menu'>
						<div id='mensajes' class='ui celled list'>
							" . $msg . "
						</div>
					</div> 
				</div>
				<div class='twelve wide stretched column'>
					<div class='ui segment'>
						<div id='missatges'>
							<h3 id='noMensaje'>No hay ningún mensaje seleccionado</h3>
						</div>
					</div>
				</div>
			</div>"; // Content for Data


    /* --------------------------------------------- */
    $query_pag_num = "SELECT COUNT(*) AS count FROM tbl_message WHERE user_id='6'";
    $result_pag_num = mysqli_query($con,$query_pag_num);
    $row = mysqli_fetch_array($result_pag_num,MYSQLI_ASSOC);
    $count = $row['count'];
    $no_of_paginations = ceil($count / $per_page);

    /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
    if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
            $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
            $start_loop = $no_of_paginations - 6;
            $end_loop = $no_of_paginations;
        } else {
            $end_loop = $no_of_paginations;
        }
    } else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
            $end_loop = 7;
        else
            $end_loop = $no_of_paginations;
    }
    /* ----------------------------------------------------------------------------------------------------------- */
    $msg .= "<div class='row'><div id='pagination' class='ui small pagination menu'>";

    // FOR ENABLING THE FIRST BUTTON
    if ($first_btn && $cur_page > 1) {
        $msg .= "<a p='1' id='item' class='item'>First</a>";
    } else if ($first_btn) {
        $msg .= "<a p='1' id='item' class='item disabled'>First</a>";
    }

    // FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $msg .= "<a p='$pre' id='item' class='item'><<</a>";
    } else if ($previous_btn) {
        $msg .= "<div id='item' class='item disabled'><<</div>";
    }
    for ($i = $start_loop; $i <= $end_loop; $i++) {

        if ($cur_page == $i)
            $msg .= "<a p='$i' id='item' class='item active'>{$i}</a>";
        else
            $msg .= "<a p='$i' id='item' class='item'>{$i}</a>";
    }

    // TO ENABLE THE NEXT BUTTON
    if ($next_btn && $cur_page < $no_of_paginations) {
        $nex = $cur_page + 1;
        $msg .= "<a p='$nex' id='item' class='item'>>></a>";
    } else if ($next_btn) {
        $msg .= "<div id='item' class='item disabled'>>></div>";
    }

    // TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $msg .= "<a p='$no_of_paginations' id='item' class='item'>Last</a>";
    } else if ($last_btn) {
        $msg .= "<a p='$no_of_paginations' id='item' class='item disabled'>Last</a>";
    }
    $msg = $msg . "</div></div>";  // Content for pagination
	
    echo $msg;
//}