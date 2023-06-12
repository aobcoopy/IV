<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$sql = $dbc->Query("select * from chat_rooms order by id desc");
	$i=0;
	while($row = $dbc->Fetch($sql))
	{
		echo '<a href="#" class="list-group-item " onClick="load_chat('.$row['id'].')">';
			echo '<strong>Name :</strong> '.$row['name'].'   /<strong>  Email :</strong> '.$row['email'];
			$amt = $dbc->GetCount("chat_history","room = '".$row['id']."' and status = 0 and user IS NULL");
			if($amt>0)
			{
				echo '<span class="badge btn-danger">'.$amt.'</span>';
			}
		echo '</a>';	
		$i++;
	}
	
	if($i<1)
	{
		echo 'No Chat';
	}
	
	$dbc->Close();
?>