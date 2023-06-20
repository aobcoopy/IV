<?php 
		$line_api = 'https://notify-api.line.me/api/notify';
		$access_token = '1sbXE6uMYSXfpoCRJTyglPbgQS7h9yRBefvBjmP8W6T';//----'access token ที่เราสร้างขึ้น';
		//$access_token = 'cqJWD4iNbfyFd46ncf4TWMTVmRV3DOP4Cs4Vh1O6ekM';//----'access token ที่เราสร้างขึ้น';
		
		$link = 'https://www.inspiringvillas.com/chat/?room='.$_REQUEST['room'];//'http://127.0.0.1:8119/back/?app=online_chat&rid="'.$_REQUEST['room'].'Chat Now';
		
		$arr = array(
			'Name : '.$_REQUEST['name'], 
			'email : '.$_REQUEST['email'], 
			'message : '.$_REQUEST['mess'],
			'Go to Chat : '.$link, 
		);
		
		$text = " === New Message === ";//.$str1."\n".$str2;
		$count_arr = count($arr);
		$x = $count_arr;
		for($i=0;$i<$x;$i++)
		{
			$text .= "\n".$arr[$i];
		}
		
		//$text = "\n === แจ้งฝากเงิน === \n".$str1."\n".$str2."\n".$str3."\n".$str4."\n".$str5."\n".$str6;
		
		$photo = 'https://www.inspiringvillas.com/upload/mass.png';//$_REQUEST['path_photo'];
		
		$image_thumbnail_url = $photo;//'http://www.therich95.net/uploads/01.jpg';  // ขนาดสูงสุด 240×240px JPEG
		$image_fullsize_url = $photo;//'http://www.therich95.net/uploads/01.jpg';  // ขนาดสูงสุด 1024×1024px JPEG
		$sticker_package_id = 1;  // Package ID ของสติกเกอร์
		$sticker_id = 47;    // ID ของสติกเกอร์
		$imageFile = new CurlFile('https://www.inspiringvillas.com/upload/mass.png', 'image/jpg', 'myImage.jpg');
		$imageFile = curl_file_create('https://www.inspiringvillas.com/upload/mass.png', 'image/jpg', 'myImage.jpg');
		
		$message_data = array(
		 'message' => $text,
		 //'imageThumbnail' => $image_thumbnail_url,
		 //'imageFullsize' => $image_fullsize_url,
		 //'redirect_uri' => $link
		 //'imageFile' => $imageFile,
		 //'stickerPackageId' => $sticker_package_id,
		 //'stickerId' => $sticker_id
		);
		
		
		
		$result = send_notify_message($line_api, $access_token, $message_data);
		//print_r($result);	

		function send_notify_message($line_api, $access_token, $message_data)
		{
			 $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );
			
			 $ch = curl_init();
			 curl_setopt($ch, CURLOPT_URL, $line_api);
			 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 $result = curl_exec($ch);
			 // Check Error
			 if(curl_error($ch))
			 {
			  $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
			 }
			 else
			 {
			  $return_array = json_decode($result, true);
			 }
			 curl_close($ch);
			 //return $return_array;
			 echo json_encode(array(
				'success'=>true,
				'result' => $result
			));
			
		}

?>
