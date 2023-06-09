<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	
	$ar_data = array();
	//print_r($_REQUEST['tx_dinner']);
	
	foreach($_REQUEST['val'] as $val)
	{
		$ar_data[] = array(
			'tx_first' => $val['tx_first'],
			'tx_passport' => $val['tx_passport'],
			'tx_city' => $val['tx_city'],
			'tx_date' => $val['tx_date'],
			'tx_nationality' => $val['tx_nationality'],
			'tx_room' => $val['tx_room'],
		);
		//echo '----'.$val['tx_first'].'----'.$val['tx_passport'].'----'.$val['tx_city'].'----'.$val['tx_date'].'----'.$val['tx_nationality'].'----'.$val['tx_room'];
		//array_push($ar_data,$val);
	}
	//print_r($ar_data);
	
	$data = array(
		'guest' => json_encode($ar_data),
		'#updated' => 'NOW()',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form",$data,"id = '".$_REQUEST['txtID']."' "))
	{
		echo json_encode(array(
			'status' => true,
			'msg' => 'Success'
		));
	}
	else
	{
		echo json_encode(array(
			'status' => false,
			'msg' => 'Saved.'
		));
	}
	
?>
