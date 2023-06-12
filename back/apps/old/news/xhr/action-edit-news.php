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
	
	$img = array();
	foreach($_REQUEST['t_photo'] as $photo)
	{
		array_push($img,$photo);
	}
	
		$data = array(
			'name' => $_REQUEST['txtName_edit'],
			'title' => $_REQUEST['txtTitle_edit'],
			'brief' => $_REQUEST['txtBrief_edit'],
			'detail' => $_REQUEST['txtDetail_edit'],
			'photo' => json_encode($_REQUEST['parth_edit']),
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id'],
			'images' => json_encode($img)
		);
		
		if($dbc->Update("news",$data,"id=".$id)){
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$news = $dbc->GetRecord("news","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"news-edit",$id,$news);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>