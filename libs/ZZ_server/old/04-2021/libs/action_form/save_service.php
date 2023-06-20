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
	
	$ar_data = array(
		'Tours' => $_REQUEST['tx_tour'],
		'Restaurant' => $_REQUEST['tx_Restaurant'],
		'Massage' => $_REQUEST['tx_Massage'],
		'Occasion' => $_REQUEST['tx_Occasion'],
		'Arrangements' => $_REQUEST['tx_Arrangements'],
		'Dietary' => $_REQUEST['tx_Dietary'],
		'Comment' => $_REQUEST['tx_Comment']
	);
	$data = array(
		'service' => json_encode($ar_data),
		'#updated' => 'NOW()',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form",$data,"id = '".$_REQUEST['txtID']."' "))
	{
		echo json_encode(array(
			'status' => true,
			'msg' => 'Success'
		));
	}
	else
	{
		echo json_encode(array(
			'status' => false,
			'msg' => 'Saved.'
		));
	}
	
?>
