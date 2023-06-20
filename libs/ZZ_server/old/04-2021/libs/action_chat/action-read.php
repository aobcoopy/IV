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
	$room = $_REQUEST['room'];
	$mess = $_REQUEST['mess'];
	
	if($dbc->HasRecord("chat_history","room = '".$room."' and message = '".$mess."' and status = 0 and user IS NULL"))
	{
		echo json_encode(true);
	}
	else
	{
		echo json_encode(false);
	}
?>
