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
	if(isset($_REQUEST['tx_prefer_e']))
	{
		foreach($_REQUEST['tx_prefer_e'] as $prefer)
		{
			array_push($arr_prefer,$prefer);
		}
	}
	
	$arr_prefer_time = array();
	if(isset($_REQUEST['tx_prefer_time_e']))
	{
		foreach($_REQUEST['tx_prefer_time_e'] as $prefer_time)
		{
			array_push($arr_prefer_time,$prefer_time);
		}
	}
	
	
	$id = $_REQUEST['txtID'];
		$data = array(
			'name' => trim($_REQUEST['txTitle_edit']),
			'description' => base64_encode($_REQUEST['txDescription']),
			'detail' => trim($_REQUEST['txDetail']),
			'price' => trim($_REQUEST['txPrice']),
			'bedroom_capacity' => trim($_REQUEST['txBedroom']),
			'maximum_capacity' => trim($_REQUEST['txGuest']),
			'destination' => trim($_REQUEST['cbb_destination_e']),
			'fleet' => trim($_REQUEST['cbb_fleet']),
			'sailing_route' => trim($_REQUEST['cbb_sr']),
			'highlight' => json_encode($arr_highlight),
			'hours' => trim($_REQUEST['txHours_e']),
			'no_type_of_yacht' => trim($_REQUEST['txNoTOY_e']),
			'tag' => trim($_REQUEST['txTag_e']),
			'prefer_program' => json_encode($arr_prefer),
			'prefer_time' => json_encode($arr_prefer_time),
			'#marina' => $_REQUEST['cbb_marina'],
			'type_of_charter' => $_REQUEST['tx_tochar'],
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		$datas_1 = $dbc->GetRecord("yacht","*","id=".$id);
		if($dbc->Update("yacht",$data,"id=".$id)){
			$datas = $dbc->GetRecord("yacht","*","id=".$id);
			
			if($_REQUEST['txTitle_edit']!=$datas_1['name'])
			{
				$Photo_name = str_replace(" ","_",$_REQUEST['txTitle_edit']);
				if($datas_1['photo']!='')
				{
					$photo_old_name = json_decode($datas['photo']);
					$ex = explode("/",$photo_old_name);
					
					$temp = explode(".", $photo_old_name);
					$photo_new_name = $ex[0].'/'.$ex[1].'/Yacht-'.trim($Photo_name).'.'.end($temp);
					
					rename("../../../../".$photo_old_name , "../../../../".$photo_new_name);
					
					$data = array('photo' => json_encode($photo_new_name));
					$dbc->Update("yacht",$data,"id=".$id);	
				}
				
				
				//----popup
				for($i=1;$i<=7;$i++)
				{
					$photo_old_name_pop = json_decode($datas['img_'.$i]);
					$ex = explode("/",$photo_old_name_pop);
					
					$temp = explode(".",$photo_old_name_pop);
					$photo_new_name_pop = $ex[0].'/'.$ex[1].'/Yacht-0'.$i.'-'.trim($Photo_name).'.'.end($temp);
					
					if($datas_1['img_'.$i]!='')
					{
						rename("../../../../".$photo_old_name_pop , "../../../../".$photo_new_name_pop);
						$data = array('img_'.$i => json_encode($photo_new_name_pop));
						$dbc->Update("yacht",$data,"id=".$id);
					}
				}
			}
			
			
			//echo $photo_old_name.'----'.$photo_new_name;
			
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			
			$os->save_log(0,$_SESSION['auth']['user_id'],"yacht-edit",$id,$datas);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>