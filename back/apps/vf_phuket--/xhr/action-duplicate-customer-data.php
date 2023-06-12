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
	
	$id = $_REQUEST['id'];
	$old_data = $dbc->GetRecord("villa_form_mapping","*","id='".$id."'");
	
	$data_1 = array("#status"=>1,'#user' => $_SESSION['auth']['user_id']);
	$dbc->Update("villa_form_mapping",$data_1,"id='".$id."'");
	
	if(strrchr($old_data['invoice'],"RE"))
	{
		$ex = explode("RE",$old_data['invoice']);
		$renew1 = $ex[1]+1;
		$renew = $ex[0].'RE'.$renew1;
		//echo $renew.'++++'.$ex[0].'+++'.$ex[1];
	}
	else
	{
		$renew = $old_data['invoice'].'RE'.+1;
		//echo $renew.'------';
	}
	
	
	$data = array(
		'#id' => "DEFAULT",
		'#villaform_id' => $old_data['villaform_id'],
		'#villa' => $old_data['villa'],
		'cus_name' => $old_data['cus_name'],
		'invoice' => $renew,
		'links' => $renew,
		'#created' => 'NOW()',
		'#status' => 0,
		'#user' => $_SESSION['auth']['user_id']
	);
	
	
	$dbc->Insert("villa_form_mapping",$data);
	$last_id = $dbc->GetID();
	echo json_encode(array('status' => true,'vid' => $old_data['villa'],'id' => $last_id));
	
	$dbc->Close();
?>