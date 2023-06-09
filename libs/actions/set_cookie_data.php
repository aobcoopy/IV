<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	
	function isMobileDevice() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
	|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
	, $_SERVER["HTTP_USER_AGENT"]);
	}
	
	$device = '';
	if(isMobileDevice()){
		$device = "Mobile";
	}
	else {
		$device = "Mobile_Browser_Not_Detected";
	}
	
	
	function get_client_ip() 
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	//echo get_client_ip();


	//setcookie("iv_svurl", "", time()-3600);
	$cookie_time = time() + (86400 * 30);
	//$cookie_time = time() - 3600;
	$cookie_name = ['iv_usdv','iv_usip','iv_usurl','iv_svip','iv_usssid','iv_usmb'];//"";
	$cookie_value = [
		$_SERVER['HTTP_USER_AGENT'],
		$_SERVER['REMOTE_ADDR'],
		$_REQUEST['actual_link'],
		$_SERVER['SERVER_ADDR'],
		session_id(),
		$device
	];//"Alex Porter";
	
	for($xx=0;$xx<=count($cookie_name);$xx++)
	{
		setcookie($cookie_name[$xx], $cookie_value[$xx],$cookie_time , "/");
		//setcookie($cookie_name[$xx], '',$cookie_time , "/");
	}
	
	$arr_cookie = array(
		'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
		'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'],
		'actual_link' => $_REQUEST['actual_link'],
		'SERVER_ADDR' => $_SERVER['SERVER_ADDR'],
		'session_id' => session_id(),
		'device' => $device,
		'get_client_ip' => get_client_ip()
	);
	
	$data = array(
		'#id' => "DEFAULT",
		'ipadd' => $_SERVER['REMOTE_ADDR'].'-'.get_client_ip(),
		'data' => json_encode($arr_cookie),
		'#created' => 'NOW()',
		'link' => $_REQUEST['actual_link']
	);
	
	$dbc->Insert("cookies",$data);
	
	echo json_encode(
		array(
			'status' => true,
			'msg' => 'Successful'
		)
	);
	$dbc->Close();	
?>
