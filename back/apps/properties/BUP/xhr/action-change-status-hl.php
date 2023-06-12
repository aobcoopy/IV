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
	if($dbc->HasRecord("properties","id='".$id."'and heightlight=1"))
	{
		die("hallo");
        $dbc->Update("properties",array('#heightlight' => '0','#updated' => 'NOW()'),"id='".$id."'");
	}
	else
	{
		$dbc->Update("properties",array('#heightlight' => '1','#updated' => 'NOW()'),"id='".$id."'");
	}
	
	echo json_encode(true);
	
	$dbc->Close();
?>