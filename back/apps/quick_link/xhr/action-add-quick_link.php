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
	
	
	if($dbc->HasRecord("quick_link_text","link = '".$_REQUEST['txUrl']."' "))
	{
		echo json_encode(array(
			'success'=>false,
			'msg' => "The LINK is already."
		));
	}
	else
	{
		$data = array(
			'#id' => "DEFAULT",
            'link' => $_REQUEST['txUrl'],
            'text' => base64_encode($_REQUEST['txText']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("quick_link_text",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("quick_link_text","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"quick_link_text-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	$dbc->Close();
?>