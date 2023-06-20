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
	
	$id = $_REQUEST['id'];
	
	$data = $dbc->GetRecord("messages","*","id = '".$id."'");
	
	echo json_encode(
		array(
			'status' => true,
			'question' => $data['message'],
			'msg' => $data['answer']
		)
	)
?>
