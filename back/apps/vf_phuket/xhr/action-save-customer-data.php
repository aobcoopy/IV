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
	
	$data = array(
		'#id' => "DEFAULT",
		'#villaform_id' => $id,
		'#villa' => $_REQUEST['txtVillaID'],
		'cus_name' => $_REQUEST['txCustomer'],
		'invoice' => $_REQUEST['txInvoice'],
		'links' => $_REQUEST['txLink'],
		'#created' => 'NOW()',
		'#status' => 0,
		'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->HasRecord("villa_form_mapping","invoice ='".$_REQUEST['txInvoice']."'"))
	{
		echo json_encode(array('status' => false,'msg' => 'Please check invoice number'));
	}
	else
	{
		
		$dbc->Insert("villa_form_mapping",$data);
		echo json_encode(array('status' => true,'vid' => $_REQUEST['txtVillaID'],'id' => $id));
	}
	
	
	$dbc->Close();
?>