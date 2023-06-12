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
	
	$w_check = "name = '".trim($_REQUEST['tx_name'])."' and category ='".trim($_REQUEST['cbb_cate'])."'";
	$w_check .= " and unit = '".trim($_REQUEST['tx_unit'])."' and unit_type = '".trim($_REQUEST['tx_unit_type'])."'";
	$w_check .= " and price = '".trim($_REQUEST['tx_price'])."' ";

	if($dbc->HasRecord("spl_items",$w_check))
	{
		echo json_encode(array(
			'success'=>false,
			'msg' => "The product item name is already!"
		));
	}
	else
	{
		$data = array(
			'#id' => "DEFAULT",
			'name' => trim($_REQUEST['tx_name']),
			'unit' => trim($_REQUEST['tx_unit']),
			'unit_type' => trim($_REQUEST['tx_unit_type']),
			'price' => trim($_REQUEST['tx_price']),
			'#category' => trim($_REQUEST['cbb_cate']),
			'#created' => 'NOW()',
			'#status' => '1',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("spl_items",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> "Successful"
			));
			
			$banners = $dbc->GetRecord("spl_items","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"spl_items-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
		
	
	$dbc->Close();
?>