<?php
if($c==1)
{
	$c=0;
	$pading_grid = 'padleft15-';
	//echo 'yyyyyyyyyy';
}
else
{
	$c=1;
	$pading_grid = 'padright15-';
	//echo 'zzzzzzzzzz';
}

echo '<div class="col-xs-12 col-sm-6 col-md-4 web '.$pading_grid.' ">';//<a href="?page=blogdetail&blog='.$r_blog['id'].'">
	echo '<span  >';//itemscope itemtype="http://schema.org/Product"
	
		echo '<div class="col-md-12 boxpho nopad">';
			if($row['tag']!=0)
			{
				echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
			}
			echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img src="'.$photo[0]['img'].'" width="100%"></a>';//itemprop="image" 
		echo '</div>';
		echo '<div class="col-xs-12 col-sm-12 col-md-12 boxbot_b nopad" style="border-bottom: 2px solid #102845;">';
			echo '<div class="col-xs-12 col-sm-12 col-md-12  borbo nopad">';
				echo '<div class="col-xs-12 col-sm-12 col-md-8 t_t33 nopad">';
					echo '<h2 class="btitle f17" ><span >'.$name[0].'</span></h2>'; //itemprop="name"
				echo '</div>';
				echo '<div class="col-xs-12 col-sm-12 col-md-4 t_t44 web992 nopad text-right" style="font-size:14px;margin-top: 22px;">';
					echo $row['bedroom_range']; 
				echo '</div>';
			echo '</div>';
			
			echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad">';
				echo '<div class="col-sm-12 col-md-12 nopad t_t11" style="font-size: 14px;">';
					echo '<div class="col-sm-6 col-md-6 nopad t_t11" >';
						echo '<image  data-src="/upload/location.svg" width="20"  class="micon- lazy" style="float:left;margin-right: -10px;" />';
						echo '<div class="f13 ic_name_g1">&nbsp;&nbsp;'.$villa_location.'</div>';
					echo '</div>';
					echo '<div class="col-sm-6 col-md-6 nopad t_t22" >';
					if($row['cate_icon']!='')
					{
						if($icon_cate == "seas")
						{
							//echo '<div class="col-xs-1 nopad">';
							echo '<img data-src="/upload/'.$icon_cate.'.svg"  width="20" class="micon- lazy " style="width: 30px !important;height: 26px;margin-left: -5px; float:left;margin-right: -5px;margin-top: -5px;">';
							//echo '</div>';
							$luxu = "";//"Luxury ";
						}
						else
						{
							//echo '<div class="col-xs-1 nopad">';
							echo '<image  data-src="/upload/'.$icon_cate.'.svg" width="20"  class="micon- lazy " style="float:left;margin-right: -5px; " />';
							//echo '</div>';
							$luxu = "";
						}
						echo '<div class=" ic_name_g1  f13">&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
					}
					else
					{
					}
					echo '</div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t11 top10">';
						echo '<span >';//itemprop="description"
							echo string_len(base64_decode($row['short_det'],true),125);
						echo '</span>';
					echo '</div>';
				echo '</div>';
				echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad web992 t_t22 top10 text-right">';
					echo '<span  style="font-size: 12px;      margin-right: 10px;">FROM </span>';
					//echo '<span class="mob992"  style="font-size: 12px;    float: right;    padding-left: 30px;">'.$rev.' Reviews</span><br>';
					echo '<span style="font-size: 23px;margin-top:50px;    color: #f05b46;"><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($row['price']).'</span>';
					echo '<span style="font-size: 12px;">++ /NT</span>';
				echo '</div>';
				echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad">';
					echo '<div class="col-xs-5 col-sm-5 col-md-4 nopad mob992 t_t22 " style="height:50px;padding-top: 15px;">';
						echo '<span class="mob992"  style="font-size: 14px;     ">'.$rev.' Reviews</span><br>';
					echo '</div>';
					echo '<div class="col-xs-7 col-sm-7 col-md-4 nopad mob992 t_t33 text-right" style="padding-top: 15px;">';
						echo '<span  style="font-size: 12px;       padding-right: 20px;">FROM </span>';
						echo '<span style="font-size: 32px;margin-top:50px;    color: #f05b46;"><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($row['price']).'</span>';
						echo '<span style="font-size: 12px;">++ /NT</span>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		//echo '<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span></span>';
	echo '</span>';
echo '</div>';



?>
<?php /*?><span class="hidden" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" style="color:#f05b46;">
Price Range 
<span itemprop="priceCurrency" content="USD">$</span><span itemprop="lowPrice" content="<?php echo $row['pmin'];?>"><?php echo $row['pmin'];?></span>
-
<span itemprop="priceCurrency" content="USD">$</span><span itemprop="highPrice" content="<?php echo $row['pmax'];?>"><?php echo $row['pmax'];?></span> / night
</span><?php */?>
<?php



//array_push($ar_photo,"https://www.inspiringvillas.com".$photo[0]['img']);
//                                                            
//                                                            $ar_url[] = array(
//                                                              "@type" => "ListItem",
//                                                              "name" => $name[0],
//                                                              "image" => "https://www.inspiringvillas.com".$photo[0]['img'],
//                                                              "position" => $zz,
//                                                              "url" => "https://www.inspiringvillas.com/".$row['ht_link'].".html",
//                                                              /*"author"=> array(
//                                                                "@type" => "Person",
//                                                                "name" => "Inspiring Villas"
//                                                              ),*/
//                                                            );
//                                                            
//                                                            $ar_url_2[] = array(
//                                                              "@context" => "http://schema.org/",
//                                                              "@type" => "Recipe",
//                                                              "name" => $name[0],
//                                                              "image" => "https://www.inspiringvillas.com".$photo[0]['img'],
//                                                              "position" => $zz,
//                                                              "url" => "https://www.inspiringvillas.com/".$row['ht_link'].".html",
//                                                              "author"=> array(
//                                                                "@type" => "Person",
//                                                                "name" => "Inspiring Villas"
//                                                              ),
//                                                            );
			

echo '<div class="mg-avl-room mob '.$padd_1.'1 '.$paddbutt.'1 " ><span  >';//itemscope itemtype="http://schema.org/Product"
	//echo '<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span></span>';
		echo '<div class="row">';//echo $row['id'];
			//--------------------------web-----------------------------
			echo '<div class="col-xs-12 col-sm-12 col-md-4 mob">';
			if($row['tag']!=0)
			{
				echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
			}
				echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
				//echo slide_photo($photo,$row['id']);
				if($zz==1)
				{
					echo '<img  src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive" width="100%"></a>';//itemprop="image"
				}
				else
				{
					echo '<img data-src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive lazy" width="100%"></a>';//itemprop="image" 
				}
			
			//array_push($ar_url,"https://www.inspiringvillas.com/".$row['ht_link'].'.html');
			
			echo '<img src="'.imagePath($photo[0]['img']).'" alt="" class="img-responsive " width="100%" style="display:none;">';//itemprop="image" 
				
			echo '</div>';
			//--------------------------web-----------------------------
			
			
			
			//--------------------------mob-----------------------------
			echo '<div class="col-xs-12 col-sm-12 col-md-6 mob top10">';
				//echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
				//echo '</div>';
				echo '<div class="gray_mob ">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 padleft25 padright25 t_t11">';
							echo '<h3 class=" font_mob top0"><a class="fbk" href="/'.$row['ht_link'].'.html" ><span><strong>'.$name[0].' </strong></span></a></h3>';// itemprop="name"
							echo '<div  class="top10 tb f15t "><span  class="pt">'.base64_decode($row['short_det']).'</span></div>';//f13 itemprop="description"
							echo '</div>';
							//echo '<div class="col-xs-12 col-sm-12 col-md-12 padleft25 top10 t_t41">';
							echo '<div class="col-xs-7 col-sm-6 col-md-6 padleft25 top10 t_t11">';
								echo '<ul>';
									echo '<li class="pdmb">';
										//echo '<svg width="30" height="30" style="padding-left: 5px;">';
//                                                                                            echo '<image xlink:href="/upload/location.svg" src="/upload/location.svg"  class="micon" style="width: 20px !important;" />';
//                                                                                        echo '</svg>';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										//echo '<div class="ic_name">&nbsp;&nbsp;'.$full_location.'</div>';
										echo '<div class="ic_name f13">&nbsp;'.$full_location.'</div>';
									echo '</li>';
									if($row['cate_icon']!='')
									{
										echo '<li class="pdmb">';
											/*echo '<svg width="30" height="30">';
												echo '<image xlink:href="/upload/'.$icon_cate.'.svg"  class="micon" />';
											echo '</svg>';*/
											if($icon_cate == "seas")
											{
												echo '<image data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 34px !important;height: 37px;margin-left: -5px;background: #ffcdcd00;margin-top: -8px;margin-bottom: -1px !important;" />';
												$luxu_mo = "Luxury ";
											}
											else
											{
												echo '<image data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
												$luxu_mo = "";
											}
											echo '<div class="ic_name f13">&nbsp;'.$luxu_mo.''.$icon_name.'</div>';//'.str_ireplace('Villas','Villa',$catename[0]).'
										echo '</li>';
									}
								echo '</ul>';
							echo '</div>';
							echo '<div class="col-xs-5 col-sm-6 col-md-6 padleft251 top10 t_t22">';
								echo '<ul>';
									echo '<li class="pdmb">';
										//echo '<svg width="30" height="30">';
//                                                                                            echo '<image xlink:href="/upload/bed.svg"  class="micon" />';
//                                                                                        echo '</svg>';
										echo '<image data-src="/upload/bed.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['bedroom_range'].'</div>';
									echo '</li>';
									echo '<li class="pdmb">';
										//echo '<svg width="30" height="30">';
//                                                                                            echo '<image xlink:href="/upload/team.svg"  class="micon" />';
//                                                                                        echo '</svg>';
										echo '<image data-src="/upload/team.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['adults'].' Guests</div>';
									echo '</li>';
								echo '</ul>';
							echo '</div>';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 t_price  t_t21">';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 text-center padleft top20 bottom51 t_t31">';
								echo '<div class="text-right text_price tp2">From <span class="inprice ">$'.number_format($row['pmin']).'</span> /Night</div>';
								//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_detail" target="_blank">View Details</button></a>';
							echo '</div>';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 text-center padright top20 bottom51 t_t31">';
								
								echo '<a href="/'.$row['ht_link'].'.html"  target="_blank"><button class="btn_villa_2 " target="_blank">View Details</button></a>';
								//echo '<a href="/'.$row['ht_link'].'.html"  target="_blank"><button class="btn_villa btn_enquire" target="_blank">Enquire Now</button></a>';
								?><?php /*?><button class="btn_villa btn_enquire" type="button" onClick="pop_enquiry('<?php echo $row['id'];?>','<?php echo $name[0];?>');"> Enquire Now</button><?php */?><?php
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
					//echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t3">';
//                                                                        echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
//                                                                    echo '</div>';
				echo '</div>';
			echo '</div>';
			//--------------------------mob-----------------------------
			
			
		echo '</div>';
	echo '</span></div>';
	?>