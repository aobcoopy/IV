<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	if(unlink($_POST['path']))
	{
		echo json_encode(
			array(
				'status' => true,
				'msg' => 'Successful'
			)
		);
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'Please  try again'
			)
		);

	}
	
	
?>

<?php
	
	$dbc->Close();
?>