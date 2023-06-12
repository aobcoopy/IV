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
	
	
        
		$data = array(
			'#id' => "DEFAULT",
			'title' => trim($_REQUEST['txTitle']),
			'brief' => trim($_REQUEST['txBrief']),
			'photo' => json_encode($_REQUEST['txt_photo'] ),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("slide_photo",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("slide_photo","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"slide_photo-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>