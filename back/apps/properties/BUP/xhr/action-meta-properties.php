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
	
	if($dbc->HasRecord("metatag","property=".$id))
	{
		//echo '-----old';
		$data = array(
			'title' => $_REQUEST['tx_h1'],
			'description' => base64_encode($_REQUEST['tx_Descript']),
			'#updated' => 'NOW()',
			'#status' => '0',
		);
		
		
		
		$banners = $dbc->GetRecord("metatag","*","property=".$id);
		
			$data_link = array(
				'ht_link' => str_replace(" ", "", $_REQUEST['tx_Link'])
			);
			
			$dbc->Update("properties",$data_link,"id=".$id);
			
		$os->save_log(0,$_SESSION['auth']['user_id'],"metatag-add",$id,$banners);
		
		if($dbc->Update("metatag",$data,"property=".$id)){
			$ids = $dbc->GetID();
			
			
			
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
	}
	else
	{
		//echo '--------------------new';
		$data = array(
			'#id' => "DEFAULT",
			'title' => $_REQUEST['tx_h1'],
			'description' => base64_encode($_REQUEST['tx_Descript']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#property'=> $id
		);
		
		
		
		$banners = $dbc->GetRecord("metatag","*","property=".$id);
		$os->save_log(0,$_SESSION['auth']['user_id'],"metatag-add",$id,$banners);
		
		if($dbc->Insert("metatag",$data)){
			$ids = $dbc->GetID();
			
			$data_link = array(
				'ht_link' => str_replace(" ", "", $_REQUEST['tx_Link'])
			);
			
			$dbc->Update("properties",$data_link,"id=".$id);
		
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
	}
		
		
		
	
	$dbc->Close();
?>