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
	
	$roomid = $_REQUEST['txIDRoom'];
	
	if($dbc->HasRecord("chat_rooms","id = '".$roomid."'"))
	{
		$gdat = $dbc->GetRecord("chat_rooms","*","id = '".$roomid."'");
		$data = array(
			'status' => 1,
			'#updated' => 'NOW()'
		);
		
		if($dbc->Update("chat_rooms",$data,"id = '".$roomid."' "))
		{
			$rid = $roomid;
			
			$data = array(
				'status' => 1,
				'#updated' => 'NOW()'
			);
			$dbc->Update("chat_history",$data,"room = '".$roomid."' and user IS NOT NULL ");
			
			
			
			
			
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'Chat start'
				)
			);
		}
		else
		{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Chat stop'
				)
			);
		}
	}
	else
	{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Chat stop'
				)
			);
	}
	
	
?>
