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
	
	$item = $_REQUEST['id'];
	$banners = $dbc->GetRecord("rating","*","id=".$item);
	$dbc->Delete("rating","id=".$item);
	$os->save_log(0,$_SESSION['auth']['user_id'],"rating-remove",$item,$banners);
		
	
	$dbc->Close();
?>