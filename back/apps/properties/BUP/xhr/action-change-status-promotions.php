<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
    include_once ( "../../../../inc/functions.inc.php" );
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$id = $_REQUEST['id'];
	$val = '';
	if($dbc->HasRecord("properties","id='".$id."'and pro_status=1"))
	{
		$dbc->Update("properties",array('#pro_status' => '0','#updated' => 'NOW()','pro_exp' => NULL),"id='".$id."'");
		$val = 0;
	}
	else
	{
		$dbc->Update("properties",array('#pro_status' => '1','#updated' => 'NOW()','pro_exp' => $_REQUEST['exp_date']),"id='".$id."'");
		$val = 1;
	}
	
	echo json_encode(array('status'=>true,'val'=>$val));
    
    updateAvailablePropertiesInDestinationTable();

	$dbc->Close();
    
?>