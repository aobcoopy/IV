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
    
    $slug = str_replace(" ", "", $_REQUEST['txSlug_edit']);
    
    $sql_countries = $dbc->Query("select slug from countries_available where id = '" . $_REQUEST['txCountry_edit'] . "'");
    list($country_slug) = $dbc->Fetch($sql_countries); 
    
    if($country_slug == $slug) die("The destination slug cannot be the same as the country slug. ERROR 231478");
       
	
	$id = $_REQUEST['txtID'];
		$data = array(
			'name' => $_REQUEST['txTitle_edit'],
            'slug' => $slug,
            'country' => $_REQUEST['txCountry_edit'],
			'#updated' => 'NOW()',
			'#status' => '0',
			'#users' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("destinations",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("destinations","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"destinations-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>