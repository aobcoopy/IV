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
	
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	
	if($dbc->HasRecord("chat_rooms","name = '".$name."' and email = '".$email."'"))
	{
		$gdat = $dbc->GetRecord("chat_rooms","*","name = '".$name."' and email = '".$email."'");
		$data = array(
			'status' => 0,
			'#updated' => 'NOW()'
		);
		
		if($dbc->Update("chat_rooms",$data,"id = '".$gdat['id']."' "))
		{
			unset($_SESSION['chat']);		
			
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'Chat stop'
				)
			);
		}
		else
		{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Can not stop'
				)
			);
		}
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'Chat can not stop'
			)
		);
	}
	
	//unset($_SESSION['chat']);
?>
