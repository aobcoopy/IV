<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	include_once "../../../inc/functions.inc.php";
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	foreach($_REQUEST['items'] as $item){
		$banners = $dbc->GetRecord("icons","*","id=".$item);
		deleteFile(json_decode($banners['icon'],true));
		$dbc->Delete("icons","id=".$item);
		//unlink("../../../../".json_decode($banners['icon'],true));
		$os->save_log(0,$_SESSION['auth']['user_id'],"icons-remove",$item,$banners);
	}
	
	$dbc->Close();
?>