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
	
	$id = $_REQUEST['id'];
	if($dbc->HasRecord("categories","id='".$id."'and v_status=1"))
	{
		$dbc->Update("categories",array('#v_status' => '0','#updated' => 'NOW()'),"id='".$id."'");
	}
	else
	{
		$dbc->Update("categories",array('#v_status' => '1','#updated' => 'NOW()'),"id='".$id."'");
	}
	
	echo json_encode(true);
	
	$dbc->Close();
?>