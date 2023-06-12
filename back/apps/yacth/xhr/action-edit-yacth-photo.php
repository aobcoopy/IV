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
	
	function generatePhotoName($ext)
	{
		$Photo_namw = str_replace(" ","_",$_POST['txtyname']);
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 20);
		$temp_name = "yacht-".$Photo_namw."-$randomString.$ext";//$randomString.$ext";
	
		if (file_exists("../../../../upload/yacht" . $temp_name)) {
			generatePhotoName($ext);
		} else {
			return $temp_name;
		}
	}
	
	
	if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) 
	{
		$file_ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		$new_file_name = generatePhotoName($file_ext);
		$path = "../../../../upload/yacht/$new_file_name";
		$showcase_path = "upload/yacht/$new_file_name";
		if (move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
			$data['photo'] = $showcase_path;
		} else {
			//$data['about_us'] = 'NULL';
		}
	} else {
		//$data['about_us'] = 'NULL';
	}
	
	$data = array(
		'photo' => json_encode($showcase_path)
	);

	if($dbc->Update("yacht",$data,"id=".$id)){
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
		
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Insert Error"
		));
	}
		
		
	
	$dbc->Close();
?>