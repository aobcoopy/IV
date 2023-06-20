<?php
	session_start();
	include_once "../../config/define.php";
	include_once "../../libs/class/db.php";
	
	//include_once "../../libs/class/minerva.php";
	
	/*include_once "../dashboard/xhr/11/config/define.php";
	include_once "../dashboard/xhr/11/class/db.php";*/
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	//$os = new minerva($dbc);
	//echo '------hello world';
	
	function months($data)
    {
        $y = substr($data,0,4);
        $m = substr($data,5,2);
        $d = substr($data,8,2);
        switch($m)
        {
            case'01':  $month = 'Jan';break;
            case'02':  $month = 'Feb';break;
            case'03':  $month = 'Mar';break;
            case'04':  $month = 'Apr';break;
            case'05':  $month = 'May';break;
            case'06':  $month = 'Jun';break;
            case'07':  $month = 'Jul';break;
            case'08':  $month = 'Aug';break;
            case'09':  $month = 'Sep';break;
            case'10':  $month = 'Oct';break;
            case'11':  $month = 'Nov';break;
            case'12':  $month = 'Dec';break;
        }
        return  $d.'-'.$month .'-'.$y;
    }
	
	//--------mail------------------
	
		$strTo = $strTo;//.",aobcoopy@gmail.com";
		$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
		$strHeader.= "From: info_noti@inspiringvillas.com";
		$strSubject = "Alert";
		
		//$strHeader .= "From: info@inspiringvillas.com";
		//$strSubject = "Thank you from inspiringvillas" ;
		
		$strMessage = "
		
		<style type='text/css'>
		
		body{
            width: 100%; 
            background-color: #FFFFFF; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
			-webkit-text-size-adjust:none;
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
            mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,h1,h2,h3,h4{
	        margin-top:0;
			margin-bottom:0;
			padding-top:0;
			padding-bottom:0;
        }
        
        
        html{
            width: 100%; 
        }
		
		a:link, span.MsoHyperlink {
			mso-style-priority:99;
			color:blue;
			text-decoration:underline;
		}
		
        /* iOS BLUE LINKS */
		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}
		.fix {
		 display:none;
		 display:none!important;
		}
		.fo15{font-size: 13px;}
		
	</style>
	
	<div style='padding:0px; background:#fff; border:0px solid #CDCDCD;width:600px;margin:auto;'>
			
			<center>
				<strong><h2 style='background: #3a3a3a; padding: 20px; color:#fff;'>Tags Expire Notifications</h2></strong>
			</center>
			<div class='detail' style='font-size: 15px;padding:0px 10px;'>";
	//--------mail------------------
	
				
	
	$val = $_REQUEST['data_val'];
	$id_ar = array();
	//$list = array();
	$i=0;
	foreach($val as $dat['data_val'])
	{
		$idv = $dat['data_val']['villa_id'];
		$v_name = $dat['data_val']['tx_name'];
		$exp = $dat['data_val']['exp'];
		$tag = $dat['data_val']['tag'];
		
		$dat_tag = $dbc->GetRecord("tags","*","id = '".$tag."'");
		
		$strMessage.= "<br><br><h1><strong>".$v_name."</strong></h1><hr>";
		$strMessage.= "<strong>Expire date : </strong><span style='color:red'>".$exp."</span><br>";
		$strMessage.= "<strong>Tag : </strong><span style='color:red'>".$dat_tag['name']."</span>";
		
		
	}
	
//--------mail------------------

				$strMessage.= "<br><br><br>
			</div>
		   
			
		   <div class='foot' style='background: #3a3a3a; padding: 20px; color:#fff;font-size: 14px;'>
				<center>
					<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/email/facebook_icon.png'></a>
					<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/email/twitter_icon.png'></a>
					<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/email/instagram_icon.png'></a>
					<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/email/hyperlink_icon.png'></a>
					<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/email/skype_icon.png'></a>
					<hr style='margin-top:15px;'>
					<div style='margin-top:15px;padding:10px 0px 15px 0px;'>
						<strong>Contact Us</strong><br><br>
						Skype <a href='skype:Inspiringvillas?call' target='_blank' style=' color:#fff;'>inspiringvillas</a><br>
						Samui <a href='tel:+66836556452' style=' color:#fff;'>+66 83 655 6452</a><br>
						Phuket <a href='tel:+66846771551' style=' color:#fff;'>+66 84 677 1551</a><br>
						Thailand <a href='tel:+6676626762' style=' color:#fff;'>+66 (0)76 626 762</a><br>
						Hong Kong <a href='tel:+85281986765' style=' color:#fff;'>+852 8198 6765</a><br>
						Website: <a href='https://www.inspiringvillas.com/' style=' color:#fff;'>www.inspiringvillas.com</a>
						
					</div>
					<hr>
					<div style='margin-top:15px;'><em>Copyright &copy; 2018 InspiringVillas, All rights reserved</em></div>
				</center>
		   </div>
		</div>";
		
		
		

        $strTo = "aobcoopy@gmail.com";
		//mail($strTo,$strSubject,$strMessage,$strHeader);
		newSendMail($strTo,$strSubject,$strMessage,$strHeader);
		//if(mail($strTo,$strSubject,$strMessage,$strHeader))// @ = No Show Error //
//		{
//			echo json_encode(
//				array(
//					'status' => true,
//					'msg' => 'Success full',
//					//'dat' => print_r($val)
//				)
//			);
//		}
//		else
//		{
//			echo json_encode(
//				array(
//					'status' => false,
//					'msg' => 'Please try again',
//					//'dat' => $val
//				)
//			);
//		}

	//--------mail------------------
	
	
	echo $strMessage;
	
	
	
	
	
	
	
	
	
	
		
	
?>
	
		
		
		
