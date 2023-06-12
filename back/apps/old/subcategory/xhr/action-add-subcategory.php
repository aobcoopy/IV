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
	
	if($dbc->HasRecord("categories","name = '".$_REQUEST['txtName']."'")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'Categories Name is already exist.'
		));
	}else{
		$data = array(
			'#id' => "DEFAULT",
			'name' => $_REQUEST['txtName'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#parent' => isset($_REQUEST['parent'])?$_REQUEST['parent']:'NULL'
		);
		
		if($dbc->Insert("categories",$data)){
			$id = $dbc->GetID();
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$category = $dbc->GetRecord("categories","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"category-add",$id,$category);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>