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
	$slug = str_replace(" ","-",$_REQUEST['txLinke_edit']);
	
		$data = array(
			'name' => $_REQUEST['txTitle_edit'],
			'#updated' => 'NOW()',
			'#status' => '0',
			'slug' => trim(strtolower($slug)),
			//'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("yacth_destination",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("yacth_destination","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"yacth_destination-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>