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
	
	$slug = str_replace(" ","-",$_REQUEST['txLink']);

		$data = array(
			'#id' => "DEFAULT",
			'name' => trim($_REQUEST['txTitle']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'slug' => trim(strtolower($slug)),
			//'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("yacth_sailing_route",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("yacth_sailing_route","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"yacth_sailing_route-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>