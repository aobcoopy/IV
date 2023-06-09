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
			'tx_date_a' => $val['tx_date_a'],
			'tx_date_d' => $val['tx_date_d'],
			'tx_airline_a' => $val['tx_airline_a'],
			'tx_airline_d' => $val['tx_airline_d'],
			'tx_flight_a' => $val['tx_flight_a'],
			'tx_flight_d' => $val['tx_flight_d'],
			'tx_time_a' => $val['tx_time_a'],
			'tx_time_d' => $val['tx_time_d'],
			'tx_pass_a' => $val['tx_pass_a'],
			'tx_pass_d' => $val['tx_pass_d'],
			'tx_transfer_a' => $val['tx_transfer_a'],
			'tx_transfer_d' => $val['tx_transfer_d'],
		);
		//echo '----'.$val['tx_first'].'----'.$val['tx_passport'].'----'.$val['tx_city'].'----'.$val['tx_date'].'----'.$val['tx_nationality'].'----'.$val['tx_room'];
		//array_push($ar_data,$val);
	}
	//print_r($ar_data);
	
	$data = array(
		'airport_transfer' => json_encode($ar_data),
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
