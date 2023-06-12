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
	
	$id = $_REQUEST['cate'];
	
	if($id=='')
	{
		$sql = "select * from categories where parent is not null";
	}
	else
	{
		$sql = "select * from categories where parent = '".$id."'";
	}
	
	$parent = $dbc->Query($sql);
	
	$num = $dbc->Getnum($parent);
	if($num<=0)
	{
		echo '<option value="NULL">Not found</option>';
	}
	else
	{
		while($row_parent = $dbc->Fetch($parent))
		{
			echo '<option value="'.$row_parent['id'].'">'.$row_parent['name'].'</option>';
		}
	}
	
	
	
	$dbc->Close();
?>