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
	
	
	if($dbc->HasRecord("icons","catgory = '4' and name = '".$_REQUEST['txTitle']."'"))
	{
		echo json_encode(array(
				'success'=>false,
				'msg' => "Name is already"
			));
	}
	else
	{
		$data = array(
			'#id' => "DEFAULT",
			//'icon' => json_encode($_REQUEST['txt_photo'] ),
			'name' => $_REQUEST['txTitle'],
			'la' => $_REQUEST['tx_la'],
			'ln' => $_REQUEST['tx_ln'],
			'iconmap' => $_REQUEST['tx_icon'],
			'catgory' => 4,
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("icons",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("icons","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"icons-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	$dbc->Close();
?>