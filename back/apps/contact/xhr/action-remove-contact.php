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
	
	foreach($_REQUEST['items'] as $item){
		$banners = $dbc->GetRecord("contact_us","*","id=".$item);
		$dbc->Delete("contact_us","id=".$item);
		$os->save_log(0,$_SESSION['auth']['user_id'],"contact_us-remove",$item,$banners);
	}
	
	$dbc->Close();
?>