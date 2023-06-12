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
			'customer' => $_REQUEST['txName'],
			'email' => $_REQUEST['txWebsite'],
			//'#cus_status' => 1,
			//'property' => $_REQUEST['txtIDRoom'],
			'text' => base64_encode($_REQUEST['tx_Comment']),
			'#created' => 'NOW()',
			'name' => $_REQUEST['txName'],
			//'#status' => 0,
			//'days' => $today,
			'#updated' => 'NOW()',
			//'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("rating",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("rating","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"rating-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>