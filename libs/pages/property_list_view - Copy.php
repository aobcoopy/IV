<?php 
 if($photo[0]['name']=='')
{
	$img_tag = $name[0];
}
else
{
	$img_tag = $name[0].'- '.$photo[0]['name'];
}
/*$photo_link = $photo[0]['img'];

$aalink[] = array(
	'1' => '(image:image)',
	'2' => '***(image:loc)https://www.inspiringvillas.com'.$photo_link.'(/image:loc)',
	'3' => '(/image:image)'
);*/                                                

//echo $row['cate_icon'];
//echo '<!--room-->';
	echo '<div class="mg-avl-room '.$padd_1.'1 '.$paddbutt.'1 " ><span  >';//itemscope itemtype="http://schema.org/Product"
	//echo '<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span></span>';
		echo '<div class="row">';//echo $row['id'];
		
		echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t33 villa_boxs">';
		echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad villa_boxs_inside">';
			//--------------------------web-----------------------------
			echo '<div class="row">';
			echo '<div class="col-12 col-sm-5 col-md-4 nopad t_t22">';  //-------------cheange
			
			$exp_date = $row['tag_exp'];
			$D_today = date("Y-m-d");
			//echo $D_today.'--'.$exp_date;
			if($exp_date>=$D_today || $exp_date=='0000-00-00' || $exp_date=='')
			{
				//echo 'Yes';
				if($row['tag']!=0)
				{
					echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
				}
			}
			else
			{
				//echo 'Noooo';
			}
			
				echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
				//echo slide_photo($photo,$row['id']);
				if($zz==1)
				{
					echo '<img  src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen" width="100%"></a>';
					//echo '<img  src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen" width="100%"></a>';//itemprop="image"
				}
				else
				{   
					echo '<img data-src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy" width="100%"></a>';
					//echo '<img data-src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy" width="100%"></a>';
				}
			array_push($ar_photo,"https://www.inspiringvillas.com".imagePath($photo[0]['img']));
			
			$imgs = array();
			$i_i=0;
			foreach($photo as $i_photo)
			{
				if($i_i<5)
				{
					array_push($imgs,"https://www.inspiringvillas.com".$i_photo['img']);
					$i_i++;
				}
				//else
//																{
//																	$i_i=0;
//																}
				 
			}
			
			echo '<img  src="'.imagePath($photo[0]['img']).'" alt="" class="img-responsive " width="100%" style="display:none;">';//itemprop="image"
			
			echo '</div>';
			//------------------------------------------------------------------echo '';
			echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
			echo '<div class="col-xs-12 col-sm-7 col-md-8 web t_t33 v_details" style="margin-top:19px;">';  //-------------cheange
			
				echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t33">';
					echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t11"><h3 class="mg-avl-room-title vtitle f23_2"><span >'.$name[0].'</span></h3></div>';//'.$row['id'].'  //-------------cheange itemprop="name"
				echo '</div>';
				
				echo '<div  class="top20 tb t_t44 f18t- f17Desk- f15t " ><div class="indet"><span  style="font-family:pt !important">'.base64_decode($row['short_det']).'</span></div></div>';//itemprop="description"
				echo '<div class="gray_mob">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-7 col-md-5 top15 t_t11">';  //-------------cheange
							echo '<ul>';
								echo '<li style="margin-bottom: -2px;">';
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/location.svg"  class="micon lazy" style="width: 23px !important;"/>';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 23px !important;"/>';
									
									//echo '<div class="ic_name">&nbsp;&nbsp;'.$full_location.'</div>';
									echo '<div class="ic_name f15t f14ip" >&nbsp;&nbsp;'.$full_location.'</div>';
								echo '</li>';
								if($row['cate_icon']!='')
								{
								echo '<li>';
									/*echo '<svg width="30" height="30">';
										echo '<image xlink:href="/upload/'.$icon_cate.'.svg"  class="micon" />';
									echo '</svg>';*/
									if($icon_cate == "seas")
									{
										//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
										echo '<image  data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
										$luxu = "Luxury ";
									}
									else
									{
										//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
										echo '<image  data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
										$luxu = "";
									}
									
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
								echo '</li>';
								}
								else
								{
									//echo '-----';
								}
						echo '</ul>';
					echo '</div>';
					echo '<div class="col-xs-6 col-sm-5 col-md-3 top15 nopad t_t22">'; //-------------cheange
							echo '<ul>';
								echo '<li>';
									
									//echo '<image data-src="' . S3_BUCKET_URL . '/upload/bed.svg"  class="micon lazy" />';
									echo '<image data-src="/upload/bed.svg"  class="micon lazy" />';
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$row['bedroom_range'].'</div>';
									
									//echo '<br><br><div class="ic_name">&nbsp;&nbsp;'.$row['actualbed'].' Bedroom</div><br><br>';
								echo '</li>';
								echo '<li>';
									
									//echo '<image data-src="' . S3_BUCKET_URL . '/upload/team.svg"  class="micon lazy"/>';
									echo '<image data-src="/upload/team.svg"  class="micon lazy"/>';
									
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$row['adults'].' Guests</div>';
								echo '</li>';
							echo '</ul>';
						echo '</div>';
						
if($row['discount']!='')
{
$discount = '<div class="inside">From <del><span class="tx_discount_old">$'.number_format($row['pmin']).'</span></del><span class="inprice tx_discount">$'.number_format($row['discount']).'</span>/Night</div>';
}
else
{
$discount = '<div class="inside">From <span class="inprice">$'.number_format($row['pmin']).'</span> / Night</div>';
}
						
						echo '<div class="col-xs-6 col-sm-12 col-md-4 t_price text-right nopad t_t33">'; //-------------cheange
							echo '<div class="col-xs-12 col-sm-5 col-md-12 text-right nopad  tb t_t22">'.$discount.'</div>'; //-------------cheange
							echo '<div class="col-xs-12 col-sm-7 col-md-12  nopad top10 t_t31">'; //-------------cheange
								echo '<button class="btn_villa btn_detail" target="_blank">View Details</button>';
								//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_detail" target="_blank">View Details</button></a>';
							//echo '</div>';
//                                                                            echo '<div class="col-xs-6 col-sm-6 col-md-6  nopad t_t3">';
								echo '<button class="btn_villa btn_enquire" target="_blank">Enquire Now</button>';
								//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_enquire" target="_blank">Enquire Now</button></a>';
								?><?php /*?><button type="button" onClick="pop_enquiry('<?php echo $row['id'];?>','<?php echo $name[0];?>');" class="btn_villa btn_enquire" target="_blank">Enquire Now</button><?php */?><?php
							echo '</div>';
						echo '</div>';
					echo '</div>';
					//echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t3">';
//                                                                        echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
//                                                                    echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '</a>';
			echo '</div>';
			//--------------------------web-----------------------------
			echo '</div>'; //---------villa_boxs_inside
			echo '</div>'; //---------villa_boxs
			
			
			
			
			
			
			
			//--------------------------mob-----------------------------
			echo '<div class="col-xs-12 col-sm-12 col-md-6 mob top10">';
				//echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
				//echo '</div>';
				echo '<div class="gray_mob ">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 padleft25 padright25 t_t11">';
							echo '<h3 class=" font_mob top0"><a class="fbk" href="/'.$row['ht_link'].'.html" ><span ><strong>'.$name[0].' </strong></span></a></h3>';//itemprop="name"
							echo '<div  class="top10 tb f15t "><span  class="pt">'.base64_decode($row['short_det']).'</span></div>';//f13 itemprop="description"
							echo '</div>';
							//echo '<div class="col-xs-12 col-sm-12 col-md-12 padleft25 top10 t_t41">';
							echo '<div class="col-xs-7 col-sm-6 col-md-6 padleft25 top10 t_t11">';
								echo '<ul>';
									echo '<li class="pdmb">';
										//echo '<svg width="30" height="30" style="padding-left: 5px;">';
//                                                                                            echo '<image xlink:href="/upload/location.svg" src="/upload/location.svg"  class="micon" style="width: 20px !important;" />';
//                                                                                        echo '</svg>';
										echo '<image data-src="' . S3_BUCKET_URL . '/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
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
												echo '<image data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 34px !important;height: 37px;margin-left: -5px;background: #ffcdcd00;margin-top: -8px;margin-bottom: -1px !important;" />';
												$luxu_mo = "Luxury ";
											}
											else
											{
												echo '<image data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
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
										echo '<image data-src="' . S3_BUCKET_URL . '/upload/bed.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['bedroom_range'].'</div>';
									echo '</li>';
									echo '<li class="pdmb">';
										//echo '<svg width="30" height="30">';
//                                                                                            echo '<image xlink:href="/upload/team.svg"  class="micon" />';
//                                                                                        echo '</svg>';
										echo '<image data-src="' . S3_BUCKET_URL . '/upload/team.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['adults'].' Guests</div>';
									echo '</li>';
								echo '</ul>';
							echo '</div>';
if($row['discount']!='')
{
$discount_mob = '<del><span class="tx_discount_old">$'.number_format($row['pmin']).'</span></del><span class="inprice tx_discount">$'.number_format($row['discount']).'</span>';
}
else
{
$discount_mob = '<span class="inprice">$'.number_format($row['pmin']).'</span>';
}      																			
						echo '<div class="col-xs-12 col-sm-12 col-md-6 t_price  t_t21">';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 text-center padleft top20 bottom51 t_t31">';
								echo '<div class="text-right text_price tp2">From '.$discount_mob.' /Night</div>';
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
//echo '<!--room-->';












?>