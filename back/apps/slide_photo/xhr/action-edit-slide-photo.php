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
			'title' => $_REQUEST['txTitle_edit'],
			'brief' => $_REQUEST['txBrief_edit'],
			'photo' => json_encode($_REQUEST['txt_photo_edit'] ),
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("slide_photo",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("slide_photo","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"slide_photo-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>