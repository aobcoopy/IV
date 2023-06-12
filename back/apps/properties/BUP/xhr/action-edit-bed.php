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
	
	$arr = array();
	foreach($_REQUEST['val'] as $val)
	{
		$array = array(
			'title' => $val['title'],
			'detail' => $val['detail']
		);
		array_push($arr,$array);
	}
	
	
		$data = array(
			'bed' =>json_encode($arr),
			'#updated' => 'NOW()',
		);
		
		if($dbc->Update("properties",$data,"id=".$_REQUEST['txtID'])){
			$id = $_REQUEST['txtID'];
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("properties","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-add-bed",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>