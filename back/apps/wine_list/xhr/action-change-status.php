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
	if($dbc->HasRecord("wine_list","id='".$id."'and status=1"))
	{
		$dbc->Update("wine_list",array('#status' => '0'),"id='".$id."'");
	}
	else
	{
		$dbc->Update("wine_list",array('#status' => '1'),"id='".$id."'");
	}
	
	echo json_encode(true);
	
	$dbc->Close();
?>