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
	
	
	//$data = array(
//		'#id' => "DEFAULT",
//		'name' => $_REQUEST['tx_adname'],
//		'message' => addslashes($_REQUEST['tx_chat']),
//		'room' => $_REQUEST['txroom'],
//		
//		'user' =>  $_SESSION['auth']['user_id'],
//		'#created' => 'NOW()',
//		'status' => 0
//	);
//	
//	$dbc->Insert("chat_history",$data);
	
	$data_1 = array(
		//'user' =>  $_SESSION['auth']['user_id'],
		'#updated' => 'NOW()',
		'status' => 1
	);
	
	$dbc->Update("chat_history",$data_1,"room = '".$_REQUEST['txroom']."' and user IS NULL");
	
	
	

	//$sql = $dbc->Query("select * from chat_history where room = '".$_REQUEST['txroom']."'");
//	while($row = $dbc->Fetch($sql))
//	{
//		//@$time = date("H:i:s",$row['created']);
//		echo '<div class="col-md-12">';
//		if($row['user']!='')
//		{
//			echo "<div class=\"cover_chat_ad text-right\">";
//				echo "<p><strong> : XClub</strong></p>";
//				echo "<p>".$row['message']."</p> ";
//			echo "</div>";
//		}
//		else
//		{
//			echo "<div class=\"cover_chat\">";
//				echo "<p><strong>คุณ</strong> : </p>";
//				echo "<p>".$row['message']."</p>";
//			echo "</div>";
//		}
//		echo "</div>";
//	}

	
?>