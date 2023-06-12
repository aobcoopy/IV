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
  

    //check type file
    $allowed =  array('gif','png','PNG','jpg','JPG');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$allowed)) 
    {
        echo json_encode(array(
                'success'=>false,
                'msg' => 'file is not supported'
            ));
    }
    else
    {
        $times = time(' H:i:s');
        
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $image_temp_name = $_FILES["file"]["tmp_name"];
        //$image_name = "Property_".$_SESSION['auth']['user_id']."_".$newfilename; 
        $image_name = $_GET['format_photo_name'].$newfilename ;
        $upload_dir = "upload/property";
        $location = imageUpload($image_temp_name, $image_name, $upload_dir); 
       
        echo json_encode(array(
            'success'=>true,
            'path' => $location
        ));       

    }
        
?>