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
	
	$blog_name = str_replace(" ","-",$_REQUEST['txtName']);
	$id = $_REQUEST['txtID'];
	
	function generatePhotoName($ext,$i,$temp,$blog_name)
	{
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 20);
		
		//$newfilename = round(microtime(true)) . '.' . end($temp);
		$times = time();
		$temp_name = $blog_name.'-'.$i.'-'.$times.'.'.end($temp);
		//$temp_name = "blog-0".$i."-".$blog_name.'-'.$randomString.'.'.end($temp);//$randomString.$ext";
	
		if (file_exists("../../../../upload/blog" . $temp_name)) {
			generatePhotoName($ext,$i);
		} else {
			return $temp_name;
		}
	}
	
	$update_status = 0;
	$ar_file = ['photo_main','photo_hl_1','photo_hl_2','photo_hl_3','photo_width','photo_high','photo_sq'];
	for($i=0;$i<=7;$i++)
	{
		$f_name = 'butUploadPhoto_';
		if (isset($_FILES[$f_name.$ar_file[$i]]) && !empty($_FILES[$f_name.$ar_file[$i]]['name'])) 
		{
			$file_ext = pathinfo($_FILES[$f_name.$ar_file[$i]]['name'], PATHINFO_EXTENSION);
			$temp = explode(".", $_FILES[$f_name.$ar_file[$i]]["name"]);
			$new_file_name = generatePhotoName($file_ext,$i,$temp,$blog_name);
			$path = "../../../../upload/blog/$new_file_name";
			$showcase_path = "upload/blog/$new_file_name";
			
			
			$upload_dir = "upload/blog";
			$location = imageUpload($_FILES[$f_name.$ar_file[$i]]['tmp_name'], $new_file_name, $upload_dir); 
			if($location!='')
			{
				$data[$ar_file[$i]] = json_encode($showcase_path);
				$dbc->Update("blogs",$data,"id=".$id);
				$update_status = 1;
			}
			else 
			{
				//$data['about_us'] = 'NULL';
				$update_status = 0;
			}
			/*if (move_uploaded_file($_FILES[$f_name.$ar_file[$i]]['tmp_name'], $path)) {
				
				//$data['photo'] = json_encode($location);
				$data[$ar_file[$i]] = json_encode($showcase_path);
				$dbc->Update("blogs",$data,"id=".$id);
				$update_status = 1;
				
			} else {
				//$data['about_us'] = 'NULL';
				$update_status = 0;
			}*/
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
	
	//echo '1'.$location;
$dbc->Close();		
?>