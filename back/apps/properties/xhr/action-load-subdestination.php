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
	//echo '-------------------'.$_REQUEST['id'];

	$sql_destinations = $dbc->Query("select * from destinations where parent = '".$_REQUEST['id']."' ");
	while($r_destinations = $dbc->Fetch($sql_destinations))
	{
		echo '<option value="'.$r_destinations['id'].'"'.$actt.'>'.$r_destinations['name'].'</option>';
	}
	
	$dbc->Close();
?>