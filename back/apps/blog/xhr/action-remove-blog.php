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
		$blogs = $dbc->GetRecord("blogs","*","id=".$item);
		$img = json_decode($blogs['photo'],true);
		foreach($img as $im)
		{ 
			//print_r($im);
			//unlink("../../../../".$im);
			if(deleteFile($im)){
				
			}
		}
		  deleteFile(json_decode($blogs['file']));
		  $dbc->Delete("blogs","id=".$item);
		//unlink("../../../../".json_decode($blogs['file'],true));
		$os->save_log(0,$_SESSION['auth']['user_id'],"blogs-remove",$item,$banners);
	}
	
	$dbc->Close();
?>
