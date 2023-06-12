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
		$banners = $dbc->GetRecord("yacth_prefer_program","*","id=".$item);
		
		/*$photo=json_decode($banners['photo']);
		if(deleteFile($photo)){}
		$cover=json_decode($banners['cover']);
		if(deleteFile($cover)){}*/
		
		$dbc->Delete("yacth_prefer_program","id=".$item);
		//unlink("../../../../".json_decode($banners['photo'],true));
		$os->save_log(0,$_SESSION['auth']['user_id'],"yacth_prefer_program-remove",$item,$banners);
	}
	
	$dbc->Close();
?>