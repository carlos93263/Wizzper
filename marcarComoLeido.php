<?php
include ("validacio.php");

    $missatge = $_REQUEST['missatge'];
    include ("conexion.php");
    $query_mess = "UPDATE `tbl_message` SET `mess_read`= 0 WHERE `mess_id`= '$missatge'";
    $result_mess = mysqli_query($con,$query_mess);
