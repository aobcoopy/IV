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
	
	function generatePhotoName($ext,$i,$temp)
	{
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 20);
		
		//$newfilename = round(microtime(true)) . '.' . end($temp);
		$temp_name = "yacht-0".$i."-".$_POST['txtyname'].'-'.$randomString.'.'.end($temp);//$randomString.$ext";
	
		if (file_exists("../../../../upload/yacht" . $temp_name)) {
			generatePhotoName($ext,$i);
		} else {
			return $temp_name;
		}
	}
	
	$update_status = 0;
	for($i=8;$i<=9;$i++)
	{
		if (isset($_FILES['butUploadPhoto_'.$i]) && !empty($_FILES['butUploadPhoto_'.$i]['name'])) 
		{
			$file_ext = pathinfo($_FILES['butUploadPhoto_'.$i]['name'], PATHINFO_EXTENSION);
			$temp = explode(".", $_FILES['butUploadPhoto_'.$i]["name"]);
			$new_file_name = generatePhotoName($file_ext,$i,$temp);
			$path = "../../../../upload/yacht/$new_file_name";
			$showcase_path = "upload/yacht/$new_file_name";
			if (move_uploaded_file($_FILES['butUploadPhoto_'.$i]['tmp_name'], $path)) {
				$data['img_'.$i] = json_encode($showcase_path);
				$update_status = 1;
				$dbc->Update("yacht",$data,"id=".$id);
			} else {
				//$data['about_us'] = 'NULL';
				$update_status = 0;
			}
		} else {
			$update_status = 1;
			//$data['about_us'] = 'NULL';
		}
	}
	
	
	/*$data = array(
		'img_1' => json_encode($showcase_path)
	);*/

	if($update_status==1){
		
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id,
			'update_status' => $update_status
		));
		
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Insert Error",
			'update_status' => $update_status
		));
	}
		
		
	
	$dbc->Close();
?>