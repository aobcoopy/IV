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
	
	$data = array(
		'email' => $_REQUEST['tx_e_mail'],
		'#updated' => 'NOW()',
	);
	
	if($dbc->Update("properties",$data,"id=".$id)){
		$os->save_log(0,$_SESSION['auth']['user_id'],"properties-edit-email",$id,$banners);
		
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
		
		
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Insert Error"
		));
	}
		
		
		
	
	$dbc->Close();
?>