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
			'name' => trim($_REQUEST['tx_name_edit']),
			'unit' => trim($_REQUEST['tx_unit_edit']),
			'unit_type' => trim($_REQUEST['tx_unit_type_edit']),
			'price' => trim($_REQUEST['tx_price_edit']),
			'#category' => trim($_REQUEST['cbb_cate_edit']),
			'#created' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("spl_items",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("spl_items","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"spl_items-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>