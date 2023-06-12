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
	
	
	
	
		$data = array(
			'#id' => "DEFAULT",
			'rate' => $_REQUEST['input-4'],
			'text' => base64_encode($_REQUEST['tx_text']),
			'property' => $_REQUEST['txtID'],
			'#created' => 'NOW()',
			'#status' => '1',
			'#user' => $_SESSION['auth']['user_id'],
			'name' => $_REQUEST['tx_name'],
			'days' => $_REQUEST['tx_date_rate'],
			'title' => $_REQUEST['tx_titler'],
		);
		
		if($dbc->Insert("rating",$data)){
			$id = $dbc->GetID();
			$banners = $dbc->GetRecord("rating","*","id=".$id);
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id,
				'property'=> $banners['property'],
			));
			
			
			$os->save_log(0,$_SESSION['auth']['user_id'],"rating-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>