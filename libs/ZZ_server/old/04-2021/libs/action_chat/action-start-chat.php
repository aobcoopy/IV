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
	
	$name = $_REQUEST['tx_c_name'];
	$email = $_REQUEST['tx_c_email'];
	
	if($dbc->HasRecord("chat_rooms","name = '".$name."' and email = '".$email."'"))
	{
		$gdat = $dbc->GetRecord("chat_rooms","*","name = '".$name."' and email = '".$email."'");
		$data = array(
			'status' => 1,
			'#updated' => 'NOW()'
		);
		
		if($dbc->Update("chat_rooms",$data,"id = '".$gdat['id']."' "))
		{
			/*$rid = $gdat['id'];
			$data = array(
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
			$_SESSION['chat']['room'] = $gdat['id'];
			
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'Chat start',
					'idroom' => $_SESSION['chat']['room'],
					's_name' => $_SESSION['chat']['name'],
					's_email' => $_SESSION['chat']['email']
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
			$_SESSION['chat']['room'] = $rid;
			
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'Chat start',
					'idroom' => $_SESSION['chat']['room'],
					's_name' => $_SESSION['chat']['name'],
					's_email' => $_SESSION['chat']['email']
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
