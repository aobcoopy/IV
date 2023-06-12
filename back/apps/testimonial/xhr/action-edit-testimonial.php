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

	/*$add = array();
	if(isset($_REQUEST['chk_add_e']))
	{
		foreach($_REQUEST['chk_add_e'] as $addr)
		{
			array_push($add,$addr);
		}
	}
	*/
		$data = array(
			'name' => $_REQUEST['txName_e'],
			//'brief' => base64_encode($_REQUEST['txBrief_e']),
			'detail' => base64_encode($_REQUEST['txDetail_e']),
			//'photo' => json_encode($_REQUEST['txt_photo_e']),
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("testimonial",$data,"id=".$id)){
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("testimonial","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"testimonial-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>