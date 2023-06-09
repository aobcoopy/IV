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
	
	$room_id = $_REQUEST['id'];
	
	if(!in_array($room_id,$_SESSION['favorite']))
	{
		array_push($_SESSION['favorite'],$room_id);
		echo json_encode(
			array(
				'status' => true,
				'msg' => 'Successful'
			)
		);
	}
	else
	{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'You had favorite.'
				)
			);
	}

	
?>
