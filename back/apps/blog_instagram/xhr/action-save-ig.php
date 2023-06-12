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
	$array = array();
	
	for($i=1;$i<=6;$i++)
	{
		if($_REQUEST['tx_ig_'.$i]!=''){array_push($array,$_REQUEST['tx_ig_'.$i]);}
	}
	
	
	$data = array(
		'photo' => json_encode($array),
		'#updated' => 'NOW()'
	);
	
	if($dbc->Update("blog_ig_photo",$data,"id=".$id)){
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
		
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Insert Error"
		));
	}
	
	$dbc->Close();
?>