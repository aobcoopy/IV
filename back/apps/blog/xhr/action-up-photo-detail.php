<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
    include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
		
	//// check file type
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
//		//$image_name = 'photo_'.$times.".jpg";
//		$format_photo_name =($_GET['format_photo_name'] != '')?$_GET['format_photo_name']:'photo';
//		$image_name = $format_photo_name.$times.".jpg";
//        $upload_dir = "upload/blog";
//        
//        $location = imageUpload($_FILES["file"]["tmp_name"], $image_name, $upload_dir); 
//       
//        echo json_encode(array(
//            'success'=>true,
//            'path' => $location
//        ));
//
//	}
//echo $_FILES['file_detail']['name'];
		$save_dir = "../../../../upload/blog/";
		//check type file
		$allowed =  array('gif','png','PNG','jpg','JPG','jpeg','JPEG');
		$filename = $_FILES['file_detail']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed)) 
		{
			echo 'file is not supported';
		}
		else
		{
			$times = time(' H:i:s');
			//$picName = date('Y-m-d').$times.".jpg";
			//$picName = 'photo_'.$times.".jpg";
			
			$temp = explode(".", $_FILES["file_detail"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
	
			$new_images = "Blog_".$newfilename;
		
			$save_path = "$save_dir/$new_images";
			if(move_uploaded_file($_FILES["file_detail"]["tmp_name"],$save_dir.'/'.$new_images))
			{
				$save_dir = "/upload/blog";
				$location = $save_dir.'/'.$new_images;
				//echo $location;
				echo json_encode(array(
					'success'=>true,
					'path' => $location
				));
			}
			
		}
		
?>