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
	
	$val = array();
	foreach($_REQUEST['datas']['va'] as $da)
	{
		array_push($val,$da);
	}
	
	
	
	foreach($_REQUEST['datas']['stay'] as $stay_da)
	{
		/*echo $stay_da['ps_book_4']."<br>";
		echo $stay_da['ps_pay_4']."<br>";
		echo $stay_da['ps_applicetion_4']."<br>";
		echo $stay_da['ps_from_4_1']."<br>";
		echo $stay_da['ps_to_4_1']."<br>";
		echo $stay_da['ps_from_4_2']."<br>";
		echo $stay_da['ps_to_4_2']."<br>";*/
		
		$stay = array(
			'ps_book_4' => $stay_da['ps_book_4'],
			'ps_pay_4' => $stay_da['ps_pay_4'],
			'ps_applicetion_4' => $stay_da['ps_applicetion_4'],
			'ps_from_4_1' => $stay_da['ps_from_4_1'],
			'ps_to_4_1' => $stay_da['ps_to_4_1'],
			'ps_from_4_2' => $stay_da['ps_from_4_2'],
			'ps_to_4_2' => $stay_da['ps_to_4_2'],
			
			'ps_book_5' => $stay_da['ps_book_5'],
			'ps_pay_5' => $stay_da['ps_pay_5'],
			'ps_applicetion_5' => $stay_da['ps_applicetion_5'],
			'ps_from_5_1' => $stay_da['ps_from_5_1'],
			'ps_to_5_1' => $stay_da['ps_to_5_1'],
			'ps_from_5_2' => $stay_da['ps_from_5_2'],
			'ps_to_5_2' => $stay_da['ps_to_5_2'],
			
			'ps_book_6' => $stay_da['ps_book_6'],
			'ps_pay_6' => $stay_da['ps_pay_6'],
			'ps_applicetion_6' => $stay_da['ps_applicetion_6'],
			'ps_from_6_1' => $stay_da['ps_from_6_1'],
			'ps_to_6_1' => $stay_da['ps_to_6_1'],
			'ps_from_6_2' => $stay_da['ps_from_6_2'],
			'ps_to_6_2' => $stay_da['ps_to_6_2'],
			
			'ps_book_7' => $stay_da['ps_book_7'],
			'ps_pay_7' => $stay_da['ps_pay_7'],
			'ps_applicetion_7' => $stay_da['ps_applicetion_7'],
			'ps_from_7_1' => $stay_da['ps_from_7_1'],
			'ps_to_7_1' => $stay_da['ps_to_7_1'],
			'ps_from_7_2' => $stay_da['ps_from_7_2'],
			'ps_to_7_2' => $stay_da['ps_to_7_2'],
			
			'stay_10_1' => $stay_da['stay_10_1'],
			'stay_10_2' => $stay_da['stay_10_2'],
			'stay_10_3' => $stay_da['stay_10_3'],
			'stay_10_4' => $stay_da['stay_10_4'],
			
			'stay_11_1' => $stay_da['stay_11_1'],
			'stay_11_2' => $stay_da['stay_11_2'],
			'stay_11_3' => $stay_da['stay_11_3'],
			'stay_11_4' => $stay_da['stay_11_4'],
			'stay_11_5' => $stay_da['stay_11_5'],
			
			'stay_12_1' => $stay_da['stay_12_1'],
			'stay_12_2' => $stay_da['stay_12_2'],
			'stay_12_3' => $stay_da['stay_12_3'],
			'stay_12_4' => $stay_da['stay_12_4'],
			'stay_12_5' => $stay_da['stay_12_5'],
			
			'stay_13_1' => $stay_da['stay_13_1'],
			'stay_13_2' => $stay_da['stay_13_2'],
			'stay_13_3' => $stay_da['stay_13_3'],
			'stay_13_4' => $stay_da['stay_13_4'],
			'stay_13_5' => $stay_da['stay_13_5'],
		);
		
		//array_push($stay,$stay_da);
	}
	
	//$note = array();
	$new_note = 1;
	foreach($_REQUEST['datas']['notes'] as $notes)
	{
		//echo $notes['notes']."<br>";
		$note[] = array(
			'notes' => $notes['notes'],
			'exp' => $notes['note_exp']
		);
		//array_push($note,$notes['notes']);
	}
	
	
	$data = array(
		'#id' => "DEFAULT",
		//'header' => json_encode($header),
		'val' => base64_encode(json_encode($val)),
		'property' => $_REQUEST['datas']['txtID'],
		'#status' => '0',
		'#created' => 'NOW()',
		'#updated' => 'NOW()',
		'#users' => $_SESSION['auth']['user_id'],
		'tax' => $_REQUEST['datas']['txTax'],
		'deposite' => $_REQUEST['datas']['txDeposite'],
		'early_percent' => $_REQUEST['datas']['early_percent'],
		'early_day' => $_REQUEST['datas']['early_day'],
		'last_percent' => $_REQUEST['datas']['last_percent'],
		'last_date' => $_REQUEST['datas']['last_date'],
		
		'p_discount' => $_REQUEST['datas']['p_discount'],
		'p_night' => $_REQUEST['datas']['p_night'],
		'p_from' => $_REQUEST['datas']['p_from'],
		'p_to' => $_REQUEST['datas']['p_to'],
		
		'p_discount_1' => $_REQUEST['datas']['p_discount_1'],
		'p_night_1' => $_REQUEST['datas']['p_night_1'],
		'p_from_1' => $_REQUEST['datas']['p_from_1'],
		'p_to_1' => $_REQUEST['datas']['p_to_1'],
		
		'p_discount_2' => $_REQUEST['datas']['p_discount_2'],
		'p_night_2' => $_REQUEST['datas']['p_night_2'],
		'p_from_2' => $_REQUEST['datas']['p_from_2'],
		'p_to_2' => $_REQUEST['datas']['p_to_2'],
		
		'pr_discount' => $_REQUEST['datas']['pr_discount'],
		'pr_free' => $_REQUEST['datas']['pr_free'],
		'pr_from' => $_REQUEST['datas']['pr_from'],
		'pr_to' => $_REQUEST['datas']['pr_to'],
		
		'ps_book' => $_REQUEST['datas']['ps_book'],
		'ps_pay' => $_REQUEST['datas']['ps_pay'],
		'ps_applicetion' => $_REQUEST['datas']['ps_applicetion'],
		'ps_from' => $_REQUEST['datas']['ps_from'],
		'ps_to' => $_REQUEST['datas']['ps_to'],
		
		'psp_offer' => $_REQUEST['datas']['psp_offer'],
		'psp_fron' => $_REQUEST['datas']['psp_fron'],
		'psp_to' => $_REQUEST['datas']['psp_to'],
		'service' => json_encode(array(
			'deposit' => $_REQUEST['datas']['s_deposit'],
			'paid' => $_REQUEST['datas']['s_paid'],
			'deposit_2' => $_REQUEST['datas']['s_deposit_2'],
		)),
		'vat' => $_REQUEST['datas']['txVat'],
		'stay' => json_encode($stay),
		'note' => json_encode($note),
		
		'tax_1' => $_REQUEST['datas']['tax_1'],
		'tax_2' => $_REQUEST['datas']['tax_2'],
		'tax_3' => $_REQUEST['datas']['tax_3'],
		'tax_4' => $_REQUEST['datas']['tax_4'],
		'tax_5' => $_REQUEST['datas']['tax_5'],
		
		'pro_exp_1' => $_REQUEST['datas']['pro_exp_1'],
		'pro_exp_2' => $_REQUEST['datas']['pro_exp_2'],
		'pro_exp_3' => $_REQUEST['datas']['pro_exp_3'],
		'pro_exp_4' => $_REQUEST['datas']['pro_exp_4'],
		'pro_exp_5' => $_REQUEST['datas']['pro_exp_5'],
		'pro_exp_6' => $_REQUEST['datas']['pro_exp_6'],
		'pro_exp_7' => $_REQUEST['datas']['pro_exp_7'],
		'pro_exp_8' => $_REQUEST['datas']['pro_exp_8'],
		'pro_exp_9' => $_REQUEST['datas']['pro_exp_9'],
		'pro_exp_10' => $_REQUEST['datas']['pro_exp_10'],
		'pro_exp_11' => $_REQUEST['datas']['pro_exp_11'],
		'pro_exp_12' => $_REQUEST['datas']['pro_exp_12'],
		'pro_exp_13' => $_REQUEST['datas']['pro_exp_13'],
		'pro_exp_14' => $_REQUEST['datas']['pro_exp_14'],
		'pro_exp_15' => $_REQUEST['datas']['pro_exp_15'],
		'pro_exp_16' => $_REQUEST['datas']['pro_exp_16'],
		
		'pro_rm_1' => $_REQUEST['datas']['pro_rm_1'],
		'pro_rm_2' => $_REQUEST['datas']['pro_rm_2'],
		'pro_rm_3' => $_REQUEST['datas']['pro_rm_3'],
		'pro_rm_4' => $_REQUEST['datas']['pro_rm_4'],
		'pro_rm_5' => $_REQUEST['datas']['pro_rm_5'],
		'pro_rm_6' => $_REQUEST['datas']['pro_rm_6'],
		'pro_rm_7' => $_REQUEST['datas']['pro_rm_7'],
		'pro_rm_8' => $_REQUEST['datas']['pro_rm_8'],
		'pro_rm_9' => $_REQUEST['datas']['pro_rm_9'],
		'pro_rm_10' => $_REQUEST['datas']['pro_rm_10'],
		'pro_rm_11' => $_REQUEST['datas']['pro_rm_11'],
		'pro_rm_12' => $_REQUEST['datas']['pro_rm_12'],
		'pro_rm_13' => $_REQUEST['datas']['pro_rm_13'],
		'pro_rm_14' => $_REQUEST['datas']['pro_rm_14'],
		'pro_rm_15' => $_REQUEST['datas']['pro_rm_15'],
		'pro_rm_16' => $_REQUEST['datas']['pro_rm_16'],
		
		'exchange' => $_REQUEST['datas']['ra_exchange'],
		'auto_remove' => $_REQUEST['datas']['tx_auto_remove'],
		'new_note' => $new_note,
		
		'pr_discount_15' => $_REQUEST['datas']['pr_discount_15'],
		'pr_from_15' => $_REQUEST['datas']['pr_from_15'],
		'pr_to_15' => $_REQUEST['datas']['pr_to_15'],

		'pr_discount_16' => $_REQUEST['datas']['pr_discount_16'],
		'pr_from_16' => $_REQUEST['datas']['pr_from_16'],
		'pr_to_16' => $_REQUEST['datas']['pr_to_16'],

		'pr_to' => $_REQUEST['datas']['pr_to'],
		'#no_price' => $_REQUEST['datas']['no_price']
		
	);
	
	$idpri = $dbc->GetRecord("pricing","id","property=".$_REQUEST['datas']['txtID']);
	//echo $idpri['id'];
	
	if(!isset($_SESSION['auth']['user_id']) || $_SESSION['auth']['user_id']==NULL)
	{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Session Expire! Please login again."
		));
	}
	else
	{
		if($dbc->Insert("pricing",$data)){
			$id = $dbc->GetID();
			
			
			$dbc->Delete("pricing","id=".$idpri['id']);
			
			
			$data_dis = array(
				'#id' => "DEFAULT",
				'#property' => $_REQUEST['datas']['txtID'],
				'#created' => 'NOW()',
				'#updated' => 'NOW()',
				//'#users' => $_SESSION['auth']['user_id'],
				'early_1' => $_REQUEST['datas']['early_1'],
				'early_2' => $_REQUEST['datas']['early_2'],
				
				'last_1' => $_REQUEST['datas']['last_1'],
				'last_2' => $_REQUEST['datas']['last_2'],
				
				'long_1' => $_REQUEST['datas']['long_1'],
				'long_2' => $_REQUEST['datas']['long_2'],
				'long_3' => $_REQUEST['datas']['long_3'],
				'long_4' => $_REQUEST['datas']['long_4'],
				
				'dis_exp_1' => $_REQUEST['datas']['dis_exp_1'],
				'dis_exp_2' => $_REQUEST['datas']['dis_exp_2'],
				'dis_exp_3' => $_REQUEST['datas']['dis_exp_3'],
				'dis_exp_4' => $_REQUEST['datas']['dis_exp_4'],
				'dis_exp_5' => $_REQUEST['datas']['dis_exp_5'],
				'dis_exp_6' => $_REQUEST['datas']['dis_exp_6'],
				'dis_exp_7' => $_REQUEST['datas']['dis_exp_7'],
				'dis_exp_8' => $_REQUEST['datas']['dis_exp_8'],
				'dis_exp_9' => $_REQUEST['datas']['dis_exp_9'],
				
				'early_3' => $_REQUEST['datas']['early_3'],
				'early_date_3' => $_REQUEST['datas']['early_date_3'],
				'early_4' => $_REQUEST['datas']['early_4'],
				'early_date_4' => $_REQUEST['datas']['early_date_4'],
				'early_5' => $_REQUEST['datas']['early_5'],
				'early_date_5' => $_REQUEST['datas']['early_date_5'],
				
			);
			
			$dbc->Delete("discounts","property=".$_REQUEST['datas']['txtID']);
			$dbc->Insert("discounts",$data_dis);
			
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$data_price_table = array(
				'#price_table_status' => 0
			);
			$dbc->Update("properties",$data_price_table,"id = '".$_REQUEST['datas']['txtID']."'");
			
			if($_REQUEST['datas']['ra_exchange']=='thb')
			{
				$vai = $dbc->GetRecord("properties","*","id ='".$_REQUEST['datas']['txtID']."' ");
				
				if($vai['pmin_th']!=0 && $vai['pmax_th']!=0)
				{
					$data_price_empty = array(
						'#price_exchange' => 0
					);
				}
				else
				{
					$data_price_empty = array(
						'#price_exchange' => 1
					);
				}
				$dbc->Update("properties",$data_price_empty,"id = '".$_REQUEST['datas']['txtID']."'");
			}
			else
			{
				$data_price_empty = array(
					'#price_exchange' => 0
				);
				$dbc->Update("properties",$data_price_empty,"id = '".$_REQUEST['datas']['txtID']."'");
			}
			
			$banners = $dbc->GetRecord("properties","*","id=".$_REQUEST['datas']['txtID']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	}
	$dbc->Close();
?>