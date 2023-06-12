+<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$data = array(
		'value'=> $_REQUEST['tx_us'],
		'#updated'=> 'NOW()'
	);
	
	$dbc->Update("variable",$data,"name = 'us'");
	
	echo json_encode(array(
		'success'=>true,
	));
	
	

	
		
		
		
		
?>