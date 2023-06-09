<?php
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
    include_once "../../inc/sendmail.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	//$os = new minerva($dbc);
	//echo '------hello world';
	
	$email_to = "jao@inspiringvillas.com,rsvn@inspiringvillas.com";//"myself.graphic@gmail.com";//
	$vname = $_REQUEST['vname'];
	$vstatus = $_REQUEST['vstatus'];
	$vuser = $_REQUEST['vuser'];
	
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
	
		//$strTo = $strTo;//.",aobcoopy@gmail.com";
		$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
		$strHeader.= "From: info_noti@inspiringvillas.com";
		$strSubject = "Villa On/Off Notifications";
		
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
		
	</style>";
	
	$sta_color = ($vstatus==1)?'green':'#cc0000';
	$sta_val = ($vstatus==1)?'Open':'Close';
	$sta_ass = ($vstatus==1)?'fa-check':'fa-times';
	$exp = explode("|",$vname);
	
	$strMessage.= "<div style='padding:0px; background:#fff; border:0px solid #CDCDCD;width:600px;margin:auto;'>
			
			<center><br><br>";
			
				if($vstatus==1)
				{
					$strMessage.= "<img src='https://www.inspiringvillas.com/libs/action_notifications/tick.png' />";
				}
				else
				{
					$strMessage.= "<img src='https://www.inspiringvillas.com/libs/action_notifications/stop.png' />";
				}

				$strMessage.= "<strong><h2 style='background: #fff; padding: 20px; color:".$sta_color.";'>".$exp[0]." - ".$sta_val."</h2></strong>
			</center>
			<div class='detail' style='font-size: 15px;padding:0px 10px;'>
			<center>";
	//--------mail------------------
			
				$strMessage.= "<strong>Villa Name</strong> : ".$vname."<br>";
				$strMessage.= "<strong>User</strong> : ".$vuser."<br>";
				
				$strMessage.= "<strong>Status</strong> : ".$sta_val."<br>";
				$strMessage.= "<strong>Date</strong> : ".date("Y-m-d H:i:s");
	
	//--------mail------------------

				$strMessage.= "<br><br>
			</center></div>
		   
			
		   
		</div>";
		
		
		

        $strTo = $email_to;//"aobcoopy@gmail.com";
		newSendMail($strTo,$strSubject,$strMessage,$strHeader);
		
		$strTo_2 = "aobcoopy@gmail.com";
		newSendMail($strTo_2,$strSubject,$strMessage,$strHeader);
		//mail($strTo,$strSubject,$strMessage,$strHeader);
		
		
?>