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
	
	if($dbc->HasRecord("faq","name = '".$_REQUEST['txtName']."' AND id != ".$_REQUEST['txtID'])){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'faq Name is already exist.'
		));
	}else{
		$category = $dbc->GetRecord("faq","*","id=".$_REQUEST['txtID']);
		$data = array(
			'name' => $_REQUEST['txtName'],
			'#updated' => 'NOW()',
			'#parent' => isset($_REQUEST['parent'])?$_REQUEST['parent']:'NULL'
		);
		
		if($dbc->Update("faq",$data,"id=".$_REQUEST['txtID'])){
			echo json_encode(array(
				'success'=>true
			));
			$category_new = $dbc->GetRecord("faq","*","id=".$_REQUEST['txtID']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"faq-edit",$_REQUEST['txtID'],array(
				"old" => $category,
				"new" => $category_new
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