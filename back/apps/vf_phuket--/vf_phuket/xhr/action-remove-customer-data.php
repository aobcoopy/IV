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
	$dbc->Delete("villa_form_mapping","id=".$id);
	$os->save_log(0,$_SESSION['auth']['user_id'],"villa_form-customer-remove",$item,$banners);
	
	echo json_encode(array('status' => true));
	$dbc->Close();
?>