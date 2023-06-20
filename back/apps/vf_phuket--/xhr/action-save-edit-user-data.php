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
		'cus_name' => $_REQUEST['txCustomer_ed'],
		'invoice' => $_REQUEST['txInvoice_ed'],
		'links' => $_REQUEST['txLink_ed'],
		'#user' => $_SESSION['auth']['user_id']
	);
	
	//if($dbc->HasRecord("villa_form_mapping","invoice ='".$_REQUEST['txInvoice_ed']."'"))
	$c = $dbc->GetCount("villa_form_mapping","invoice ='".$_REQUEST['txInvoice_ed']."'");
	//echo $c;
	if($c>1)
	{
		echo json_encode(array('status' => false,'msg' => 'Please check invoice number'));
	}
	else
	{
		
		$dbc->Update("villa_form_mapping",$data,"id = '".$id."'");
		echo json_encode(array('status' => true,'vid' => $_REQUEST['txtVillaID'],'id' => $id));
	}
	
	
	$dbc->Close();
?>