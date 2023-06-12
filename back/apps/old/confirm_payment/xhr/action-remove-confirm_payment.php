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
		$news = $dbc->GetRecord("confirm_payment","*","id=".$item);
		$dbc->Delete("confirm_payment","id=".$item);
		unlink('../../../../'.$news['photo']);
		$os->save_log(0,$_SESSION['auth']['user_id'],"confirm_payment-remove",$item,$news);
	}
	
	$dbc->Close();
?>