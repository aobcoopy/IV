<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$img = str_replace("img_","",$_REQUEST['img']);//img_photo_sq
	$data = array(
		$img => NULL
	);
	//echo $img;
	$path = $_REQUEST['path'];
	if(deleteFile($path))//unlink(''.$_REQUEST['path'])
	{
		
		$dbc->Update("blogs",$data,"id = '".$_REQUEST['id']."'");
		echo json_encode(
			array(
				'status' => true,
				'msg' => 'ดำเนินการเรียบร้อย'
			)
		);
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'ไม่สามารถลบไฟล์ได้ กรุณาลองใหม่อีกครั้ง'
			)
		);

	}
	
	
	
	$dbc->Close();
?>