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
	
	$vid = $_REQUEST['vid'];
	
	if(!$dbc->HasRecord("villa_form","property = '".$vid."'"))
	{
		$val = array(
			'#id' => "DEFAULT",
			'#property' => $vid,
			'#created' => 'NOW()',
			'#status' => 0,
			'#user' => $_SESSION['auth']['user_id']
		);
		$dbc->Insert("villa_form",$val);
		$form_id = $dbc->GetID();
		
		echo json_encode(array(
			'status' => true,
			'msg' => 'Success'
		));
	}
	else
	{
		echo json_encode(array(
			'status' => false,
			'msg' => 'This villa has already.'
		));
	}
	$dbc->Close();
?>