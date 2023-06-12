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
	
	
		$data = array(
			'pv_link' => $_REQUEST['tx_PVLink'],
		);
		
		if($dbc->Update("properties",$data,"id='".$_REQUEST['txtID']."'")){
			echo json_encode(array(
				'success'=>true,
				'msg'=> 'Successful',
				'pvlink' => $_REQUEST['tx_PVLink']
			));
			
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Data it's not change"
			));
		}
	
	$dbc->Close();
?>