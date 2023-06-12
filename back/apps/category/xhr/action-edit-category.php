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
		$data = array(
			'name' => $_REQUEST['txTitle_edit'],
            'brief' => $_REQUEST['txBrief_edit'],
            'filter_box' => $_REQUEST['txFilter_edit'],
			'slug' => $_REQUEST['txSlug_edit'],
			'detail' => base64_encode($_REQUEST['txDetail_edit']),
			'inside' => base64_encode($_REQUEST['txInside_edit']),
			'photo' => json_encode($_REQUEST['txt_photo_edit'] ),
			'cover' => json_encode($_REQUEST['txt_coverphoto_edit'] ),
			'meta_title' => $_REQUEST['txTitlee'],
			'meta_h1' => $_REQUEST['txH1e'],
			'meta_h2' => $_REQUEST['txH2e'],
			'meta_des' => $_REQUEST['txDescripte'],
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("categories",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("categories","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"categories-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>