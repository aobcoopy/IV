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
	
	if($dbc->HasRecord("news","name = '".$_REQUEST['txtName']."'")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'News and Promotions Name is already exist.'
		));
	}else{

		$data = array(
			'#id' => "DEFAULT",
			'name' => $_REQUEST['txtName'],
			'title' => $_REQUEST['txtTitle'],
			'brief' => $_REQUEST['txtBrief'],
			'detail' => $_REQUEST['txtDetail'],
			'photo' => json_encode($_REQUEST['parth']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("news",$data)){
			$id = $dbc->GetID();
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$news = $dbc->GetRecord("news","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"news-add",$id,$news);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>