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
	
	
	
	$file = $dbc->Query("select * from property_icon where property=".$id);
	$i_array = array();
	while($ro = $dbc->Fetch($file))
	{
		array_push($i_array,$ro['icon']);
		//$dbc->Delete("property_icon","property=".$id);
	}
	
	/*echo '<pre>';
	print_r($i_array);
	echo '</pre>';*/
	
	$i_array_2 = array();
	if(isset($_REQUEST['chk_fea_ch']))
	{
		foreach($_REQUEST['chk_fea_ch'] as $feat_2)
		{
			array_push($i_array_2,$feat_2);
		}
	}
	
	/*echo '<pre>';
	print_r($i_array_2);
	echo '</pre>';*/
	
	foreach($i_array as $in_ar)
	{
		if(in_array($in_ar,$i_array_2))
		{
		}
		else
		{
			//echo '--noo-->'.$in_ar;
			$dbc->Delete("property_icon","property='".$id."' AND icon = '".$in_ar."' ");
		}
	}
	
	// facility
	$fac = array();
	if(isset($_REQUEST['chk_fac_ch']))
	{
		foreach($_REQUEST['chk_fac_ch'] as $faci)
		{
			//array_push($fac,$faci);
			if(in_array($feat,$i_array))
			{
			}
			else
			{
				if($dbc->HasRecord("property_icon","property='".$id."' AND icon = '".$faci."'"))
				{
					$dbc->Delete("property_icon","property=".$id);
				}
				else
				{
					$data = array(
						'#id' => 'DEFAULT',
						'property' => $_REQUEST['txtID'],
						'icon' => $faci,
						'#created' => 'NOW()',
						'#updated' => 'NOW()',
						'#status' => '1',
						'#users' => $_SESSION['auth']['user_id']
					);
					//$dbc->Insert("property_icon",$data);
				}
			}
		}
	}
	
	
	
	// feature
	if(isset($_REQUEST['chk_fea_ch']))
	{
		foreach($_REQUEST['chk_fea_ch'] as $feat)
		{
			if(in_array($feat,$i_array))
			{
			}
			else
			{
				$data = array(
					'#id' => 'DEFAULT',
					'property' => $_REQUEST['txtID'],
					'icon' => $feat,
					'#created' => 'NOW()',
					'#updated' => 'NOW()',
					'#status' => '1',
					'#users' => $_SESSION['auth']['user_id']
				);
				$dbc->Insert("property_icon",$data);
			}
		}
	}
	
	//echo '0000';
		/*$data = array(
			'name' => $_REQUEST['txName_e'],
			'brief' => $_REQUEST['txBrief_e'],
			'detail' => $_REQUEST['txDetail_e'],
			'photo' => json_encode($_REQUEST['txt_photo_e'] ),
			'facilities' => json_encode($fac),
			'features' => json_encode($fea),
			'appliances' => json_encode($app),
			'address_map' => json_encode($add),
			'latitude' => $_REQUEST['txLatitude_e'],
			'longtitude' => $_REQUEST['txLongtitude_e'],
			'price' => $_REQUEST['txPrice_e'],
			'file' => json_encode($_REQUEST['txpdf_e']),
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id'],
			'#category' => $_REQUEST['cbbCate_edit']
		);
		
		if($dbc->Update("property_icon",$data,"id=".$id)){
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
		}*/
	
	$dbc->Close();
?>