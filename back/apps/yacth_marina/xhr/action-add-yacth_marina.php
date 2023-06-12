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
	
	$slug = str_replace(" ","-",$_REQUEST['tx_link']);
	
	if($dbc->HasRecord("yacth_marina","slug = '".$_REQUEST['tx_link']."'"))
	{
		echo json_encode(array(
				'success'=>false,
				'msg' => "Marina name is already."
			));
	}
	else
	{
		$data = array(
			'#id' => "DEFAULT",
			'name' => trim($_REQUEST['txTitle']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'slug' => trim(strtolower($slug)),
			'destination' => $_REQUEST['cbb_des'],
			//'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("yacth_marina",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("yacth_marina","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"yacth_marina-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	$dbc->Close();
?>