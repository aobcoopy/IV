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
	$ssid = session_id();
	
	if($dbc->HasRecord("messages","message = '".$_REQUEST['tx_Question']."'")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'messages Name is already exist.'
		));
	}else{
		$data = array(
			'#id' => "DEFAULT",
			'message' => $_REQUEST['tx_Question'],
			'answer' => $_REQUEST['tx_Answer'],
			//'bid' => $ssid,
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
			//'#parent' => isset($_REQUEST['parent'])?$_REQUEST['parent']:'NULL'
		);
		
		if($dbc->Insert("messages",$data)){
			$id = $dbc->GetID();
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$category = $dbc->GetRecord("messages","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"messages-add",$id,$category);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>