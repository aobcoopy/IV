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
	
	// facility
	$fac = '';//array();
	/*if(isset($_REQUEST['chk_fac']))
	{
		foreach($_REQUEST['chk_fac'] as $faci)
		{
			array_push($fac,$faci);
		}
	}*/
	
	// feature
	$fea = array();
	if(isset($_REQUEST['chk_fea']))
	{
		foreach($_REQUEST['chk_fea'] as $feat)
		{
			array_push($fea,$feat);
		}
	}
	
	// bed
	$bed = array();
	if(isset($_REQUEST['chk_bed']))
	{
		foreach($_REQUEST['chk_bed'] as $bedr)
		{
			array_push($bed,$bedr);
		}
	}
	
	// appliances
	$app = array();
	if(isset($_REQUEST['chk_app']))
	{
		foreach($_REQUEST['chk_app'] as $appl)
		{
			array_push($app,$appl);
		}
	}
	
	// address map
	$add = array();
	if(isset($_REQUEST['chk_add']))
	{
		foreach($_REQUEST['chk_add'] as $addr)
		{
			array_push($add,$addr);
		}
	}
	
	// what include
	$what = array();
	if(isset($_REQUEST['chk_What']))
	{
		foreach($_REQUEST['chk_What'] as $wic)
		{
			array_push($what,$wic);
		}
	}
	
	
	
	$main = array();
	if(isset($_REQUEST['tx_main']))
	{
		foreach($_REQUEST['tx_main'] as $tx_main)
		{
			array_push($main,$tx_main);
		}
	}
	
	$transfer = array();
	if(isset($_REQUEST['tx_transfer']))
	{
		foreach($_REQUEST['tx_transfer'] as $tx_transfer_e)
		{
			array_push($transfer,$tx_transfer_e);
		}
	}
	
	$service = array();
	if(isset($_REQUEST['tx_service']))
	{
		foreach($_REQUEST['tx_service'] as $tx_service_e)
		{
			array_push($service,$tx_service_e);
		}
	}
	
	$Charge = array();
	if(isset($_REQUEST['tx_Charge']))
	{
		foreach($_REQUEST['tx_Charge'] as $tx_Charge_e)
		{
			array_push($Charge,$tx_Charge_e);
		}
	}
	
	$Special = array();
	if(isset($_REQUEST['tx_Special']))
	{
		foreach($_REQUEST['tx_Special'] as $tx_Special_e)
		{
			array_push($Special,$tx_Special_e);
		}
	}
	
	$available = array();
	if(isset($_REQUEST['tx_available']))
	{
		foreach($_REQUEST['tx_available'] as $tx_available_e)
		{
			array_push($available,$tx_available_e);
		}
	}
	
	$House = array();
	if(isset($_REQUEST['tx_House']))
	{
		foreach($_REQUEST['tx_House'] as $tx_House_e)
		{
			array_push($House,$tx_House_e);
		}
	}
	/*$phos = array(
		'img' => $_REQUEST['txt_photo'],
		'name' => $_REQUEST['txt_photo_name']
	);*/
	
	
		$data = array(
			'#id' => "DEFAULT",
			'name' => trim($_REQUEST['txName']),
			'brief' => base64_encode($_REQUEST['txBrief']),
			'short_det' => base64_encode($_REQUEST['txShort']),
			'detail' => base64_encode($_REQUEST['txDetail']),
			//'photo' => json_encode($phos),
			'facilities' => json_encode($fac),
			'features' => json_encode($fea),
			'appliances' => json_encode($app),
			'address_map' => json_encode($add),
			'latitude' => $_REQUEST['txLatitude'],
			'longtitude' => $_REQUEST['txLongtitude'],
			'price' => $_REQUEST['txPrice'],
			'file' => json_encode($_REQUEST['txpdf']),
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id'],
			//'#category' => $_REQUEST['cbbCate'],
			'destination' => $_REQUEST['cbbDestination'],
			'bedroom' => $_REQUEST['cbbBed'],
			'guest' => $_REQUEST['cbbGuest'],
			'#tag' => $_REQUEST['cbbTag'],
			'link' => $_REQUEST['txLink'],
			//'price_range' => $_REQUEST['txPrice_rang'],
			'bedfac' => json_encode($bed),
			'vdo' => base64_encode($_REQUEST['txvdo']),
			'#promotion' => $_REQUEST['cbbPro'],
			'actualbed' => $_REQUEST['tx_bedroom'],
			//'plan' => json_encode($_REQUEST['txplan']),
			'#subdestination' => isset($_REQUEST['cbbsubDestination'])?$_REQUEST['cbbsubDestination']:'0',
			//'what_ic' => json_encode($what),
			'pmin' => $_REQUEST['txPrice_min'],
			'pmax' => $_REQUEST['txPrice_max'],
			'adults' => $_REQUEST['tx_Adults'],
			'cate_icon' => $_REQUEST['cate_icon'],
			'bedroom_range' => $_REQUEST['tx_bedroom_range'],
			'bathroom' => $_REQUEST['tx_Bathroom'],
			'discount' => $_REQUEST['txDiscountPrice'],
			'tag_exp' => $_REQUEST['tx_tag_exp'],
			'wiic' => 1,
			'what_ic1' => json_encode($main),
			'what_ic2' => json_encode($transfer),
			'what_ic3' => json_encode($service),
			'what_ic4' => json_encode($Charge),
			'what_ic5' => json_encode($Special),
			'what_ic6' => json_encode($available),
			'what_ic7' => json_encode($House),
			'pmin_th' => $_REQUEST['txPrice_min_TH'],
			'pmax_th' => $_REQUEST['txPrice_max_TH'],
		);
		
		if($dbc->Insert("properties",$data)){
			$id = $dbc->GetID();
			
			if(isset($_REQUEST['catego']))
			{//$dbc->Delete("property_cate","property=".$id);
				foreach($_REQUEST['catego'] as $category)
				{
					//array_push($add,$addr);
					
					
					$data_cate = array(
						'#id' => 'DEFAULT',
						'#property' => $id,
						'#caategory' => $category,
						'#craeted' => 'NOW()',
						'#updated' => 'NOW()',
						'#status' => '0',
					);
					
					$dbc->Insert("property_cate",$data_cate);
					
				}
			}
			
			if(isset($_REQUEST['bedr']))
			{//$dbc->Delete("property_cate","property=".$id);
				foreach($_REQUEST['bedr'] as $bedr)
				{
					//array_push($add,$addr);
					
					
					$data_bedr = array(
						'#id' => 'DEFAULT',
						'#property' => $id,
						'#room' => $bedr,
						'#craeted' => 'NOW()',
						'#updated' => 'NOW()',
						'#status' => '0',
					);
					
					$dbc->Insert("property_room",$data_bedr);
					
				}
			}
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("properties","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>