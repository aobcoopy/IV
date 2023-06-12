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
	
	$arr_highlight = array();
	if(isset($_REQUEST['txhighlight_edit']))
	{
		foreach($_REQUEST['txhighlight_edit'] as $highlight)
		{
			array_push($arr_highlight,$highlight);
		}
	}
	
	$arr_prefer = array();
	if(isset($_REQUEST['tx_prefer']))
	{
		foreach($_REQUEST['tx_prefer'] as $prefer)
		{
			array_push($arr_prefer,$prefer);
		}
	}
	
	$arr_prefer_time = array();
	if(isset($_REQUEST['tx_prefer_time']))
	{
		foreach($_REQUEST['tx_prefer_time'] as $prefer_time)
		{
			array_push($arr_prefer_time,$prefer_time);
		}
	}

		$data = array(
			'#id' => "DEFAULT",
			'name' => trim($_REQUEST['txTitle']),
			'description' => base64_encode($_REQUEST['txDescription']),
			'detail' => trim($_REQUEST['txDetail']),
			'price' => trim($_REQUEST['txPrice']),
			'bedroom_capacity' => trim($_REQUEST['txBedroom']),
			'maximum_capacity' => trim($_REQUEST['txGuest']),
			'destination' => trim($_REQUEST['cbb_destination']),
			'fleet' => trim($_REQUEST['cbb_fleet']),
			'sailing_route' => trim($_REQUEST['cbb_sr']),
			'highlight' => json_encode($arr_highlight),
			'hours' => trim($_REQUEST['txHours']),
			'no_type_of_yacht' => trim($_REQUEST['txNoTOY']),
			'tag' => trim($_REQUEST['txTag']),
			'prefer_program' => json_encode($arr_prefer),
			'prefer_time' => json_encode($arr_prefer_time),
			'#marina' => $_REQUEST['cbb_marina_1'],
			'type_of_charter' => $_REQUEST['tx_tochar_1'],
			'#created' => 'NOW()',
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Insert("yacht",$data)){
			$id = $dbc->GetID();
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("yacht","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"yacht-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>