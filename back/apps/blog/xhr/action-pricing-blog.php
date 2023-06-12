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
	
	$val = array();
	foreach($_REQUEST['datas']['va'] as $da)
	{
		array_push($val,$da);
	}
	
	
	$data = array(
		'#id' => "DEFAULT",
		//'header' => json_encode($header),
		'val' => json_encode($val),
		'property' => $_REQUEST['datas']['txtID'],
		'#status' => '0',
		'#created' => 'NOW()',
		'#updated' => 'NOW()',
		'#users' => $_SESSION['auth']['user_id']
	);
			
		if($dbc->Insert("pricing",$data)){
			$id = $dbc->GetID();
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("properties","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>