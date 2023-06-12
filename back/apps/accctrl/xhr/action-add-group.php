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
	
	if($dbc->HasRecord("groups","name = '".$_REQUEST['txtName']."'")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'Group Name is already exist.'
		));
	}else{
		$data = array(
			'#id' => "DEFAULT",
			'name' => $_REQUEST['txtName'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#role' => 'NULL'
		);
		
		if($dbc->Insert("groups",$data)){
			$id = $dbc->GetID();
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$group = $dbc->GetRecord("groups","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"group-add",$id,$group);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>