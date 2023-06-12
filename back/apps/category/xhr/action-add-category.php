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
            'brief' => $_REQUEST['txBrief'],
            'slug' => $_REQUEST['txSlug'],
			'filter_box' => $_REQUEST['txFilter'],
			'detail' => base64_encode($_REQUEST['txDetail']),
			'inside' => base64_encode($_REQUEST['txInside']),
			'photo' => json_encode($_REQUEST['txt_photo'] ),
			'cover' => json_encode($_REQUEST['txt_photo_cover'] ),
			//'meta_title' => trim($_REQUEST['txTitle']), edit by parinyimz2019-08-14
			'meta_title' => trim($_REQUEST['meta_title']),
			'meta_h1' => $_REQUEST['txH1'],
			'meta_h2' => $_REQUEST['txH2'],
			'meta_des' => $_REQUEST['txDescript'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("categories",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("categories","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"categories-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>