
<?php include "libs/pages/fr_head.php";?>

<?php include "libs/pages/search_forrent.php";?>


<div class="mg-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mg-booking-form">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="select-room">
                           
                            <div class="mg-available-rooms">
                                
                                <?php include "libs/pages/fr_description.php";?>
                                
                                
                                
                                <div class="mg-avl-rooms mtop60">
                                    <div class="roomold">
                                        <?php 
                                        include "libs/pages/fr_if_detination.php";
										include "libs/pages/fr_if_beach.php";
										include "libs/pages/fr_if_price.php";
                                        include "libs/pages/fr_if_room.php";
                                        
                                     	include "libs/pages/fr_arr_cate.php";
                                        
										/*echo '<pre>';
											echo $_REQUEST['room'];
										echo '</pre>';
										echo '<pre>';
											echo $_REQUEST['cate'];
										echo '</pre>';*/
			  
                                        $arr_map = array();
										//echo "-----select * from properties where status > 0  ".$Destination." ".$beach." ".$price."   ORDER BY price asc <br><br><br>";//".$Room."
                                        //$sql = $dbc->Query("select * from properties where status > 0  ".$Destination." ".$beach." ".$price." ".$Room."  ORDER BY price asc ");
										$sql = $dbc->Query("select * from properties   where status > 0 ".$Destination." ".$beach." ".$price."  ORDER BY price asc  ");//".$Room."
										$num = $dbc->Getnum($sql);
		 								
										
										include "libs/pages/fr_count.php";
										
										
										
										$view = $_REQUEST['view'];
                                        while($row =  $dbc->Fetch($sql))
                                        {
                                            $laa = $row['latitude'];
                                            $loo = $row['longtitude'];
                                            $amap = array(
                                                'la' => $row['latitude'],
                                                'lo' => $row['longtitude']
                                            );
                                            array_push($arr_map,$amap);
                                            
                                            if($row['tag']!=0)
                                            {
                                                $tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
                                                $tag_name = $tag['name'];
                                            }
											
											$name = explode("|",$row['name']);
											
											
        									//echo '*************'.$_REQUEST['cate'];
                                            if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0)
                                            {
												if(count($arr_room)>0)
												{
													//echo '++++++++ set room<br>';
													if(in_array($row['id'],$arr_cate))
													{
														if(in_array($row['id'],$arr_room))
														{
															//echo $row['id'].'----'.$arr_cate[0];
														$photo = json_decode($row['photo'],true);
														echo '<!--room-->';
															echo '<div class="mg-avl-room">';
																echo '<div class="row">';
																	echo '<div class="col-sm-6">';
																	if($row['tag']!=0)
																	{
																		echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																	}
																		echo '<a href="/'.$row['ht_link'].'.html" target="_blank">'.slide_photo($photo,$row['id']).'</a>';
																		//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img src="'.$photo[0]['img'].'" alt="" class="img-responsive"></a>';
																	echo '</div>';
																	echo '<div class="col-sm-6">';
																		echo '<h1 class="mg-avl-room-title"><a href="/'.$row['ht_link'].'.html" style="text-transform:uppercase;">'.$name[0].'</a> </h1>';
																		echo '<span>'.base64_decode($row['brief']).'</span><br>';
																		echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.$row['price_range'].'</span>';
																		echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
																		echo '<div class="row mg-room-fecilities">';
																			$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' ");
																			$b=0;
																			while($line = $dbc->Fetch($ch_prop))
																			{
																				$b++;
																				if($b<=6)
																				{
																					$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																					echo '<div class="col-xs-6 col-sm-6">';
																						echo '<ul>';
																							echo '<li>';
																								echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																								echo '&nbsp;&nbsp;'.$icon['name'];
																							echo '</li>';
																						echo '</ul>';
																					echo '</div>';
																				}
																			}
																		echo '</div>';
																		echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
																	echo '</div>';
																echo '</div>';
															echo '</div>';
															echo '<!--room-->';
														}
														
													}
												}
												else
												{
													//echo '------- not set room<br>';
													if(in_array($row['id'],$arr_cate))
													{
														//echo $row['id'].'----'.$arr_cate[0];
														$photo = json_decode($row['photo'],true);
														
														echo '<!--room-->';
															echo '<div class="mg-avl-room">';
																echo '<div class="row">';
																	echo '<div class="col-sm-6">';
																	if($row['tag']!=0)
																	{
																		echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																	}
																		echo '<a href="/'.$row['ht_link'].'.html" target="_blank">'.slide_photo($photo,$row['id']).'</a>';
																		//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img src="'.$photo[0]['img'].'" alt="" class="img-responsive"></a>';
																	echo '</div>';
																	echo '<div class="col-sm-6">';
																		echo '<h1 class="mg-avl-room-title"><a href="/'.$row['ht_link'].'.html" style="text-transform:uppercase;">'.$name[0].'</a> </h1>';
																		echo '<span>'.base64_decode($row['brief']).'</span><br>';
																		echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.$row['price_range'].'</span>';
																		echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
																		echo '<div class="row mg-room-fecilities">';
																			$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' ");
																			$b=0;
																			while($line = $dbc->Fetch($ch_prop))
																			{
																				$b++;
																				if($b<=6)
																				{
																					$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																					echo '<div class="col-xs-6 col-sm-6">';
																						echo '<ul>';
																							echo '<li>';
																								echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																								echo '&nbsp;&nbsp;'.$icon['name'];
																							echo '</li>';
																						echo '</ul>';
																					echo '</div>';
																				}
																			}
																		echo '</div>';
																		echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
																	echo '</div>';
																echo '</div>';
															echo '</div>';
															echo '<!--room-->';
													}
												}
                                            }
                                            else
                                            {
												$photo = json_decode($row['photo'],true);
												if(count($arr_room)>0)
												{
													if(in_array($row['id'],$arr_room))
													{
														//echo '>>>>>>>>>'.$row['id'].'<br>';
														if($view=='grid')
														{
															echo '<div class="col-xs-12 col-sm-6 col-md-6">';//<a href="?page=blogdetail&blog='.$r_blog['id'].'">
																	echo '<div class="col-md-12 boxpho nopad">';
																		if($row['tag']!=0)
																		{
																			echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																		}
																		echo '<a href="/'.$row['ht_link'].'.html" target="_blank">'.slide_photo($photo,$row['id']).'</a>';
																		//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img src="'.$photo[0]['img'].'" width="100%"></a>';
																	echo '</div>';
																	echo '<div class="col-md-12 boxbot_b nopad">';
																		echo '<div class="col-md-12 borbo nopad">';
																			echo '<div class="col-md-9 nopad">';
																				echo '<h2 class="btitle" ><strong>'.$row['name'].'</strong></h2>'; 
																			echo '</div>';
																			echo '<div class="col-md-3 nopad text-right" style="font-size:14px;margin-top: 22px;">';
																			$rev = $dbc->GetCount("rating","property=".$row['id']);
																				echo $rev.' Reviews'; 
																			echo '</div>';
																		echo '</div>';
																		
																		echo '<div class="col-md-12 nopad">';
																			echo '<div class="col-sm-8 nopad" style="font-size: 14px;">';
																			$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' limit 1");
																			while($line = $dbc->Fetch($ch_prop))
																			{
																				$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																							echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																							echo '&nbsp;&nbsp;'.$icon['name'];
																			}
																				echo '<br>'.string_len(base64_decode($row['brief'],true),40);
																			echo '</div>';
																			echo '<div class="col-sm-4 nopad text-right">';
																				echo '<span  style="font-size: 12px;    float: left;    padding-left: 30px;">FROM </span><br>';
																				echo '<span style="font-size: 32px;margin-top:50px;    color: #f05b46;"><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($row['price']).'</span>';
																				echo '<span style="font-size: 12px;">++ /NT</span>';
																			echo '</div>';
																		echo '</div>';
										
																	echo '</div>';
																
															echo '</div>';
															echo '<!--room-->';
														}
														else
														{
															echo '<!--room-->';
																echo '<div class="mg-avl-room">';
																	echo '<div class="row">';
																		echo '<div class="col-xs-12 col-sm-6">';
																		if($row['tag']!=0)
																		{
																			echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																		}
																			echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
																			echo slide_photo($photo,$row['id']);
																			echo '</a>';
																		echo '</div>';
																		echo '<div class="col-xs-12 col-sm-6">';
																			echo '<h1 class="mg-avl-room-title"><a href="/'.$row['ht_link'].'.html" style="text-transform:uppercase;">'.$name[0].'</a> <!--<span>$249<sup>.99</sup>/Night</span>--></h1>';
																			echo '<span>'.base64_decode($row['brief']).'</span><br>';
																			//echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.number_format($row['price']).' ++ /NT</span>';
																			echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.$row['price_range'].'</span>';
																			echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
																			echo '<div class="row mg-room-fecilities">';
																				$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' ");
																				$b=0;
																				while($line = $dbc->Fetch($ch_prop))
																				{
																					$b++;
																					if($b<=6)
																					{
																						$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																						echo '<div class="col-xs-6 col-sm-6">';
																							echo '<ul>';
																								echo '<li>';
																									echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																									echo '&nbsp;&nbsp;'.$icon['name'];
																								echo '</li>';
																							echo '</ul>';
																						echo '</div>';
																					}
																				}
																			echo '</div>';
																			echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
																		echo '</div>';
																	echo '</div>';
																echo '</div>';
															echo '<!--room-->';
														}
													}
												}
												else
												{
													if($view=='grid')
													{
														echo '<div class="col-xs-12 col-sm-6 col-md-6">';//<a href="?page=blogdetail&blog='.$r_blog['id'].'">
																echo '<div class="col-md-12 boxpho nopad">';
																	if($row['tag']!=0)
																	{
																		echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																	}
																	echo '<a href="/'.$row['ht_link'].'.html" target="_blank">'.slide_photo($photo,$row['id']).'</a>';
																echo '</div>';
																echo '<div class="col-md-12 boxbot_b nopad">';
																	echo '<div class="col-md-12 borbo nopad">';
																		echo '<div class="col-md-9 nopad">';
																			echo '<h2 class="btitle" ><strong>'.$name[0].'</strong></h2>'; 
																		echo '</div>';
																		echo '<div class="col-md-3 nopad text-right" style="font-size:14px;margin-top: 22px;">';
																		$rev = $dbc->GetCount("rating","property=".$row['id']);
																			echo $rev.' Reviews'; 
																		echo '</div>';
																	echo '</div>';
																	
																	echo '<div class="col-md-12 nopad">';
																		echo '<div class="col-sm-8 nopad" style="font-size: 14px;">';
																		$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' limit 1");
																		while($line = $dbc->Fetch($ch_prop))
																		{
																			$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																						echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																						echo '&nbsp;&nbsp;'.$icon['name'];
																		}
																			echo '<br>'.string_len(base64_decode($row['brief'],true),40);
																		echo '</div>';
																		echo '<div class="col-sm-4 nopad text-right">';
																			echo '<span  style="font-size: 12px;    float: left;    padding-left: 30px;">FROM </span><br>';
																			echo '<span style="font-size: 32px;margin-top:50px;    color: #f05b46;"><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($row['price']).'</span>';
																			echo '<span style="font-size: 12px;">++ /NT</span>';
																		echo '</div>';
																	echo '</div>';
									
																echo '</div>';
															
														echo '</div>';
														echo '<!--room-->';
													}
													else
													{
														echo '<!--room-->';
															echo '<div class="mg-avl-room">';
																echo '<div class="row">';
																	echo '<div class="col-xs-12 col-sm-6">';
																	if($row['tag']!=0)
																	{
																		echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
																	}
																		echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
																		echo slide_photo($photo,$row['id']);
																		//echo '<img src="'.$photo[0]['img'].'" alt="" class="img-responsive"></a>';
																	echo '</div>';
																	echo '<div class="col-xs-12 col-sm-6">';
																		echo '<h1 class="mg-avl-room-title"><a href="/'.$row['ht_link'].'.html" style="text-transform:uppercase;">'.$name[0].'</a> <!--<span>$249<sup>.99</sup>/Night</span>--></h1>';
																		echo '<span>'.base64_decode($row['brief']).'</span><br>';
																		//echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.number_format($row['price']).' ++ /NT</span>';
																		echo '<span style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range '.$row['price_range'].'</span>';
																		echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
																		echo '<div class="row mg-room-fecilities">';
																			$ch_prop = $dbc->Query("select * from property_icon where property = '".$row['id']."' ");
																			$b=0;
																			while($line = $dbc->Fetch($ch_prop))
																			{
																				$b++;
																				if($b<=6)
																				{
																					$icon = $dbc->GetRecord("icons","*","id=".$line['icon']);
																					echo '<div class="col-xs-6 col-sm-6">';
																						echo '<ul>';
																							echo '<li>';
																								echo '<img src="'.json_decode($icon['icon'],true).'" class="micon"></i>';
																								echo '&nbsp;&nbsp;'.$icon['name'];
																							echo '</li>';
																						echo '</ul>';
																					echo '</div>';
																				}
																			}
																		echo '</div>';
																		echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
																	echo '</div>';
																echo '</div>';
															echo '</div>';
														echo '<!--room-->';
													}
												}
                                            }
                                       }
                                   
                                    ?>
                                    </div>
                                </div>

                                <div class="loadd">
                                    <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
                                </div>
                                <div class="rooms padtop40"></div>
                            </div><!--mg-available-rooms-->
                             
                            
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

   <!-- <div class="container-fluid nopad">
   		<div id="map"></div>
    </div>-->
</div>


    
<style>
  #map {
	height: 400px;
	width:100%;
  }
</style>
<!--<script src="<?php echo $url_link;?>libs/js/jquery.js"></script>-->
<!--<script src="<?php echo $url_link;?>libs/js/jquery.mobile-1.4.5.min.js"></script>-->
<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />-->
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->

<script>
$(document).ready(function(e) {
	/* $(".slide").swiperight(function() {
      $(this).carousel('prev');
    });
   $(".slide").swipeleft(function() {
      $(this).carousel('next');
   });*/
   
    $(".slide").swipe({
	
	  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
	
		if (direction == 'left') $(this).carousel('next');
		if (direction == 'right') $(this).carousel('prev');
	
	  },
	  allowPageScroll:"vertical"
	
	});
});
</script>

<script>
  /*var map;
  function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 10,
	  center: new google.maps.LatLng(7.952231, 98.338357),
	  scrollwheel: false,
	  mapTypeId: 'roadmap'
	});

	var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	var icons = {
	  parking: {
		icon: iconBase + 'parking_lot_maps.png'
	  },
	  library: {
		icon: iconBase + 'library_maps.png'
	  },
	  info: {
		icon: iconBase + 'info-i_maps.png'
	  }
	};

	function addMarker(feature) {
	  var marker = new google.maps.Marker({
		position: feature.position,
		//icon: icons[feature.type].icon,
		map: map
	  });
	}

	var features = [
	<?php 
	foreach($arr_map as $map)
	{
		?>
		{
			position: new google.maps.LatLng(<?php echo $map['la'];?>, <?php echo $map['lo'];?>),
			type: 'info'
		},
		<?php
	}
	?>
	];

	for (var i = 0, feature; feature = features[i]; i++) {
	  addMarker(feature);
	}
  }*/
</script>
<script src="<?php echo $url_link;?>libs/js/inspiring.js"></script>