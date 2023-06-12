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
	
	$id = $_REQUEST['txtID'];
	
	$code = $_REQUEST['tx_ggc'];
	$str_re = str_replace('**"',"",$code);
	$str_re2 = str_replace('"**',"",$str_re);
	//echo $str_re2;
	if($dbc->Update("properties",array('ggc' => base64_encode($code)),"id='".$id."'"))
	{
		echo json_encode(array(
				'success'=>true,
				'msg' => 'Successful'
			));
	}
	else
	{
		echo json_encode(array(
				'success'=>false,
				'msg' => 'Please ry Again'
			));
	}
	$dbc->Close();
    
?>