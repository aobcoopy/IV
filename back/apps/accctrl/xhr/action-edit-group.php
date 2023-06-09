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
	
	if($dbc->HasRecord("groups","name = '".$_REQUEST['txtName']."' AND id != ".$_REQUEST['txtID'])){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'Group Name is already exist.'
		));
	}else{
		$group = $dbc->GetRecord("groups","*","id=".$_REQUEST['txtID']);
		$data = array(
			'name' => $_REQUEST['txtName'],
			'#updated' => 'NOW()'
		);
		
		if($dbc->Update("groups",$data,"id=".$_REQUEST['txtID'])){
			echo json_encode(array(
				'success'=>true
			));
			$group_new = $dbc->GetRecord("groups","*","id=".$_REQUEST['txtID']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"group-edit",$_REQUEST['txtID'],array(
				"old" => $group,
				"new" => $group_new
			));
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "No Change"
			));
		}
	}
	
	$dbc->Close();
?>