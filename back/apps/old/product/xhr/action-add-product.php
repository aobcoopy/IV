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
	
	if($dbc->HasRecord("products","name = '".$_REQUEST['txtName']."' and category = '".$_REQUEST['category']."'")){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'Product Name is already exist.'
		));
	}else{

		$data = array(
			'#id' => "DEFAULT",
			'name' => $_REQUEST['txtName'],
			'price' => isset($_REQUEST['txtPrice'])?$_REQUEST['txtPrice']:'NULL',
			'discount' => isset($_REQUEST['txtDiscount'])?$_REQUEST['txtDiscount']:'NULL',
			'amount' => isset($_REQUEST['txtAmount'])?$_REQUEST['txtAmount']:'NULL',
			'#category' => isset($_REQUEST['category'])?$_REQUEST['category']:'NULL',
			'#subcategory' => isset($_REQUEST['subcategory'])?$_REQUEST['subcategory']:'NULL',
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#tag' => isset($_REQUEST['Tag'])?$_REQUEST['Tag']:'NULL',
			'photo' => json_encode($_REQUEST['parth']),
			'#user' => $_SESSION['auth']['user_id'],
			'code' => $_REQUEST['txtCode']
		);
		
		if($dbc->Insert("products",$data)){
			$id = $dbc->GetID();
			
				$data_detail = array(
					'#id' => "DEFAULT",
					'brief' => $_REQUEST['txtBrief'],
					'detail' => $_REQUEST['txtDetail'],
					'#created' => 'NOW()',
					'#updated' => 'NOW()',
					'#product' => $id
				);
				$dbc->Insert("product_derail",$data_detail);
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$product = $dbc->GetRecord("products","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"products-add",$id,$product);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	
	$dbc->Close();
?>