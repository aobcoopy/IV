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
	
	$save_dir = "../../../../upload/category/";
	if(!file_exists($save_dir))
	{
		mkdir($save_dir);
	}
	
	//check type file
	$allowed =  array('gif','png','PNG','jpg');
	$filename = $_FILES['file']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed)) 
	{
		echo 'file is not supported';
	}
	else
	{
		$times = time(' H:i:s');
		
		//$image_name = 'photo_'.$times.".jpg";
		//$save_path = "$save_dir/$picName" ;
		$format_photo_name =($_GET['format_photo_name'] != '')?$_GET['format_photo_name']:'photo';
		$image_name = $format_photo_name.$times.".jpg";
        $upload_dir = "upload/category";
        
        $location = imageUpload($_FILES["file"]["tmp_name"], $image_name, $upload_dir); 
       
        echo json_encode(array(
            'success'=>true,
            'path' => $location
        ));            
	}
		
?>