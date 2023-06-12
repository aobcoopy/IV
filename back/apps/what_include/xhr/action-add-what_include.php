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
			'name' => $_REQUEST['txName'],
			'cate' => $_REQUEST['cbbDestination'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id'],
		);
		
		if($dbc->Insert("what_include",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("what_include","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"what_include-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>