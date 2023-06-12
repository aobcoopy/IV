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
	
	$id = $_REQUEST['txtID'];
	
	//$array_list = array();
	foreach($_REQUEST['inside_data'] as $val)
	{
		$array_list[] = array(
			'tx_1' => $val['tx_1'],
			'tx_2' => $val['tx_2'],
			'tx_3' => $val['tx_3']
		);
	}
	
	$data = array(
		'pricelists' => json_encode($array_list),
		'#updated' => 'NOW()',
		'#status' => '0',
		'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("yacht",$data,"id=".$id)){
		
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
		
		
		$os->save_log(0,$_SESSION['auth']['user_id'],"yacht-edit",$id,$datas);
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Insert Error"
		));
	}
	
	$dbc->Close();
?>