<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	//echo 'hello world';
	
		$save_dir = "../../../../upload/product/";
		if(!file_exists($save_dir))
		{
			mkdir($save_dir);
		}
		
		//check type file
		$allowed =  array('gif','png','PNG','jpg');
		$filename = $_FILES['upfile']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed)) 
		{
			echo 'file is not supported';
		}
		else
		{
			$times = time(' H:i:s');
			//$picName = date('Y-m-d').$times.".jpg";
			$picName = 'photo_'.$times.".jpg";
			$save_path = "$save_dir/$picName" ;
			if(move_uploaded_file($_FILES["upfile"]["tmp_name"],$save_dir.'/'.$picName))
			{
				$save_dir = "/upload/product/";
				$location = $save_dir.'/'.$picName;
				echo $location;
				
			}
		}
		
		
		
?>