<style>
body
{
	background:#E8E8E8;
}
.email_body
{
	background:#fff;
	padding:30px;
	box-shadow:0px 0px 15px #AAAAAA;
	font-size:16px;
}
.bsd
{
	box-shadow:0px 0px 15px #AAAAAA;
}
</style>
<script>
var x = document.createElement("META");
	x.setAttribute("name", "robots");
	x.setAttribute("content", "noindex");
	document.head.appendChild(x);
</script>
<?php
$id = base64_decode($_REQUEST['id']);
$type = base64_decode($_REQUEST['type']);
$view = isset($_REQUEST['view'])?base64_decode($_REQUEST['view']):'';
//echo $id.'-'.$type.'-'.$view;
if($type['type']==1)
{
	$email_data = $dbc->GetRecord("contact_us","*","type = 1 and id = '".$id."'");
	$name = $email_data['name'];
	$villa = $dbc->GetRecord("properties","*","id = '".$email_data['property']."'");
	$v_name = explode("|",$villa['name']);
	
	$des = $dbc->GetRecord("destinations","*","id = '".$villa['destination']."'");
	$villa_name_1 = $v_name[0].', '.$des['name'];
	$posiotion_text = strrpos($v_name[0]," ");
	$complete_text = substr_replace($v_name[0],",",$posiotion_text);
	$villa_name = $complete_text.' '.$des['name'];
	
	$email = ($email_data['email']!='')?$email_data['email']:'-';
	$phone = ($email_data['phone']!='')?$email_data['phone']:'-';
	$message = ($email_data['message']!='')?$email_data['message']:'-';
    if($view=='question')     
	{           
		$strMessage_2 = "<br><div class='bsd' style=\"padding:0px; background:#f5f6f5; border:1px solid #CDCDCD;width:600px;padding:10px;margin:auto;\">
				<div style=\" height: 82px; width: 100%;\">
					<div style=\"width:100%;padding: 0px 30px; \"><br>
                        <img src=\"https://www.inspiringvillas.com/libs/actions/logo.png\" width=\"80\">
                    </div>
				</div>
				<div style=\"width:100%;border-top:0px solid #CCC;margin-top: 45px;\">
					<div style=\"color: #000000;font-size:16px;\">
						<div class=\"\" style=\"border-bottom:0px solid #999;font-family: sans-serif;padding: 0px 30px;\">
                        	<h2>Question from ".$name." </h2>";
							$strMessage_2.= "Name: ".$name."<br>";
							$strMessage_2.= "Email: ".$email."<br>";
							$strMessage_2.= "Phone: ".$phone."<br>";
							$strMessage_2.= "Property Name: <span style=\"color:#f05542;\">".$villa_name."</span><br>";
                            $strMessage_2.= "Message:".$message;
                            $strMessage_2.= "<br><br>
                            Best Regards,<br>
                            Inspiring Villas Team
						</div>
					</div>
				</div>
                <div style=\"padding: 0px 30px;margin-top: 45px;\">
                    <div style=\"background: none;margin-top:25px;padding: 10px; !importantfont-size:11px;border-top: 1px solid #999;\">
                        <div style=\"font-size: 14px;font-family: sans-serif;color: #292929;\">
                        E:rsvn@inspiringvillas.com &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=\"http://www.inspiringvillas.com\" target=\"_blank\" style=\"color: #292929; text-decoration:none;\">www.inspiringvillas.com</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=\"tel:+66846771551\" style=\"color: #292929; text-decoration:none;\">T:+66 84 677 1551</a>
                        </div>
                    </div>
                </div>
			</div>";
		echo $strMessage_2;
	}
}
elseif($type['type']==2)
{
	$email_data = $dbc->GetRecord("contact_us","*","type = 2 and id = '".$id."'");
	$name = $email_data['name'];
	$villa = $dbc->GetRecord("properties","*","id = '".$email_data['property']."'");
	
	$v_name = explode("|",$villa['name']);
	$des = $dbc->GetRecord("destinations","*","id = '".$villa['destination']."'");
	$villa_name_1 = $v_name[0].', '.$des['name'];
	$posiotion_text = strrpos($v_name[0]," ");
	$complete_text = substr_replace($v_name[0],",",$posiotion_text);
	$villa_name = $complete_text.' '.$des['name'];
	
	if($view=='partner')
	{
		$in = ($email_data['checkin']!='')?$email_data['checkin']:'-';
		$out = ($email_data['checkout']!='')?$email_data['checkout']:'-';
		$Adults = ($email_data['guest']!='')?$email_data['guest']:'-';
		$Children = ($email_data['children']!='')?$email_data['children']:'-';
		$Bedroom = ($email_data['bedroom']!='')?$email_data['bedroom']:'-';
		
		if($villa['destination']==38)
		{
			$desit = "Phuket";
			$elink = "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
		}
		else
		{
			$desit = "Koh Samui";
			$elink = "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
		}
		
		$strMessage_3 = "<br><div class='bsd' style='padding:0px; background:#fff; border:0px solid #CDCDCD;width:600px;margin:auto;'>
				<img src='https://www.inspiringvillas.com/upload/emphoto/p1.png' width='100%'>
				
				<div class='detail' style='font-size: 15px;margin-top:15px;padding:0px 10px;'>
					Dear Partner<br><br>
			
					Greetings from <a href='https://www.inspiringvillas.com/".$elink."'>Inspiring Villas!</a><br><br>
					
					We are pleased to notify you that we have a request for <a href='https://www.inspiringvillas.com/".$villa['ht_link'].".html'>".$villa_name."</a> with the 
					following details.<br><br>
					
					Name: ".$name."<br>
					Check In: ".$in."<br>
					Check Out: ".$out."<br>
					No. of Adults: ".$Adults." <br>
					No. of Children: ".$Children." <br>
					No. of Bedroom: ".$Bedroom." <br>";
					
                 	$strMessage_3.= "<br><br>
					
					Best Regards,
					<br>
					Inspiring Villas Team 
					<br><br>
					Skype : inspiringvillas<br>
					iPhone/Whatsapp: +66 83 655 6452<br>
					Hong Kong: +852 8198 6765<br>
					Sydney: +28 005 7651<br>
					Phuket: +66 (0) 76 626 762<br>
					Koh Samui: +66 84 677 1551 <br>
					website: <a href='https://www.inspiringvillas.com/'>www.inspiringvillas.com</a>
					<br><br>
					
					
				</div>
			   <img src='https://www.inspiringvillas.com/upload/emphoto/p4.png' width='100%' >
			   </div>
			</div><br>";
			echo $strMessage_3;
	}
	else
	{
		
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 email_body top30">
					<h2 class="text-center"><img src="../../upload/slogo.png" width="100" alt=""><br>Email Booking Details<br></h2>
					<h3 class="top30">Name : <?php echo $name?> </h3>
					Email : <?php echo ($email_data['email']!='')?$email_data['email']:'-';?><br>
					Villa : <?php echo ($villa['name']!='')?$villa['name']:'-';?> <br>
					No. Bedroom : <?php echo ($email_data['bedroom']!='')?$email_data['bedroom']:'-';?><br>
					Check In : <?php echo ($email_data['checkin']!='')?$email_data['checkin']:'-';?><br>
					Check Out : <?php echo ($email_data['checkout']!='')?$email_data['checkout']:'-';?><br>
					No. Adults : <?php echo ($email_data['guest']!='')?$email_data['guest']:'-';?><br>
					No. Children : <?php echo ($email_data['children']!='')?$email_data['children']:'-';?><br>
					Phone : <?php echo ($email_data['phone']!='')?$email_data['phone']:'-';?><br>
					Note : <?php echo ($email_data['message']!='')?$email_data['message']:'-';?><br>
				</div>
		
			</div>
		</div>
		<?php
	}
}

