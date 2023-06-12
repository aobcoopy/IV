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
	
	$i=0;
	foreach($_REQUEST['tables'] as $table)
	{
		$i++;
		$data = array(
			'#updated' => 'NOW()',
			'#sort' => $table['sort'],
			'#users' => $_SESSION['auth']['user_id']
		);
		
		/*$dbc->Update("properties",$data,"id=".$table['id']);
		$banners = $dbc->GetRecord("properties","*","id=".$table['id']);
		$os->save_log(0,$_SESSION['auth']['user_id'],"properties-sort",$table['id'],$banners);*/
			
		if($dbc->Update("properties",$data,"id='".$table['id']."'")){
			
			
			$banners = $dbc->GetRecord("properties","*","id=".$table['id']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-sort",$table['id'],$banners);
		}else{
			/*echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));*/
		}
	}
//echo '-------------'.$i;
	
		echo json_encode(array(
				'success'=>true
			));
	
	$dbc->Close();
?>