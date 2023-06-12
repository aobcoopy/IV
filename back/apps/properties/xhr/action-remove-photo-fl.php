<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$data = array(
		'#id' => 'DEFAULT',
		'#property' => $_REQUEST['txtID'],
		'photo' => $_REQUEST['tx_floor2'],
		'#created' => 'NOW()',
		'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Insert("photo_del",$data))
	{
		$data2 = array(
			'#updated' => 'NOW()',
			'plan' => json_encode($_REQUEST['tx_floor2'])
		);
		
		$dbc->Update("properties",$data2,"id=".$_REQUEST['txtID']);
		
		if(unlink($_POST['tx_floor2']))
		{
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'ดำเนินการเรียบร้อย'
				)
			);
		}
		else
		{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'ไม่สามารถลบไฟล์ได้ กรุณาลองใหม่อีกครั้ง'
				)
			);
	
		}
	}
	else
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'ไม่สามารถลบไฟล์ได้ กรุณาลองใหม่อีกครั้ง'
			)
		);

	}
	
	
	
?>

<?php
	
	$dbc->Close();
?>