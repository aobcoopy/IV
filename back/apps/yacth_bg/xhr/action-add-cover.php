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
	
	
	if($dbc->HasRecord("cover","page = '".$_REQUEST['txTitle']."'"))
	{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Image is already"
		));
	}
	else
	{
		$data = array(
			'#id' => "DEFAULT",
			'photo' => json_encode($_REQUEST['txt_photo']),
			'page' => trim($_REQUEST['txTitle']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("cover",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("cover","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"cover-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	$dbc->Close();
?>