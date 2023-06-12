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
	if($dbc->HasRecord("properties","id='".$id."'and status=1"))
	{
		$dbc->Update("properties",array('#status' => '0','#updated' => 'NOW()'),"id='".$id."'");
	}
	else
	{
		$dbc->Update("properties",array('#status' => '1','#updated' => 'NOW()'),"id='".$id."'");
	}
	
	$v_data = $dbc->GetRecord("properties","*","id='".$id."'");
	$v_data = $dbc->GetRecord("properties","*","id='".$id."'");
	
	echo json_encode(array(
		'success' => true,
		'vname' => $v_data['name'],
		'status' => $v_data['status'],
		'user' => $_SESSION['auth']['user']
	));
    
    updateAvailablePropertiesInDestinationTable();

	$dbc->Close();
    
?>