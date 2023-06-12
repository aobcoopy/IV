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
			'name' => trim($_REQUEST['txTitle']),
			'igroup' => $_REQUEST['selGroup'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			//'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("icon_group",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("icon_group","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"icon_group-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>