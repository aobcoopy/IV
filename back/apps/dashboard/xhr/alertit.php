<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	//include_once "../../../libs/class/minerva.php";
	
	/*include_once "11/config/define.php";
	include_once "11/class/db.php";*/
	
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
				<strong><h2 style='background: #3a3a3a; padding: 20px; color:#fff;'>Expire Notifications</h2></strong>
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
		$position = $dat['data_val']['position'];
		
		$pri = $dbc->GetRecord("pricing","*","property = '".$idv."'");
		$stay = json_decode($pri['stay'],true);
		if(!in_array($idv,$id_ar))
		{
			array_push($id_ar,$idv);
			
			//echo '<h1><strong>'.$v_name.'</strong></h1>';
			//echo '<strong>Expire date : '.$pri['pro_exp_'.$position].'</strong>';
			
			$strMessage.= "<br><br><h1><strong>".$v_name."</strong></h1>";
			$strMessage.= "<strong>Expire date : ".$pri['pro_exp_'.$position]."</strong><br><br>";
			
			//$mail_data[] = array(
//				'villa' => $v_name,
//				'exp' => $pri['pro_exp_'.$position],
//				'list' => $list
//			);
			
		}
		
		switch($position)
		{
			case'1':
				/*echo '<li class="fo15"> Enjoy <span style="color:red">'.$pri['p_discount'].'</span>% discount for min <span style="color:red">'.$pri['p_night'].'</span> nights booking for travel period between <span style="color:red">'.months($pri['p_from']).'</span> to <span style="color:red">'.months($pri['p_to']).'</span>.</li>';*/

				$strMessage.= "<li class='fo15'> Enjoy <span style='color:red'>".$pri['p_discount']."</span>% discount for min <span style='color:red'>".$pri['p_night']."</span> nights booking for travel period between <span style='color:red'>".months($pri['p_from'])."</span> to <span style='color:red'>".months($pri['p_to'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'p_discount',
						'p_night',
						'p_from',
						'p_to',
						'pro_exp_'.$position
					)
				);
			break;
			case'2':
				/*echo '<li class="fo15"> Enjoy <span style="color:red">'.$pri['p_discount_1'].'</span>% discount for min <span style="color:red">'.$pri['p_night_1'].'</span> nights booking for travel period between <span style="color:red">'.months($pri['p_from_1']).'</span> to <span style="color:red">'.months($pri['p_to_1']).'</span>.</li>';*/
				
				$strMessage.= "<li class='fo15'> Enjoy <span style='color:red'>".$pri['p_discount_1']."</span>% discount for min <span style='color:red'>".$pri['p_night_1']."</span> nights booking for travel period between <span style='color:red'>".months($pri['p_from_1'])."</span> to <span style='color:red'>".months($pri['p_to_1'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'p_discount_1',
						'p_night_1',
						'p_from_1',
						'p_to_1',
						'pro_exp_'.$position
					)
				);
			break;
			case'3':
				/*echo '<li class="fo15"> Enjoy <span style="color:red">'.$pri['p_discount_2'].'</span>% discount for min <span style="color:red">'.$pri['p_night_2'].'</span> nights booking for travel period between <span style="color:red">'.months($pri['p_from_2']).'</span> to <span style="color:red">'.months($pri['p_to_2']).'</span>.</li>';*/
				
				$strMessage.= "<li class='fo15'> Enjoy <span style='color:red'>".$pri['p_discount_2']."</span>% discount for min <span style='color:red'>".$pri['p_night_2']."</span> nights booking for travel period between <span style='color:red'>".months($pri['p_from_2'])."</span> to <span style='color:red'>".months($pri['p_to_2'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'p_discount_2',
						'p_night_2',
						'p_from_2',
						'p_to_2',
						'pro_exp_'.$position
					)
				);
			break;
			case'4':
				/*echo '<li class="fo15"> Enjoy <span style="color:red">'.$pri['pr_discount'].'</span>% discount and FREE <span style="color:red">'.$pri['pr_free'].'</span> , for booking stay between <span style="color:red">'.months($pri['pr_from']).'</span> to <span style="color:red">'.months($pri['pr_to']).'</span>.</li>';*/
				
				$strMessage.= "<li class='fo15'> Enjoy <span style='color:red'>".$pri['pr_discount']."</span>% discount and FREE <span style='color:red'>".$pri['pr_free']."</span> , for booking stay between <span style='color:red'>".months($pri['pr_from'])."</span> to <span style='color:red'>".months($pri['pr_to'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'pr_discount',
						'pr_free',
						'pr_from',
						'pr_to',
						'pro_exp_'.$position
					)
				);
			break;
			case'5':
				/*echo '<li class="fo15">  Stay/book <span style="color:red">'.$pri['ps_book'].'</span> nights and pay <span style="color:red">'.$pri['ps_pay'].'</span> nights. This promotion is applicable to <span style="color:red">'.$pri['ps_applicetion'].'</span> villa occupancy booking travelling between <span style="color:red">'.months($pri['ps_from']).'</span> to <span style="color:red">'.months($pri['ps_to']).'</span>.</li>';*/
				$strMessage.= "<li class='fo15'>  Stay/book <span style='color:red'>".$pri['ps_book']."</span> nights and pay <span style='color:red'>".$pri['ps_pay']."</span> nights. This promotion is applicable to <span style='color:red'>".$pri['ps_applicetion']."</span> villa occupancy booking travelling between <span style='color:red'>".months($pri['ps_from'])."</span> to <span style='color:red'>".months($pri['ps_to'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'ps_book',
						'ps_pay',
						'ps_applicetion',
						'ps_from',
						'ps_to',
						'pro_exp_'.$position
					)
				);
			break;
			
			case'6':
				/*echo '<li class="fo15">  Stay/book <span style="color:red">'.$stay['ps_book_4'].'</span> nights and pay <span style="color:red">'.$stay['ps_pay_4'].'</span> nights. This promotion is applicable to <span style="color:red">'.$stay['ps_applicetion_4'].'</span> villa occupancy booking travelling between <span style="color:red">'.months($stay['ps_from_4_1']).'</span> to <span style="color:red">'.months($stay['ps_to_4_1']).'</span>';
							if($stay['ps_from_4_2'] && $stay['ps_to_4_2'])
							{
								echo  ' and <span style="color:red">'.months($stay['ps_from_4_2']).'</span> to <span style="color:red">'.months($stay['ps_to_4_2']).'</span>';
							}
							echo '.</li>';*/
							
							$strMessage.= "<li class='fo15'>  Stay/book <span style='color:red'>".$stay['ps_book_4']."</span> nights and pay <span style='color:red'>".$stay['ps_pay_4']."</span> nights. This promotion is applicable to <span style='color:red'>".$stay['ps_applicetion_4']."</span> villa occupancy booking travelling between <span style='color:red'>".months($stay['ps_from_4_1'])."</span> to <span style='color:red'>".months($stay['ps_to_4_1'])."</span> and <span style='color:red'>".months($stay['ps_from_4_2'])."</span> to <span style='color:red'>".months($stay['ps_to_4_2'])."</span>.</li>";
							
				
							$emtpy[] = array(
								'idv' => $idv,
								'json' => array(
									'ps_book_4',
									'ps_pay_4',
									'ps_applicetion_4',
									'ps_from_4_1',
									'ps_to_4_1',
									'ps_from_4_2',
									'ps_to_4_2'
								),
								'pos' => array(
									'pos' => 'pro_exp_'.$position
								)
							);
			break;
			case'7':
				/*echo '<li class="fo15">  Stay/book <span style="color:red">'.$stay['ps_book_5'].'</span> nights and pay <span style="color:red">'.$stay['ps_pay_5'].'</span> nights. This promotion is applicable to <span style="color:red">'.$stay['ps_applicetion_5'].'</span> villa occupancy booking travelling between <span style="color:red">'.months($stay['ps_from_5_1']).'</span> to <span style="color:red">'.months($stay['ps_to_5_1']).'</span>';
							if($stay['ps_from_5_2'] && $stay['ps_to_5_2'])
							{
								echo  ' and <span style="color:red">'.months($stay['ps_from_5_2']).'</span> to <span style="color:red">'.months($stay['ps_to_5_2']).'</span>';
							}
							echo '.</li>';*/
							
							$strMessage.= "<li class='fo15'>  Stay/book <span style='color:red'>".$stay['ps_book_5']."</span> nights and pay <span style='color:red'>".$stay['ps_pay_5']."</span> nights. This promotion is applicable to <span style='color:red'>".$stay['ps_applicetion_5']."</span> villa occupancy booking travelling between <span style='color:red'>".months($stay['ps_from_5_1'])."</span> to <span style='color:red'>".months($stay['ps_to_5_1'])."</span> and <span style='color:red'>".months($stay['ps_from_5_2'])."</span> to <span style='color:red'>".months($stay['ps_to_5_2'])."</span>.</li>";
							
							
							$emtpy[] = array(
								'idv' => $idv,
								'json' => array(
									'ps_book_5',
									'ps_pay_5',
									'ps_applicetion_5',
									'ps_from_5_1',
									'ps_to_5_1',
									'ps_from_5_2',
									'ps_to_5_2',
								),
								'pos' => array(
									'pos' => 'pro_exp_'.$position
								)
							);
			break;
			case'8':
				/*echo '<li class="fo15">  Stay/book <span style="color:red">'.$stay['ps_book_6'].'</span> nights and pay <span style="color:red">'.$stay['ps_pay_6'].'</span> nights. This promotion is applicable to <span style="color:red">'.$stay['ps_applicetion_6'].'</span> villa occupancy booking travelling between <span style="color:red">'.months($stay['ps_from_6_1']).'</span> to <span style="color:red">'.months($stay['ps_to_6_1']).'</span>';
							if($stay['ps_from_6_2'] && $stay['ps_to_6_2'])
							{
								echo  ' and <span style="color:red">'.months($stay['ps_from_6_2']).'</span> to <span style="color:red">'.months($stay['ps_to_6_2']).'</span>';
							}
						echo '.</li>';*/
						
						$strMessage.= "<li class='fo15'>  Stay/book <span style='color:red'>".$stay['ps_book_6']."</span> nights and pay <span style='color:red'>".$stay['ps_pay_6']."</span> nights. This promotion is applicable to <span style='color:red'>".$stay['ps_applicetion_6']."</span> villa occupancy booking travelling between <span style='color:red'>".months($stay['ps_from_6_1'])."</span> to <span style='color:red'>".months($stay['ps_to_6_1'])."</span> and <span style='color:red'>".months($stay['ps_from_6_2'])."</span> to <span style='color:red'>".months($stay['ps_to_6_2'])."</span>.</li>";
						
						
						$emtpy[] = array(
							'idv' => $idv,
							'json' => array(
								'ps_book_6',
								'ps_pay_6',
								'ps_applicetion_6',
								'ps_from_6_1',
								'ps_to_6_1',
								'ps_from_6_2',
								'ps_to_6_2',
							),
							'pos' => array(
								'pos' => 'pro_exp_'.$position
							)
						);
			break;
			case'9':
				//echo '<li class="fo15">  Stay/book <span style="color:red">'.$stay['ps_book_7'].'</span> nights and pay <span style="color:red">'.$stay['ps_pay_7'].'</span> nights. This promotion is applicable to <span style="color:red">'.$stay['ps_applicetion_7'].'</span> villa occupancy booking travelling between <span style="color:red">'.months($stay['ps_from_7_1']).'</span> to <span style="color:red">'.months($stay['ps_to_7_1']).'</span>';
							/*if($stay['ps_from_7_2'] && $stay['ps_to_7_2'])
							{
								echo  ' and <span style="color:red">'.months($stay['ps_from_7_2']).'</span> to <span style="color:red">'.months($stay['ps_to_7_2']).'</span>';
							}
							echo '.</li>';*/
							
							$strMessage.= "<li class='fo15'>  Stay/book <span style='color:red'>".$stay['ps_book_7']."</span> nights and pay <span style='color:red'>".$stay['ps_pay_7']."</span> nights. This promotion is applicable to <span style='color:red'>".$stay['ps_applicetion_7']."</span> villa occupancy booking travelling between <span style='color:red'>".months($stay['ps_from_7_1'])."</span> to <span style='color:red'>".months($stay['ps_to_7_1'])."</span> and <span style='color:red'>".months($stay['ps_from_7_2'])."</span> to <span style='color:red'>".months($stay['ps_to_7_2'])."</span>.</li>";
							
							$emtpy[] = array(
								'idv' => $idv,
								'json' => array(
									'ps_book_7',
									'ps_pay_7',
									'ps_applicetion_7',
									'ps_from_7_1',
									'ps_to_7_1',
									'ps_from_7_2',
									'ps_to_7_2',
								),
								'pos' => array(
									'pos' => 'pro_exp_'.$position
								)
							);
			break;
			case'10':
				//echo '<li class="fo15"> Special offer FREE <span style="color:red">'.$pri['psp_offer'].'</span> for booking stay between <span style="color:red">'.months($pri['psp_fron']).'</span> to <span style="color:red">'.months($pri['psp_to']).'</span>.</li>';
				
				$strMessage.= "<li class='fo15'> Special offer FREE <span style='color:red'>".$pri['psp_offer']."</span> for booking stay between <span style='color:red'>".months($pri['psp_fron'])."</span> to <span style='color:red'>".months($pri['psp_to'])."</span>.</li>";
				
				$emtpy[] = array(
					'idv' => $idv,
					'data' => array(
						'psp_offer',
						'psp_fron',
						'psp_to',
						'pro_exp_'.$position
					)
				);
			break;
		}
		//-- end switch
		//array_push($mail_data[$i],array('list' => $list));
		//$list = array();
		$i++;
		
	}
	
	//echo'<pre>';
//	print_r($list);
//	echo'</pre>';
//	
	
//	echo'<pre>';
//	print_r($emtpy);
//	//print_r($id_ar);
//	echo'</pre>';

	//echo'<pre>';
//	print_r($mail_data);
//	//print_r($id_ar);
//	echo'</pre>';
	
	
//--------mail------------------

//<a href='http://127.0.0.1:8119/back/?app=properties'><button>Go to Backend</button></a>
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
	
	
	
	
	
	
	
	
	
	
	//echo'<pre>';
	foreach($emtpy as $va)
	{
		//echo $va['idv'].'---<br>';
		
		if(isset($va['data']))
		{
			foreach($va['data'] as $clear)
			{
				//echo $clear.'<br>';
				$val_dat = array(
					$clear => NULL
				);
				
				//----------$dbc->Update("pricing",$val_dat,"property = '".$va['idv']."' ");
			}
		}
		
		
		if(isset($va['json']))
		{
			foreach($va['json'] as $clear)
			{
				//echo '->'.$clear.'<br>';
				$old = $dbc->GetRecord("pricing","*","property = '".$va['idv']."' ");
				$stay_da = json_decode($old['stay'],true);
				
				//echo '>>'.$stay_da['ps_book_4'].'<<';
				
				$ps_book_4 =($clear=='ps_book_4')?NULL:$stay_da['ps_book_4'];
				$ps_pay_4 =($clear=='ps_pay_4')?NULL:$stay_da['ps_pay_4'];
				$ps_applicetion_4 =($clear=='ps_applicetion_4')?NULL:$stay_da['ps_applicetion_4'];
				$ps_from_4_1 =($clear=='ps_from_4_1')?NULL:$stay_da['ps_from_4_1'];
				$ps_to_4_1 =($clear=='ps_to_4_1')?NULL:$stay_da['ps_to_4_1'];
				$ps_from_4_2 =($clear=='ps_from_4_2')?NULL:$stay_da['ps_from_4_2'];
				$ps_to_4_2 =($clear=='ps_to_4_2')?NULL:$stay_da['ps_to_4_2'];
				
				$ps_book_5 =($clear=='ps_book_5')?NULL:$stay_da['ps_book_5'];
				$ps_pay_5 =($clear=='ps_pay_5')?NULL:$stay_da['ps_pay_5'];
				$ps_applicetion_5 =($clear=='ps_applicetion_5')?NULL:$stay_da['ps_applicetion_5'];
				$ps_from_5_1 =($clear=='ps_from_5_1')?NULL:$stay_da['ps_from_5_1'];
				$ps_to_5_1 =($clear=='ps_to_5_1')?NULL:$stay_da['ps_to_5_1'];
				$ps_from_5_2 =($clear=='ps_from_5_2')?NULL:$stay_da['ps_from_5_2'];
				$ps_to_5_2 =($clear=='ps_to_5_2')?NULL:$stay_da['ps_to_5_2'];
				
				$ps_book_6 =($clear=='ps_book_6')?NULL:$stay_da['ps_book_6'];
				$ps_pay_6 =($clear=='ps_pay_6')?NULL:$stay_da['ps_pay_6'];
				$ps_applicetion_6 =($clear=='ps_applicetion_6')?NULL:$stay_da['ps_applicetion_6'];
				$ps_from_6_1 =($clear=='ps_from_6_1')?NULL:$stay_da['ps_from_6_1'];
				$ps_to_6_1 =($clear=='ps_to_6_1')?NULL:$stay_da['ps_to_6_1'];
				$ps_from_6_2 =($clear=='ps_from_6_2')?NULL:$stay_da['ps_from_6_2'];
				$ps_to_6_2 =($clear=='ps_to_6_2')?NULL:$stay_da['ps_to_6_2'];
				
				$ps_book_7 =($clear=='ps_book_7')?NULL:$stay_da['ps_book_7'];
				$ps_pay_7 =($clear=='ps_pay_7')?NULL:$stay_da['ps_pay_7'];
				$ps_applicetion_7 =($clear=='ps_applicetion_7')?NULL:$stay_da['ps_applicetion_7'];
				$ps_from_7_1 =($clear=='ps_from_7_1')?NULL:$stay_da['ps_from_7_1'];
				$ps_to_7_1 =($clear=='ps_to_7_1')?NULL:$stay_da['ps_to_7_1'];
				$ps_from_7_2 =($clear=='ps_from_7_2')?NULL:$stay_da['ps_from_7_2'];
				$ps_to_7_2 =($clear=='ps_to_7_2')?NULL:$stay_da['ps_to_7_2'];
				
				$stay_val = array(
					
					'ps_book_4' => $ps_book_4,
					'ps_pay_4' => $ps_pay_4,
					'ps_applicetion_4' => $ps_applicetion_4,
					'ps_from_4_1' => $ps_from_4_1,
					'ps_to_4_1' => $ps_to_4_1,
					'ps_from_4_2' => $ps_from_4_2,
					'ps_to_4_2' => $ps_to_4_2,
					
					'ps_book_5' => $ps_book_5,
					'ps_pay_5' => $ps_pay_5,
					'ps_applicetion_5' => $ps_applicetion_5,
					'ps_from_5_1' => $ps_from_5_1,
					'ps_to_5_1' => $ps_to_5_1,
					'ps_from_5_2' => $ps_from_5_2,
					'ps_to_5_2' => $ps_to_5_2,
					
					'ps_book_6' => $ps_book_6,
					'ps_pay_6' => $ps_pay_6,
					'ps_applicetion_6' => $ps_applicetion_6,
					'ps_from_6_1' => $ps_from_6_1,
					'ps_to_6_1' => $ps_to_6_1,
					'ps_from_6_2' => $ps_from_6_2,
					'ps_to_6_2' => $ps_to_6_2,
					
					'ps_book_7' => $ps_book_7,
					'ps_pay_7' => $ps_pay_7,
					'ps_applicetion_7' => $ps_applicetion_7,
					'ps_from_7_1' => $ps_from_7_1,
					'ps_to_7_1' => $ps_to_7_1,
					'ps_from_7_2' => $ps_from_7_2,
					'ps_to_7_2' => $ps_to_7_2,
					
				);
				
				$val_json = array(
					'stay' => json_encode($stay_val)
				);
				//----------$dbc->Update("pricing",$val_json,"property = '".$va['idv']."' ");
				
				
				
				//echo'<pre>';
//				print_r(($stay_val));
//				echo'</pre>';
				//foreach(array_keys($old_ar) as $dat_old)
//				{
//					echo '>>'.($dat_old)."<br>";
//				}
			}
		}
		
		if(isset($va['pos']))
		{
			//echo '***'.$va['pos']['pos'];
			$val_dat_2 = array(
				$va['pos']['pos'] => NULL
			);
			//----------$dbc->Update("pricing",$val_dat_2,"property = '".$va['idv']."' ");
		}
		//echo '<br><br>';
	}
	//echo'</pre>';
	
	

		
	
?>
	
		
		
		
