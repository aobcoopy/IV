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
	
	////check type file
//	$allowed =  array('gif','png','PNG','jpg');
//	$filename = $_FILES['file']['name'];
//	$ext = pathinfo($filename, PATHINFO_EXTENSION);
//	if(!in_array($ext,$allowed)) 
//	{
//		echo 'file is not supported';
//	}
//	else
//	{
//		$times = time(' H:i:s');
//		$format_photo_name ='Yacth';//($_GET['format_photo_name'] != '')?$_GET['format_photo_name']:'Yacth';
//		$image_name = $format_photo_name.$times.".jpg";
//        $upload_dir = "upload/cover";
//        
//        //$location = imageUpload($_FILES["file"]["tmp_name"], $image_name, $upload_dir); 
//       
//        
//	}
function generatePhotoName($ext)
{
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 20);
	$temp_name = "Yacth-Cover-Inspiringvilla-$randomString.$ext";//$randomString.$ext";

	if (file_exists("../../../../upload/yacht" . $temp_name)) {
		generatePhotoName($ext);
	} else {
		return $temp_name;
	}
}
	
	
	if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
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
		
		if($dbc->Update("yacth_cover",$data,"id=1")){
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