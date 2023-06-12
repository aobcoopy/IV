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
	
	$main = array();
	if(isset($_REQUEST['tx_main_e']))
	{
		foreach($_REQUEST['tx_main_e'] as $tx_main)
		{
			array_push($main,$tx_main);
		}
	}
	
	$transfer = array();
	if(isset($_REQUEST['tx_transfer_e']))
	{
		foreach($_REQUEST['tx_transfer_e'] as $tx_transfer_e)
		{
			array_push($transfer,$tx_transfer_e);
		}
	}
	
	$service = array();
	if(isset($_REQUEST['tx_service_e']))
	{
		foreach($_REQUEST['tx_service_e'] as $tx_service_e)
		{
			array_push($service,$tx_service_e);
		}
	}
	
	$Charge = array();
	if(isset($_REQUEST['tx_Charge_e']))
	{
		foreach($_REQUEST['tx_Charge_e'] as $tx_Charge_e)
		{
			array_push($Charge,$tx_Charge_e);
		}
	}
	
	$Special = array();
	if(isset($_REQUEST['tx_Special_e']))
	{
		foreach($_REQUEST['tx_Special_e'] as $tx_Special_e)
		{
			array_push($Special,$tx_Special_e);
		}
	}
	
	$available = array();
	if(isset($_REQUEST['tx_available_e']))
	{
		foreach($_REQUEST['tx_available_e'] as $tx_available_e)
		{
			array_push($available,$tx_available_e);
		}
	}
	
	$House = array();
	if(isset($_REQUEST['tx_House_e']))
	{
		foreach($_REQUEST['tx_House_e'] as $tx_House_e)
		{
			array_push($House,$tx_House_e);
		}
	}
	// facility
	$fac = '';//array();
	/*if(isset($_REQUEST['chk_fac_e']))
	{
		foreach($_REQUEST['chk_fac_e'] as $faci)
		{
			array_push($fac,$faci);
		}
	}*/
	
	// feature
	$fea = array();
	if(isset($_REQUEST['chk_fea_e']))
	{
		foreach($_REQUEST['chk_fea_e'] as $feat)
		{
			array_push($fea,$feat);
		}
	}
	
	// bed
	$bed = array();
	if(isset($_REQUEST['chk_bed_e']))
	{
		foreach($_REQUEST['chk_bed_e'] as $bedr)
		{
			array_push($bed,$bedr);
		}
	}
	
	// appliances
	$app = array();
	if(isset($_REQUEST['chk_app_e']))
	{
		foreach($_REQUEST['chk_app_e'] as $appl)
		{
			array_push($app,$appl);
		}
	}
	
	// address map
	$add = array();
	if(isset($_REQUEST['chk_add_e']))
	{
		foreach($_REQUEST['chk_add_e'] as $addr)
		{
			array_push($add,$addr);
		}
	}
	
	// what include
	$wic = array();
	if(isset($_REQUEST['chk_what_e']))
	{
		foreach($_REQUEST['chk_what_e'] as $what_ic)
		{
			array_push($wic,$what_ic);
		}
	}
	
	// cate
	
	/*$sql_cate = $dbc->Query("select * from property_cate where property='".$id."' ");
	while($row = $dbc->Fetch($sql_cate))
	{
		
	}*/
	
	//echo '>>>'.$_REQUEST['cate'];
	if(isset($_REQUEST['cate_e']))
	{$dbc->Delete("property_cate","property=".$id);
		foreach($_REQUEST['cate_e'] as $catego)
		{
			//array_push($add,$addr);
			$data_cate = array(
				'#id' => 'DEFAULT',
				'#property' => $id,
				'#caategory' => $catego,
				'#craeted' => 'NOW()',
				'#updated' => 'NOW()',
				'#status' => '0',
			);
			
			$dbc->Insert("property_cate",$data_cate);
			
		}
	}
	else
	{
		$dbc->Delete("property_cate","property=".$id);
	}
	
	if(isset($_REQUEST['bedr']))
	{$dbc->Delete("property_room","property=".$id);
		foreach($_REQUEST['bedr'] as $bedrooms)
		{
			//array_push($add,$addr);
			$data_bed = array(
				'#id' => 'DEFAULT',
				'#property' => $id,
				'#room' => $bedrooms,
				'#craeted' => 'NOW()',
				'#updated' => 'NOW()',
				'#status' => '0',
			);
			
			$dbc->Insert("property_room",$data_bed);
			
		}
	}
	
		
	/*$phos = array(
		'img' => $_REQUEST['txt_photo_e'],
		'name' => $_REQUEST['txt_photo_name_e']
	);*/
	
		$data = array(
			'name' => trim($_REQUEST['txName_e']),
			'brief' => base64_encode($_REQUEST['txBrief_e']),
			'short_det' => base64_encode($_REQUEST['txShort_e']),
			'detail' => base64_encode($_REQUEST['txDetail_e']),
			//'photo' => json_encode($phos),//$_REQUEST['txt_photo_e'] 
			'facilities' => json_encode($fac),
			'features' => json_encode($fea),
			'appliances' => json_encode($app),
			'address_map' => json_encode($add),
			'latitude' => $_REQUEST['txLatitude_e'],
			'longtitude' => $_REQUEST['txLongtitude_e'],
			'price' => $_REQUEST['txPrice_e'],
			'file' => json_encode($_REQUEST['txpdf_e']),
			'#updated' => 'NOW()',
			//'#status' => '0',
			'#users' => $_SESSION['auth']['user_id'],
			//'#category' => $_REQUEST['cbbCate_edit'],
			'destination' => $_REQUEST['cbbDestination'],
			//'bedroom' => $_REQUEST['cbbBed'],
			'guest' => $_REQUEST['cbbGuestE'],
			'#tag' => $_REQUEST['cbbTagE'],
			'link' => $_REQUEST['txLink_e'],
			//'price_range' => $_REQUEST['txPrice_rang_e'],
			'bedfac' => json_encode($bed),
			'vdo' => base64_encode($_REQUEST['txvdo_e']),
			'#promotion' => $_REQUEST['cbbProE'],
			'actualbed' => $_REQUEST['tx_bedroom_e'],
			//'plan' => json_encode($_REQUEST['txplan_e']),
			'#subdestination' => isset($_REQUEST['cbbsubDestination'])?$_REQUEST['cbbsubDestination']:'0',
			//'what_ic' => json_encode($wic),
			'pmin' => $_REQUEST['txPrice_min_e'],
			'pmax' => $_REQUEST['txPrice_max_e'],
			'adults' => $_REQUEST['tx_Adults_e'],
			'cate_icon' => $_REQUEST['cate_icon_e'],
			'bedroom_range' => $_REQUEST['tx_bedroom_range_e'],
			'bathroom' => $_REQUEST['tx_Bathroom_e'],
			'discount' => $_REQUEST['txDiscountPrice_e'],
			'tag_exp' => $_REQUEST['tx_tag_exp_e'],
			'wiic' => 1,
			'what_ic1' => json_encode($main),
			'what_ic2' => json_encode($transfer),
			'what_ic3' => json_encode($service),
			'what_ic4' => json_encode($Charge),
			'what_ic5' => json_encode($Special),
			'what_ic6' => json_encode($available),
			'what_ic7' => json_encode($House),
			'pmin_th' => $_REQUEST['txPrice_min_e_TH'],
			'pmax_th' => $_REQUEST['txPrice_max_e_TH'],
		);
		
		if($dbc->HasRecord("pricing","property ='".$id."' and exchange = 'thb'"))
		{
			if($_REQUEST['txPrice_min_e_TH']!=0 && $_REQUEST['txPrice_max_e_TH']!=0)
			{
				$data['price_exchange'] = 0;
			}
			else
			{
				$data['price_exchange'] = 1;
			}
		}
		
		if($dbc->Update("properties",$data,"id=".$id)){
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("properties","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>