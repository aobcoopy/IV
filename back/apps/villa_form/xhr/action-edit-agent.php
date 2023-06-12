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
			'name' => $_REQUEST['txName'],
			'website' => $_REQUEST['txWebsite'],
			'contact_person' => $_REQUEST['txContact_Person'],
			'phone' => $_REQUEST['txPhone_Number'],
			'whatsapp' => $_REQUEST['txWhatsapp'],
			'line' => $_REQUEST['txLine'],
			'wechat' => $_REQUEST['txWeChat'],
			'billing' => $_REQUEST['txBilling'],
			'reservation' => $_REQUEST['txReservation'],
			'commission' => $_REQUEST['txCommission'],
			'tax' => $_REQUEST['txTaxes'],
			'payment_term' => $_REQUEST['txPayment'],
			'bank' => base64_encode($_REQUEST['tx_Bank']),
			'#updated' => 'NOW()',
			'#status' => '0',
			'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("agent",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("agent","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"agent-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>