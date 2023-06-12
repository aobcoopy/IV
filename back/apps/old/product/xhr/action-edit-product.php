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
			'name' => $_REQUEST['txtName_edit'],
			'#price' => isset($_REQUEST['txtPrice_edit'])?$_REQUEST['txtPrice_edit']:'NULL',
			'#discount' => isset($_REQUEST['txtDiscount_edit'])?$_REQUEST['txtDiscount_edit']:'NULL',
			'#amount' => isset($_REQUEST['txtAmount_edit'])?$_REQUEST['txtAmount_edit']:'NULL',
			'#category' => isset($_REQUEST['category_edit'])?$_REQUEST['category_edit']:'NULL',
			'#subcategory' => isset($_REQUEST['subcategory_edit'])?$_REQUEST['subcategory_edit']:'NULL',
			'#updated' => 'NOW()',
			'#status' => '1',
			'#tag' => isset($_REQUEST['Tag_edit'])?$_REQUEST['Tag_edit']:'NULL',
			'photo' => json_encode($_REQUEST['parth_edit']),
			'#user' => $_SESSION['auth']['user_id'],
			'code' => $_REQUEST['txtCode_edit']
		);
		
		if($dbc->Update("products",$data,"id=".$id)){
			
				$data_detail = array(
					'brief' => $_REQUEST['txtBrief_edit'],
					'detail' => $_REQUEST['txtDetail_edit'],
					'#updated' => 'NOW()',
				);
				$dbc->Update("product_derail",$data_detail,"product=".$id);
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$product = $dbc->GetRecord("products","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"products-edit",$id,$product);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>