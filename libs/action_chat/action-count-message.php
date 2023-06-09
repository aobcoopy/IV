<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	
	$amt = $dbc->GetCount("chat_history","room = '".$_REQUEST['id']."' and status = 0 and user IS NOT NULL ");
	if($amt>0)
	{
		
			echo json_encode(
				array(
					'status' => true,
					'msg' => $amt
				)
			);
		
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 0
			)
		);
	}
	
	//unset($_SESSION['chat']);
?>
