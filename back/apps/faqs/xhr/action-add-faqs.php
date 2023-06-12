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
	
	if($dbc->HasRecord("faq","name = '".$_REQUEST['txtTitle']."' and parent = '".$_REQUEST['parent']."' ")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'faq Name is already exist.'
		));
	}else{
		$data = array(
			'#id' => "DEFAULT",
			'name' => $_REQUEST['txtTitle'],
			'detail' => base64_encode($_REQUEST['txtName']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#parent' => isset($_REQUEST['parent'])?$_REQUEST['parent']:'NULL'
		);
		
		if($dbc->Insert("faq",$data)){
			$id = $dbc->GetID();
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$category = $dbc->GetRecord("faq","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"faq-add",$id,$category);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>