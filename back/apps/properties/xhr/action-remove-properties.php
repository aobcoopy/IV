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
		$banners = $dbc->GetRecord("properties","*","id=".$item);
		$img = json_decode($banners['photo'],true);
		foreach($img as $im)
		{
			//unlink("../../../../".$im);
			deleteFile($im['img']);
		}
		$cover = json_decode($banners['cover']);
		if(deleteFile($cover)){

		}
		$plan = json_decode($banners['plan']);
		if(deleteFile($plan)){
		}
		$file =json_decode($banners['file']);
		if(deleteFile($file)){
		}
		$dbc->Delete("properties","id=".$item);
		//unlink("../../../../".json_decode($banners['file'],true));
		$os->save_log(0,$_SESSION['auth']['user_id'],"properties-remove",$item,$banners);
	}
	
	$dbc->Close();
?>