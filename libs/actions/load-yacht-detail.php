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
	$id = $_REQUEST['id'];
	
	$sql = $dbc->Query("select * from yacht where id = '".$id."' ");
	$data = $dbc->Fetch($sql);
	$name = str_replace(" ","_",$data['name']);
	$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $path .=$_SERVER["SERVER_NAME"];//.''. dirname($_SERVER["PHP_SELF"]).'/';
	$url_link = 'https://www.inspiringvillas.com';//$path;
	echo json_encode(
		array(
			'id' => $data['id'],
			'name' => $data['name'],
			'shortdescription' => $data['detail'],
			'descript' => base64_decode($data['description'],true),
			'price' => $data['price'],
			'photo_1' => json_decode($data['img_1']),
			'photo_2' => json_decode($data['img_2']),
			'photo_3' => json_decode($data['img_3']),
			'photo_4' => json_decode($data['img_4']),
			'photo_5' => json_decode($data['img_5']),
			'photo_6' => json_decode($data['img_6']),
			'photo_7' => json_decode($data['img_7']),
			'photo_8' => json_decode($data['img_8']),
			'photo_9' => json_decode($data['img_9']),
			'pricelist' => json_decode($data['pricelists']),
			'highlight' => json_decode($data['highlight']),
			'prefer_program' => json_decode($data['prefer_program']),
			'prefer_time' => json_decode($data['prefer_time']),
			'links' => $url_link.'/item-yacht-'.$data['id'].'-'.$name.'.html'
		)
	);
?>
