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

	$today = date("Y-m");
	
	$data = array(
		'#id' => 'DEFAULT',
		'photo' => json_encode($_REQUEST['txt_photo']),
		'customer' => $_REQUEST['txt_name'],
		'email' => $_REQUEST['txt_Email'],
		'#cus_status' => 1,
		'property' => $_REQUEST['txtIDRoom'],
		'text' => base64_encode($_REQUEST['txt_Comment']),
		'#created' => 'NOW()',
		'name' => $_REQUEST['txt_name'],
		'#status' => 0,
		'days' => $today,
		'rate' => $_REQUEST['txt_rating']
	);
	
	if($dbc->Insert("rating",$data)){
		//$id = $dbc->GetID();
	
		echo json_encode(
			array(
				'status' => true,
				'msg' => 'Waiting for approved.'
			)
		);
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'Please try again.'
			)
		);

	}
	$dbc->Close();
?>