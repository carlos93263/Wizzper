<script>
$('#enviarConstestacioMissatge').click(function(){
	var body = document.getElementById("bodymes").value;
	var missatge = document.getElementById("mensajeId").value;
		$.ajax({
			type: "POST",
			url: "procs/insertarMensaje.proc.php",
			data: "missatge="+missatge+"&body="+body,
			success: function(msg)
			{
			}	
		});
});

</script>
<?php
include ("validacio.php");

    $missatge = $_POST['missatge'];
    include ("conexion.php");
    
    $query_mess = "SELECT DISTINCT tbl_message.mess_id, tbl_message.user_id, tbl_messUser.meus_matter, tbl_message.mess_textBody, tbl_message.mess_dateText, tbl_message.mess_timeText, tbl_message.mess_read from tbl_message inner join tbl_messUser on tbl_message.meus_id=tbl_messUser.meus_id Where tbl_messUser.user_id2='$_SESSION[wizzperid]' AND tbl_messUser.meus_id=$missatge";
    $result_mess = mysqli_query($con,$query_mess);

    while ($row = mysqli_fetch_array($result_mess)){
        $htmlmsg=htmlentities($row['mess_textBody']);
        if($row['user_id'] == $_SESSION['wizzperid']){
			echo "<div class='derecha'>";
		} else {
			echo "<div class='izquierda'>";
		}
				echo  "<div class='item'>
						<div class='content'>
							<span class='ui orange label'>".$row['meus_matter']."</span>
							<div class='description'>
								<p>".$htmlmsg."</p>
							</div>
							<br/>
							<div class='extra'>
								<div >".$row['mess_dateText']." - ".$row['mess_timeText']."
								</div><br/>
							</div>
						</div>
					</div>
				</div>";
			
	}
	//echo "</div>";
	echo "</div>";
		echo "<form action='procs/insertarMensaje.proc.php' method='get' class='ui tema form'>
				<input type='hidden' id='mensajeId' name='id' value='".$missatge."'>
				<div class='required field'>
				  <label >Respuesta</label>
				  <textarea id='bodymes' name='bodymes'></textarea>
				</div>
				<div id='enviarConstestacioMissatge' cm='1' class='ui submit button'>Enviar</div>
			  </form>";