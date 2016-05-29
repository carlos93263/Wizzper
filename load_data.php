<?php
//if($_POST['page']){
    $page = $_POST['page'];
    $cur_page = $page;
    $page -= 1;
    $per_page = 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;
    
    include ("conexion.php");
    
    $query_pag_data = "SELECT DISTINCT tbl_message.mess_id, tbl_message.mess_matter, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_messConver.meco_read FROM tbl_message INNER JOIN tbl_messUser ON tbl_message.mess_id=tbl_messUser.mess_id INNER JOIN tbl_messConver ON tbl_messUser.meus_id=tbl_messConver.meus_id Where tbl_messUser.user_id='6' LIMIT $start, $per_page";
    $result_pag_data = mysqli_query($con,$query_pag_data);
    $msg = "";

    while ($row = mysqli_fetch_array($result_pag_data,MYSQLI_ASSOC)){
        $htmlmsg=htmlentities($row['mess_matter']);
        if ($row['meco_read']!=1){
            $msg .= "<div class='item'><i class='mail outline icon'></i><div class='content'><div class='header'>".$htmlmsg."</div>".$row['mess_dateText']." - ".$row['mess_timeText']."</div></div>";
        } else {
            $msg .= "<div class='item'><i class='mail icon'></i><div class='content'><div class='header'>".$htmlmsg."</div>".$row['mess_dateText']." - ".$row['mess_timeText']."</div></div>";
        }
    }

    $msg = "<div class='row'><div id='mensajes' class='ui celled list'>" . $msg . "</div></div>"; // Content for Data


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
        $msg .= "<a p='1' id='item' class='item'>|<</a>";
    } else if ($first_btn) {
        $msg .= "<a p='1' id='item' class='item disabled'>|<</a>";
    }

    // FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $msg .= "<a p='$pre' id='item' class='item'><</a>";
    } else if ($previous_btn) {
        $msg .= "<a id='item' class='item disabled'><</a>";
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
        $msg .= "<a p='$nex' id='item' class='item'>></a>";
    } else if ($next_btn) {
        $msg .= "<a id='item' class='item disabled'>></a>";
    }

    // TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $msg .= "<a p='$no_of_paginations' id='item' class='item'>>|</a>";
    } else if ($last_btn) {
        $msg .= "<a p='$no_of_paginations' id='item' class='item disabled'>>|</a>";
    }
    $msg = $msg . "</div></div>";  // Content for pagination
    echo $msg;
//}