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
	
	
	foreach($_REQUEST['tables'] as $table)
	{
		$data = array(
			'#updated' => 'NOW()',
			'#sort' => $table['sort'],
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("blog_category",$data,"id=".$table['id'])){
			
			
			$banners = $dbc->GetRecord("blog_category","*","id=".$table['id']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"blog_category-sort",$table['id'],$banners);
		}else{
			/*echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));*/
		}
	}
	
		echo json_encode(array(
				'success'=>true
			));
	
	$dbc->Close();
?>