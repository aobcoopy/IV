+<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	//echo '------hello world';
	
	
	
	$old_sub_dir = '../../../../upload/property';
			
	$new_sub_dir = '../../../../upload/property_backup';
	$new_sub_dir2 = '../../../../upload/property_backup_2';
	
	/*//get directory contents
	$contents = array();
	
	$dir = opendir($old_sub_dir);
	
	while (false !== ($file = readdir($dir))) {
		   $contents[] = $file;
	   }
	closedir($dir);
	
	//get only jpeg contents
	$jpeg_contents = array();
	
	foreach($contents as $file){
		//if (eregi('.jpg{1}$', $file)){
			$jpeg_contents[] = $file;
		//}
	}
	
	// copy each jpeg from directory 'a' to directory 'b'
	foreach($jpeg_contents as $file){
		unlink($old_sub_dir.$file);
		copy($old_sub_dir . '/' . $file, $new_sub_dir2 . '/' . $file);
	}*/
	
	
	//echo $n_name;
			//$save_dir = "../../../../upload/property_backup/";
//			if(!file_exists($save_dir))
//			{
//				mkdir($save_dir);
//				
//			}
	
	$sql = $dbc->Query("select * from properties limit 300,350");
	$i=0;
	while($row = $dbc->Fetch($sql))
	{
		$photo = json_decode($row['photo'],true);
		foreach($photo as $img)
		{
			$n_name = str_replace("//","/",$img['img']);
			$xe = explode("/",$n_name);
			
			$file = $xe[3];
			copy($old_sub_dir . '/' . $file, $new_sub_dir . '/' . $file);
			//copy($old_sub_dir . '/' . $file, $new_sub_dir2 . '/' . $file);
			//unlink($old_sub_dir.'/'.$file);
			//copy($new_sub_dir . '/' . $file, $old_sub_dir . '/' . $file);
			$i++;
		}
		
		//if($row['cover']!='')
//		{
//			$cover = json_decode($row['cover'],true);
//			$cex = explode("/",$cover);
//			$file_c = $cex[4];
//			copy($old_sub_dir . '/' . $file_c, $new_sub_dir . '/' . $file_c);
//			copy($old_sub_dir . '/' . $file_c, $new_sub_dir2 . '/' . $file_c);
//			unlink($old_sub_dir.'/'.$file_c);
//		}
//		
//		if($row['plan']!='')
//		{
//			$plan = json_decode($row['plan'],true);
//			$pex = explode("/",$plan);
//			$file_p = $pex[4];
//			copy($old_sub_dir . '/' . $file_p, $new_sub_dir . '/' . $file_p);
//			copy($old_sub_dir . '/' . $file_p, $new_sub_dir2 . '/' . $file_p);
//			unlink($old_sub_dir.'/'.$file_p);
//		}
//		
//		if($row['photo_hl']!='')
//		{
//			$plan = json_decode($row['photo_hl'],true);
//			$pex_1 = explode("/",$plan['long']);
//			$pex_2 = explode("/",$plan['short']);
//			$file_hl_1 = $pex_1[4];
//			$file_hl_2 = $pex_2[4];
//			copy($old_sub_dir . '/' . $file_hl_1, $new_sub_dir . '/' . $file_hl_1);
//			copy($old_sub_dir . '/' . $file_hl_1, $new_sub_dir2 . '/' . $file_hl_1);
//			copy($old_sub_dir . '/' . $file_hl_2, $new_sub_dir . '/' . $file_hl_2);
//			copy($old_sub_dir . '/' . $file_hl_2, $new_sub_dir2 . '/' . $file_hl_2);
//			unlink($old_sub_dir.'/'.$file_hl_1);
//			unlink($old_sub_dir.'/'.$file_hl_2);
//		}
	}
	
	
	
	
	echo json_encode(array(
		'success'=>true,
		'amt' => $i
	));
	
	
	//echo '<pre>';
//	print_r($jpeg_contents);
//	echo '</pre>';
	
	
	
		
		
		
		
?>