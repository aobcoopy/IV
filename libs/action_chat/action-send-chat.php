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
			
			$data = array(
				'#id' => 'DEFAULT',
				'name' => $gdat['name'],
				'message' => $_REQUEST['tx_text'],
				'room' => $rid,
				'status' => 0,
				'#created' => 'NOW()',
				'#updated' => 'NOW()'
			);
			$dbc->Insert("chat_history",$data);
			
			
			
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
		$data = array(
			'#id' => 'DEFAULT',
			'name' => $name,
			'email' => $email,
			'status' => 1,
			'#created' => 'NOW()',
			'#updated' => 'NOW()'
		);
		
		if($dbc->Insert("chat_rooms",$data))
		{
			$rid = $dbc->GetID();
			/*$data = array(
				'#id' => 'DEFAULT',
				'name' => $name,
				//'message' => $_REQUEST[''],
				'room' => $rid,
				'status' => 0,
				'#created' => 'NOW()',
				'#updated' => 'NOW()'
			);
			$dbc->Insert("chat_history",$data);*/
			
			$_SESSION['chat']['name'] = $name;
			$_SESSION['chat']['email'] = $email;
			
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
	
	
?>
