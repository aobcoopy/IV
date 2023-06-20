<?php
$ppa = $_REQUEST['page'];   

$channels_string = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|" . $_REQUEST['room'] . "|" . $_REQUEST['cate'];
$metatag_array = getMetatags($dbc, $channels_string);

$iv = "";//" - InspiringVillas.com";
$link_url_title = $_SERVER['REQUEST_URI'];
$array_link = array(
	'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
);
$array_link_2 = array(
	'/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
);
$array_link_3 = array(
	'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
);
$array_link_4 = array(
	'/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html',
	'/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html',
	'/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html',
	'/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html',
	'/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html',
	'/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html',
);
$array_link_5 = array(
	'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
);
$array_link_6 = array(
	'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
);
$array_link_7 = array(
	'/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
);
$array_link_8 = array(
	'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
);



if($ppa=='home' || !isset($ppa))
{
	$title_tag = "Thailand Villas - Luxury Holiday Rentals";//"Luxury Villa Holidays & Private Villa Rentals ";//"Thailand Villas | Unique Luxury Vacations";//"Thailand Villas | Private Vacation Rentals".$iv;//"Thailand Villas Luxury Rentals Phuket & Koh Samui ";//"Luxury Villa Rentals in Phuket & Koh Samui,Thailand";
	$meta_description = string_len_meta("Thailand Luxury Villa Rentals with beach access, sea views and stunning facilities, fully-staffed & private chef. Book Your Villa Holiday Today with Inspiring Villas.",152);//"Luxury Private Villa Rentals with full service staff and chef, in Thailand, Asia & Beyond. Book Your Villa Holiday Today with Inspiring Villas";//"Luxury Private Pool Villa Rentals with full service staff and chef, in Phuket & Koh Samui,Thailand. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='villas')
{
	$title_tag = "Seaview & Beachfront Luxury Villas for Rent in Phuket & Koh Samui";
	$meta_description = "Luxury Pool Villa Rentals - Seaview & Beachfront Villas - Choose your perfect villa holiday in Phuket & Koh Samui. Book Today with Inspiring Villas";
}
elseif($ppa=='service')
{
	$title_tag = "Thailand Luxury Villa Rental Services".$iv;
	$meta_description = "Luxury Pool Villa Rentals with full service staff and private chef in Phuket & Koh Samui, Thailand. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='blog')
{
	$title_tag = "Blog & Life Style";
	$meta_description = "Travel Tips & Guides on Luxury Lifestyle Travel & Villa Holidays in Koh Samui & Phuket, Thailand. Unique & Luxury Experiences with Inspiring Villas.";
}
elseif($ppa=='blogdetail')
{
	$blogs = $dbc->GetRecord("blogs","*","id='".$_REQUEST['id']."'");
	$title_tag = $blogs['name'];
	$meta_description = base64_decode($blogs['brief'],true);
}
elseif($ppa=='faq')
{
	$title_tag = "FAQ";
	$meta_description = "Understand process of finding, booking and planning a Luxury Villa Holiday in Phuket & Koh Samui Thailand with Inspiring Villas. Start Today.";
}
elseif($ppa=='contact')
{
	$title_tag = "Contact Inspiring Villas";//"Contact Inspiring Villas | The Luxury Villa Specialists in Thailand".$iv;
	$meta_description1 = "Contact our villa holiday specialist team in Phuket & Koh Samui for the the best choice & service in luxury villas for rent in Thailand.Book with Inspiring Villas";
	$meta_description = string_len_meta($meta_description1,152);
}
elseif($ppa=='about')
{
	$title_tag = "About Inspiring Villas";//"Private Pool Villa Holidays with Inspiring Villas in Phuket & Koh Samui";
	$meta_description = "Inspiring Villas in Thailand - Experienced luxury villa holiday professionals in Phuket & Koh Samui. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='410')
{
	$title_tag = "410 | Not Found";
	$meta_description = "Inspiring Villas in Thailand - Experienced luxury villa holiday professionals in Phuket & Koh Samui. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='recently')
{
	$title_tag = "Recently Viewed Villas";
	$meta_description = "Luxury Private Pool Villa Rentals with full service staff and chef, in Phuket & Koh Samui,Thailand. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='terms')
{
	$title_tag = "Inspiring Villas Terms";
	$meta_description = "Luxury Private Pool Villa Rentals with full service staff and chef, in Phuket & Koh Samui,Thailand. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='privacy')
{
	$title_tag = "Inspiring Villas Privacy";
	$meta_description = "Luxury Private Pool Villa Rentals with full service staff and chef, in Phuket & Koh Samui,Thailand. Book Your Villa Holiday Today with Inspiring Villas";
}
elseif($ppa=='propertydetail')
{
	if(isset($_REQUEST['id']))
	{
		if($dbc->HasRecord("metatag","property=".$_REQUEST['id']))
		{
			$meta = $dbc->GetRecord("metatag","*","property=".$_REQUEST['id']);
			
			$tex1 = explode("|",$meta['title']);
			$tex2 = explode("Villa",$tex1[1]);
			$tex3 = explode("-",$tex2[1]);
			//$title_tag = $tex1[0].'-'.$tex3[1];
			$meta_description1 = base64_decode($meta['description'],true);
			$meta_description = string_len_meta($meta_description1,150);
			
			$array_list = array('210','225','270','59','6','94');
			if(in_array($_REQUEST['id'],$array_list))
			{
				$title_tag_1 = $tex1[0].'-'.$tex3[1];
				$title_tag = str_replace("Beach","",$title_tag_1);
			}
			else
			{
				if($meta['updated']>'2020-07-15')
				{
					$title_tag = $meta['title'];
				}
				else
				{
					if($_REQUEST['id']=='402')
					{
						$title_tag_1 = $tex1[0].'-'.$tex3[1];
						$title_tag = str_replace("Beachss","",$title_tag_1);
					}
					elseif($_REQUEST['id']=='155')
					{
						$title_tag_1 = $tex1[0].'-'.$tex3[1];
						$title_tag = $title_tag_1;
					}
					elseif($_REQUEST['id']=='381')
					{
						$title_tag_1 = $tex1[0].'-'.$tex3[1];
						$title_tag = $title_tag_1;
					}
					elseif($_REQUEST['id']=='273')
					{
						$title_tag_1 = $tex1[0].'-'.$tex3[1];
						$title_tag = $title_tag_1;
					}
					else
					{
						$title_tag_1 = $tex1[0].'-'.$tex3[1];
						$title_tag = str_replace("Beach","",$title_tag_1);
					}
				}
				
				
			}
		}
		else
		{
			$title_tag = "Luxury Villas For Rent, Thailand | Inspiring Villas";
			$meta_description1 = "Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";
			$meta_description = string_len_meta($meta_description1,150);
		}
	}
}
elseif($ppa=='forrent')
{
	$h1=/*'-1-1-1'.*/"Luxury Private Villa Rentals in Thailand";// - Koh Samui & Phuket";;
	if($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
	{
		if(isset($_REQUEST['cate']) && $_REQUEST['cate']!='')
		{
			$cate = $dbc->GetRecord("categories","*","id=".$_REQUEST['cate']);
			$catename = $cate['meta_title'];
			$descate = $cate['meta_des'];//base64_decode($cate['detail'],true);
			
			$title_tag =/* '000'.*/$catename;
			$meta_description = $descate;
		}
		else
		{
			$title_tag = /*'111'.*/"Luxury Villa Rentals in Thailand";// - Koh Samui & Phuket";
			$meta_description = "";//"Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";
		}
	}
	elseif($ppa=='forrent' && isset($_REQUEST['cate']) )
	{
		$title_tag = /*'222'.*/"Luxury Villa Rentals in Thailand";// - Koh Samui & Phuket";
		$meta_description = "";//"Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";
	}
	else
	{
		$title_tag = /*'333'.*/"Luxury Villa Rentals in Thailand";// - Koh Samui & Phuket";
		$meta_description = "";//"Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";
	}
		
		if(isset($_REQUEST['des']) || isset($_REQUEST['sub'])  || isset($_REQUEST['room']))
		{	
				///?page=forrent& des=all & sub=83 & pri=all & room=all & cate=6 & sort=all
				///?page=forrent& des=all & sub=all & pri=all & room=all & cate=0 & sort=all
				
				
				if(isset($_REQUEST['des']) && $_REQUEST['des']!='all')
				{
					$destination_me = $dbc->GetRecord("destinations","*","id = '".$_REQUEST['des']."'");
					$destination_meta = $destination_me['name'];
					$des_meta = "in ".$destination_me['name'];
					$desti_meta = $destination_me['name'];
					$desn_meta = $destination_me['name']."";
					$h1_destination = $destination_me['name']." ";
				}
				else
				{
                    $destination_meta = _COUNTRY_NAME;
                    $h1_destination = _COUNTRY_NAME . " ";
                    $des_meta = "";
                    $desti_meta = "";
                    $desn_meta = _COUNTRY_NAME;
				}
				
				if(isset($_REQUEST['sub']) && $_REQUEST['sub']!='all')
				{
					$beach_me = $dbc->GetRecord("destinations","*","id = '".$_REQUEST['sub']."'");
					$bex = explode(",",$beach_me['name']);
					$beach_meta = $bex[0].", ";
					$h1_beach = $bex[0]." ";
					$beach_det_meta = $bex[0]."";
					$beach_det = $bex[0]."";
					
					/*if($_REQUEST['des']=='all')
					{
						$beach_h2 = "Thailand";
					}
					else
					{*/
						$beach_h2 = $bex[0];
						$title_beach = str_ireplace('Beach','',$bex[0]);//$bex[0];//
						
						//$title_beach = str_ireplace(' ','',$title_tx);
						
					/*}*/
				}
				else
				{
					$h1_beach = "";
					$title_beach = "";
					$beach_meta = "";
					$beach_det_meta = "";
					$beach_det = "";
					
					if($_REQUEST['des']=='all')
					{
						$beach_h2 = "Thailand";
					}
					else
					{
						$beach_h2 = $desn_meta;
					}
					
				}
				
				if(isset($_REQUEST['room']) && $_REQUEST['room']!='all')
				{
					$bed_meta = $dbc->GetRecord("bedroom","*","id = '".$_REQUEST['room']."'");
					//$room_meta = $bed_meta['name']." ";
					$room_det_meta = $bed_meta['name']." ";
					
					switch($bed_meta['id'])
					{
						case "1":
							$h1_room = "2,3,4 Bedroom ";
							$room_meta = "2,3,4 Bedroom";
							//$room_name = "1-4 Bedroom";
							$room_name = "2,3,4 Bedroom";
							$title_room_name = "2,3,4 Bedroom ";
							//$h2_room = " 1-4 Bedroom";
							$h2_room = " 2,3,4 Bedroom";
						break;
						case "2":
							$h1_room = "5,6,7 Bedroom ";
							$room_meta = "5,6,7 Bedroom";
							//$room_name = "5-7 Bedroom";
							$room_name = "5,6,7 Bedroom";
							$title_room_name = "5,6,7 Bedroom ";
							//$h2_room = " 5-7 Bedroom";
							$h2_room = " 5,6,7 Bedroom";
						break;
						case "3":
							$h1_room = "8,9,10> Bedroom ";
							$room_meta = "8,9,10> Bedroom";
							//$room_name = "8-10 Bedroom";
							$room_name = "8,9,10> Bedroom";
							$title_room_name = "8,9,10> Bedroom ";
							//$h2_room = " 8-10 Bedroom";
							$h2_room = " 8,9,10> Bedroom";
							
							/*$h1_room = "8,9,10 Bedroom ";
							$room_meta = "8,9,10 Bedroom";
							//$room_name = "8-10 Bedroom";
							$room_name = "8,9,10 Bedroom";
							$title_room_name = "8,9,10 Bedroom ";
							//$h2_room = " 8-10 Bedroom";
							$h2_room = " 8,9,10 Bedroom";*/
						break;
						case "4":
							$h1_room = "> 10 Bedroom ";
							$room_meta = "> 10 Bedroom ";
							$room_name = "> 10 Bedroom ";
							$title_room_name = "> 10 Bedroom" ;
							$h2_room = " > 10 Bedroom ";
						break;
						default:
					}
				}
				else
				{
					$room_meta = "";
					$title_room_name = "";
					$h2_room = "";
					$luxury = 'Luxury ';
				}
				
				if(isset($_REQUEST['pri']) && $_REQUEST['pri']!='all')
				{
					if($_REQUEST['pri']==2)
					{
						$price = "< USD1000";
					}
					elseif($_REQUEST['pri']==3)
					{
						$price = "> USD1000";
					}
					else
					{
						$price = "";
					}
				}
				
				if($_REQUEST['cate']!=0)
				{
					$coll_meta = $dbc->GetRecord("categories","*","id = '".$_REQUEST['cate']."'");
					$cnam = $coll_meta['name'];
					if($_REQUEST['cate']==5)
					{
						$cexx = explode(" ",$coll_meta['name']);
						$cex = $cexx[0].' '.$cexx[1];
					}
					else
					{
						$cexx = explode(" ",$coll_meta['name']);
						$cex = $cexx[0];
					}
					$coll = $cex.' ';
				}
				else
				{
					$coll = "";
				}
				
				
				
				if($title_beach!='')
				{
					$title_des = '';
				}
				else
				{
					$title_des = $destination_meta.' ';
				}
				//$title_tag = $title_beach.' '.$title_des.$title_room_name.' '.$coll.' '.$luxury." Private Pool Villa Rentals";
				
				
				if($_REQUEST['sub']==75)
				{
					//$title_tag = 'Miskawaan Luxury Beachfront Villas in Koh Samui, Thailand';
					//$title_tag = 'Miskawaan Luxury Beachfront Villas in Koh Samui, Thailand';
					$title_tag = $title_beach.' Villas'.$title_des." | Luxury Holiday Rentals ".$destination_meta.$iv;
				}
				elseif($_REQUEST['sub']==59)
				{
					$title_tag = "Bang Tao Villas".$title_des." | Luxury Holiday Rentals ".$destination_meta;
				}
				else
				{
					// title
					//$title_tag = $title_beach.$title_des.$title_room_name.$coll."Villas ".$luxury."Rentals";
					/*echo "<pre><br><br><br><br><br><br><br><br><br><br>";
						echo $_REQUEST['des'].']---['.$_REQUEST['sub'].']---['.$_REQUEST['room'].']---['.$_REQUEST['cate'];
					echo "</pre>";*/
					if($_REQUEST['des']=='all' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all')
					{
						//$title_tag = $title_des."Villa Rentals - ".$luxury."Villas for Rent";
						$title_tag = _COUNTRY_NAME. " Luxury Villas Rental".$iv;//$title_des.$coll."Villa Rentals | ".$luxury."Holiday Villas";//--------------all search
					}
					elseif($_REQUEST['des']=='38' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all')
					{
						//$title_tag = $title_des."Villa Rentals - ".$luxury."Villas for Rent";
						if($_REQUEST['cate']==6)// beachfront
						{
							$title_tag = $title_des."Luxury ".$coll."Villas";// - ".$luxury."Holiday Villas";
						}
						elseif($_REQUEST['cate']==8)// wedding
						{
							$title_tag = $title_des."".$coll."Villas".$iv;// - ".$luxury."Holiday Villas";
							//$title_tag = $title_des."Luxury ".$coll."Villas-----".$iv;// - ".$luxury."Holiday Villas";
						}
						elseif($_REQUEST['cate']==0)
						{
							$title_tag = $title_des.$coll."Villa Rentals | ".$luxury."Holiday Villas";
						}
						else
						{
							$title_tag = $title_des.$coll."Villa Rentals";// - ".$luxury."Holiday Villas";
						}
						//$title_tag = $title_des.$coll."Villa Rentals - ".$luxury."Holiday Villas";
					}
					elseif($_REQUEST['des']=='39' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all')
					{
						//$title_tag = $title_des."Villa Rentals - ".$luxury."Villas for Rent";
						if($_REQUEST['cate']==6) //Koh Samui Beachfront Villa Rentals
						{
							$title_tag = $title_des."Beachfront Villa Rentals".$iv;// - ".$luxury."Holiday Villas";
						}
						elseif($_REQUEST['cate']==0)
						{
							if(in_array($link_url_title,$array_link_5))
							{
								//$title_tag = "------------Koh Samui Luxury Villas Rental";
								$title_tag = $title_des.$coll."Villa Rentals | ".$luxury."Holiday Villas";
							}
							else
							{
								$title_tag = $title_des.$coll."Villa Rentals | ".$luxury."Holiday Villas";
							}
							
						}
						else
						{
							$title_tag = $title_des.$coll."Villa Rentals";// - ".$luxury."Holiday Villas";
						}
						
					}
					else
					{
						//$title_tag = $title_beach.$title_des.$title_room_name.$coll." Villa ".$luxury."Rentals";
						if($_REQUEST['des']!='all' && $_REQUEST['sub']!='all' && $_REQUEST['room']=='all' && $_REQUEST['cate']==0)
						{
							if(strrchr($bex[0],'Beach'))
							{
								//echo '--yes--'.strrchr($bex[0],'Beach');
								if(strrchr($bex[0],'Beach')=='Bay' || strrchr($bex[0],'Beach')=='Bophut' )
								{
									$title_tag = $title_beach.' Villas'.$title_des." | Luxury Holiday Rentals in Bophut";//.$destination_meta;//" Villa ".$luxury."Rentals";
								}
								else
								{
									if($_REQUEST['sub']==74)
									{
										$title_tag = $title_beach.'Villas'.$title_des." | Luxury Holiday Rentals in ".$title_beach;//.'- InspiringVillas.com';//" Villa ".$luxury."Rentals";
									}
									else
									{
										$title_tag = $title_beach.'Villas'.$title_des." | Luxury Holiday Rentals in ".$title_beach;//" Villa ".$luxury."Rentals";
									}
									
									//-----old----$title_tag = $title_beach.'Villas'.$title_des." | Luxury Holiday Rentals ".$destination_meta;//" Villa ".$luxury."Rentals";
								}
							}
							else
							{
								//echo '--NOOOOOO--'.strrchr($bex[0],'Beach');
								$title_tag = $title_beach.' Villas'.$title_des." | Luxury Holiday Rentals ".$destination_meta;//" Villa ".$luxury."Rentals";
							}
							
						}
						else
						{
							if($_REQUEST['des']!='all' && $_REQUEST['sub']!='all')
							{
								$title_tag = $title_room_name.$coll."Villas ".$title_beach;//.' '. ".$luxury."Rentals-00000";
							}
							else
							{
								if($_REQUEST['des']!='all' && $_REQUEST['room']!=0 && $_REQUEST['cate']=='0') // the best
								{
									if($_REQUEST['des']==39)
									{
										$title_tag = "The Best ".$title_room_name.$coll."Villas in ".$title_beach.$title_des;//.'- InspiringVillas.com';//.''. ".$luxury."Rentals-1111";
									}
									else
									{
										$title_tag = "The Best ".$title_room_name.$coll."Villas in ".$title_beach.$title_des;//.''. ".$luxury."Rentals-1111";
									}
								}
								elseif($_REQUEST['des']=='all' && $_REQUEST['room']!=0 && $_REQUEST['cate']=='0')
								{
									$title_tag = "The Best ".$title_room_name.$coll."Villas in ".$title_beach.$title_des;//.''. ".$luxury."Rentals-1111";
								}
								else
								{
									$title_tag = $title_room_name.$coll."Villas ".$title_beach.$title_des;//.''. ".$luxury."Rentals-1111";
								}
								
							}
						}
					}
				}
				 
				
				
				if($h1_beach!='')
				{
					if($_REQUEST['sub']==75)
					{
						//$h1 = 'Miskawaan Luxury Villa Rentals | Maenam, Koh Samui';
						if(in_array($link_url_title,$array_link_4))/// Beachfront Villas for Rent
						{
							$hi_beach = str_ireplace('Beach','',$h1_beach);
							$hi_beach_2 = str_ireplace(' ','',$hi_beach);
							$h1 = $hi_beach_2.' Villas for Rent';
						}
						else
						{
							$h1 = 'Maenam Luxury Villas for Rent';//$h1 = $h1_beach.$h1_room.'Luxury '.$coll.'Villas for Rent';
						}
						
					}
					else
					{
						if(in_array($link_url_title,$array_link_4))/// Beachfront Villas for Rent
						{
							$hi_beach = str_ireplace('Beach','',$h1_beach);
							$hi_beach_2 = str_ireplace(' ','',$hi_beach);
							$h1 = $hi_beach_2.' Villas for Rent';
						}
						else
						{
							$h1 = $h1_beach.$h1_room.'Luxury '.$coll.'Villas for Rent';
						}
						
					}
					
				}
				else
				{
					if($_REQUEST['room']!='all')
					{
						$h1 = $h1_destination.$h1_room.' '.$coll.'Villas for Rent';
					}
					else
					{
						if(in_array($link_url_title,$array_link))/// Beachfront Villas for Rent
						{
							$h1 = 'Luxury Beachfront Villas Phuket';//'Beachfront Villas Phuket';
						}
						elseif(in_array($link_url_title,$array_link_2))/// Beachfront Villas for Rent
						{
							$h1 = 'Luxury Beach Villas Thailand';
						}
						elseif(in_array($link_url_title,$array_link_3))/// Beachfront Villas for Rent
						{
							$h1 = 'Beachfront Villas Koh Samui';
						}
						elseif(in_array($link_url_title,$array_link_6))/// Beachfront Villas for Rent
						{
							$h1 = "Phuket Luxury Wedding Villas";//$h1_destination.$h1_room.'Luxury '.$coll.'Villas for Rent-------';
						}
						elseif(in_array($link_url_title,$array_link_7))/// Beachfront Villas for Rent
						{
							$h1 = "Thailand Luxury Wedding Villas";//$h1_destination.$h1_room.'Luxury '.$coll.'Villas for Rent-------';
						}
						elseif(in_array($link_url_title,$array_link_8))/// Beachfront Villas for Rent
						{
							$h1 = "Koh Samui Wedding Luxury Villas";//$h1_destination.$h1_room.'Luxury '.$coll.'Villas for Rent-------';
						}
						else
						{
							$h1 = $h1_destination.$h1_room.'Luxury '.$coll.'Villas for Rent';
						}
						
					}
					
				}
				
				
				//$title_tag = $room_meta.$beach_meta.$destination_meta." Luxury Private Pool Villa Rentals";
				
				$title_name = /*$room_det_meta*/$room_meta.$h1_beach.$destination_meta." Luxury Private Villa Rentals";
	
		}
	
	/*else
	{	
		
	}*/
	
	
	if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 )
	{
		if($_REQUEST['des']=='all' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all' && $_REQUEST['cate']!=0 )
		{
			if($_REQUEST['cate']==2)
			{
				//party-villas
				$title_tag = "Thailand Party Villa Rentals";/*'555'.*///"Party Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Luxury Party Pool Villas for your perfect celebration holiday in Phuket & Koh Samui, Thailand. Book Your Private Pool Villa Today with Inspiring Villas";//"Luxury party villa collection for your perfect celebration holiday in Phuket & Koh Samui, Thailand. Book Your Private Villa Today with Inspiring Villas";
			}
			elseif($_REQUEST['cate']==3)
			{
				//family-villas
				$title_tag = "Thailand Family Villa Rentals";/*'666'.*///"Family Villas for Rent in Phuket & Koh Samui, Thailand";//"Luxury Garden Private Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Easy access luxury garden villas in Phuket & Koh Samui, Thailand. Book Your Private Villa Holiday Today with Inspiring Villas.All person access convenient.";//"Easy access luxury garden villas in Phuket & Koh Samui, Thailand. Book Your Private Villa Holiday Today with Inspiring Villas.All person access convenient.";
			}
			elseif($_REQUEST['cate']==4)
			{
				//sea-view-villas
				$title_tag = "Thailand Seaview Villa Rentals";/*'777'.*///"Seaview Luxury Villa Rentals in Phuket & Koh Samui, Thailand";//"Seaview Private Pool Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Seaview Luxury Villa Rentals for the perfect holiday in Phuket & Koh Samui, Thailand. Book Your Luxury Seaview Villa Holiday Today with Inspiring Villas";//"Luxury sea view villa collection for your perfect holiday in Phuket & Koh Samui, Thailand. Book Your Private Villa Escape Today with Inspiring Villas";
			}
			elseif($_REQUEST['cate']==5)
			{
				//Large-group-villas
				$title_tag = "Thailand Large Group Villa Rentals";/*'888'.*///"Large Groups Villas for Rent in Phuket & Koh Samui";//"Large Group Private Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Large groups, events & corporate retreats catered in private villa complexes in Phuket & Koh Samui, Thailand.Group Inquiry Contact with Inspiring Villas";//"Large groups & corporate retreats catered in private villa complexes in Phuket & Koh Samui, Thailand. Make your Group Booking Today with Inspiring Villas";
			}
			elseif($_REQUEST['cate']==6)
			{
				//beach-front-villas
				$title_tag = "Thailand Beachfront Villa Rentals".$iv;/*'999'.*///"Beachfront Luxury Villa Rentals in Phuket & Koh Samui, Thailand";//"BeachFront Private Pool Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Luxury Beachfront Villas for rent for your perfect holiday in Phuket & Koh Samui, Thailand. Book Your Beachfront Villa Holiday Today with Inspiring Villas";//"Luxury beach front villa collection for your perfect holiday in Phuket & Koh Samui, Thailand. Book Your Private Villa Escape Today with Inspiring Villas";
			}
			elseif($_REQUEST['cate']==8)
			{
				//wedding-villas
				$title_tag = "Thailand Wedding Villas";/*'101010'.*///"Wedding Luxury Villas in Phuket & Koh Samui";//"Wedding  Private Villa Rentals in Thailand";// - Koh Samui & Phuket";
				$meta_description = "Wedding of your Dreams with concierge planning at a luxury villa in Phuket & Koh Samui, Thailand. Book Your Private Villa Wedding with Inspiring Villas";//"Wedding of your Dreams with concierge planning at a luxury villa in Phuket & Koh Samui, Thailand. Book Your Private Villa Wedding with Inspiring Villas";
			}
			else
			{
			}
		}
		//elseif($_REQUEST['des']=='38' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all' && $_REQUEST['cate']!=0)
//		{
//			if($_REQUEST['cate']==8)
//			{
//				//wedding-villas
//				$title_tag = "Thailand Wedding Villa Rentals".$iv;/*'101010'.*///"Wedding Luxury Villas in Phuket & Koh Samui";//"Wedding  Private Villa Rentals in Thailand";// - Koh Samui & Phuket";
//				$meta_description = "Phuket is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of Wedding  villas for rent ...";
//				//$desc_meta = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of'.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
//				//$meta_description = "Wedding of your Dreams with concierge planning at a luxury villa in Phuket & Koh Samui, Thailand. Book Your Private Villa Wedding with Inspiring Villas";//"Wedding of your Dreams with concierge planning at a luxury villa in Phuket & Koh Samui, Thailand. Book Your Private Villa Wedding with Inspiring Villas";
//			}
//		}
		else
		{
			/*$title_tag = '11-11-11'."Luxury Private Pool Villa Rentals in Thailand - Koh Samui & Phuket";
			$meta_description = "Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";*/
			
					//---- new meta description---------------------------
					if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
					{
						$cate = $dbc->GetRecord("categories","*","id=".$_REQUEST['cate']);
						$cname = $cate['name'];
						$desc_meta = base64_decode($cate['detail'],true);
					}
					elseif($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
					{
					 $desc_meta = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
					}
					else
					{
						$beac = ($title_beach!='')?'Beach':'';
						if($_REQUEST['des']=='all') // ไม่ได้เลือกอะไร
						{
							$cname = $h1;//$meta_h1;
							if($_REQUEST['sub']=='all') // ไม่ได้เลือกอะไร
							{
								// ok check
								$desc_meta = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of'.$coll.$h2_room.'villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
							}
							else // กล่องแรกไม่ได้เลือกอะไร  กลอ่ง 2 เลือก
							{
								// ok check not 
								$desc_meta = $beach_det.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
							}
						}
						else // กล่องแรกมีการเลือก
						{
							$cname = $h1;//$title_name;
							if($_REQUEST['sub']=='all') // กล่องแรกมีการเลือก กล่อง 2 ไม่ได้เลือก
							{
								// ok check
								$desc_meta = $desti_meta.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
							}
							else // กล่องแรกมีการเลือก กล่อง 2 เลือก
							{
								// ok check 2
								$desc_meta = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
							}
						}
						
					}
					$meta_ex = explode("to",$desc_meta);
					if($_REQUEST['sub']==75)
					{
						$meta_description = 'Miskawaan Luxury Beachfront Villas is the most popular villa holiday destination in Koh Samui.A great choice of luxury villas for rent. Book Today with Inspiring Villas.';
					}
					else
					{
						$meta_description = $meta_ex[0].'...';
					}
					//$meta_description = $meta_ex[0].'...';

		}
	}
	else
	{
		
		//---- new meta description---------------------------
		if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
		{
			$cate = $dbc->GetRecord("categories","*","id=".$_REQUEST['cate']);
			$cname = $cate['name'];
			$desc_meta = base64_decode($cate['detail'],true);
		}
		elseif($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
		{
		 $desc_meta = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
		
		}
		else
		{
			$beac = ($title_beach!='')?'Beach':'';
			if($_REQUEST['des']=='all') // ไม่ได้เลือกอะไร
			{
				$cname = $h1;//$meta_h1;
				if($_REQUEST['sub']=='all') // ไม่ได้เลือกอะไร
				{
					// ok check
					$desc_meta = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of'.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
				}
				else // กล่องแรกไม่ได้เลือกอะไร  กลอ่ง 2 เลือก
				{
					// ok check notnotnotnotnotnotnotnotnotnotnotnotnotnotnotnot 
					$desc_meta = $beach_det.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
				}
			}
			else // กล่องแรกมีการเลือก
			{
				$cname = $h1;//$title_name;
				if($_REQUEST['sub']=='all') // กล่องแรกมีการเลือก กล่อง 2 ไม่ได้เลือก
				{
					// ok check 2
					$desc_meta = $desti_meta.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of'.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
				}
				else // กล่องแรกมีการเลือก กล่อง 2 เลือก
				{
					// ok check
					$desc_meta = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of'.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villas for rent in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
				}
			}
			
		}
		$meta_ex = explode("to",$desc_meta);
		if($_REQUEST['sub']==75)
		{
			$meta_description = 'Miskawaan Luxury Beachfront Villas is the most popular villa holiday destination in Koh Samui.A great choice of luxury villas for rent. Book Today with Inspiring Villas.';
		}
		else
		{
			$meta_description = $meta_ex[0].'...';
		}
		
		?>
			
			<?php /*?><br class="web">
			<!--<br>	<?php echo $title_tag;?><br>-->
			<center><h1 class="mg-sec-titles web"  style="margin-top: 10px;"><?php echo $cname;?></h1>
			
			
			<p class="web desct"><?php echo $meta_description;  echo 'luxury >'.$coll.'<>'.$h2_room.'< villas';?></p></center><?php */?>
			<?php
		
	}

}

else
{
			$title_tag = /*'12-12-12'.*/"Luxury Villa Rentals in Thailand | Koh Samui & Phuket";
			$h1='Luxury Private Villa Rentals in Thailand - Koh Samui & Phuket';
			$meta_description = "Rent our luxury private villas with full serviced staff and personal concierge in Phuket & Koh Samui, Thailand. Book Your Holiday Today with Inspiring Villas";
}


if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
{
	$h2='';
	switch($_REQUEST['cate'])
	{
		case "2":
			//return "Party Villa";
			$h2	= "All Party Luxury Villas For Rent in Thailand";
		break;
		case "3":
			//return "Family Villas";
			$h2	= "All Garden Luxury Villas for Rent in Thailand";
		break;
		case "4":
			//return "Seaview Villas";
			$h2	= "All Seaview Luxury Villas For Rent in Thailand";
		break;
		case "5":
			//return "Large Group Villas";
			$h2	= "All Large Group Luxury Villas for Rent in Thailand";
		break;
		case "6":
			//return "Beachfront Villas";
			$h2	= "All Beachfront Luxury Villas For Rent in Thailand";
		break;
		case "8":
			//return "Wedding Villas";
			$h2	= "All Wedding Luxury Villas For Rent in Thailand";
		break;
		default:
	}
	$textH2 = $h2;
}
elseif($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
{
	$textH2 = "Discover Luxury Villas For Rent";
}
else
{
	if($_REQUEST['sub']==75)
	{
		$textH2 = /*'All '.$price.' '.*/$room_name.' '.$coll.' Luxury Villas Miskawaan';
	}
	else
	{
		$textH2 = /*'All '.$price.' '.*/$room_name.' '.$coll.' Luxury Villas '.$beach_h2;
	}
	
}

// SEO metatag tool overrides rules from above
if($ppa=='forrent' && count($metatag_array) > 0)
{

    $title_tag = $metatag_array[0];
    $meta_description = $metatag_array[1];
    $h1 = $metatag_array[2];            
    $h2 = $metatag_array[3]; 
    
}


function string_len_meta($text,$amount)
{
	if(strlen($text)>$amount)
	{
		return substr($text,0,$amount).'...';
	}
	else
	{
		return $text;
	}
}
?>