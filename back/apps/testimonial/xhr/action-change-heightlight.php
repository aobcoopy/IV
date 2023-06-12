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
	
	$sql = $dbc->Query("select * from blogs where heightlight = '1'");
	while($row = $dbc->Fetch($sql))
	{
		$dbc->Update("blogs",array('#heightlight' => '0','#updated' => 'NOW()'),"id='".$row['id']."'");
	}
	
	$id = $_REQUEST['id'];
	$dbc->Update("blogs",array('#heightlight' => '1','#updated' => 'NOW()'),"id='".$id."'");
	
	
	
	/*if($dbc->HasRecord("blogs","id='".$id."'and status=1"))
	{
		$dbc->Update("blogs",array('#status' => '0','#updated' => 'NOW()'),"id='".$id."'");
	}
	else
	{
		$dbc->Update("blogs",array('#status' => '1','#updated' => 'NOW()'),"id='".$id."'");
	}*/
	
	echo json_encode(true);
	
	$dbc->Close();
?>