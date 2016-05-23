<?php
//if($_POST['page']){
    $page = $_GET['page'];
	$tema = $_GET['tema'];
	if($page == 0){
		$page = 1;
	} 
    $cur_page = $page;
    $page -= 1;
    $per_page = 5;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;
    include ("conexion.php");

    $query_pag_data = "SELECT DISTINCT tbl_publicThems.user_id, tbl_user.user_nickname, tbl_publicThems.pthe_id, tbl_publicThems.pthe_matter, tbl_publicThems.pthe_dateText, tbl_publicThems.pthe_timeText, tbl_publicThems.pthe_closed, tbl_publicThems.pthe_ProfesionalArticle from tbl_publicThems inner join tbl_categories on tbl_publicThems.cate_id=tbl_categories.cate_id inner join tbl_user on tbl_publicthems.user_id=tbl_user.user_id Where tbl_categories.cate_name='$tema' LIMIT $start, $per_page";
    $result_pag_data = mysqli_query($con,$query_pag_data);
    $msg = "";

    while ($row = mysqli_fetch_array($result_pag_data,MYSQLI_ASSOC)){
        $htmlmsg=htmlentities($row['pthe_matter']);
        $msg .= "<tr><td class='collapsing'><i class='user icon'></i>". utf8_encode($row['user_nickname']) ."</td><td>". utf8_encode($row['pthe_matter']) ."</td><td class='right aligned collapsing'>". $row['pthe_dateText']." - ".$row['pthe_timeText']."</td></tr>";
    }

	$msg = $msg . "";
    $msg = "<div class='row'>
				<table class='ui celled striped table'>
                    <thread>
                        <tr>
                            <th colspan='3'>
                                Temas públicos sobre ". $tema ."
                            </th>
                        </tr>
                    </thread>
                    <tbody>". $msg . 
                    "</tbody>
                </table>
            </div>"; // Content for Data


    /* --------------------------------------------- */
    $query_pag_num = "SELECT COUNT(*) AS count from tbl_publicThems inner join tbl_categories on tbl_publicThems.cate_id=tbl_categories.cate_id Where tbl_categories.cate_name='$tema'";
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
        $msg .= "<a p='1' id='item' f=".$tema." class='item'>First</a>";
    } else if ($first_btn) {
        $msg .= "<a p='1' id='item' f=".$tema." class='item disabled'>First</a>";
    }

    // FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $msg .= "<a p='$pre' id='item' f=".$tema." class='item'><<</a>";
    } else if ($previous_btn) {
        $msg .= "<div id='item' f=".$tema."  class='item disabled'><<</div>";
    }
    for ($i = $start_loop; $i <= $end_loop; $i++) {

        if ($cur_page == $i)
            $msg .= "<a p='$i' id='item' f=".$tema." class='item active'>{$i}</a>";
        else
            $msg .= "<a p='$i' id='item' f=".$tema." class='item'>{$i}</a>";
    }

    // TO ENABLE THE NEXT BUTTON
    if ($next_btn && $cur_page < $no_of_paginations) {
        $nex = $cur_page + 1;
        $msg .= "<a p='$nex' id='item' f=".$tema." class='item'>>></a>";
    } else if ($next_btn) {
        $msg .= "<div id='item' f=".$tema." class='item disabled'>>></div>";
    }

    // TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $msg .= "<a p='$no_of_paginations' id='item' f=".$tema." class='item'>Last</a>";
    } else if ($last_btn) {
        $msg .= "<a p='$no_of_paginations' id='item' f=".$tema." class='item disabled'>Last</a>";
    }
    $msg = $msg . "</div></div>";  // Content for pagination
	
    echo $msg;
//}