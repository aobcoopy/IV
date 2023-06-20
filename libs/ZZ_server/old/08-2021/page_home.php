<?php session_start();?>
<?php /*?>--------------------new-----------------------<?php */?>
<?php 
//$cover = $dbc->GetRecord("slide_photo","*"," status > 0 order by sort asc limit 1");
//$photo_cover = json_decode($cover['photo'],true);
?>
<?php /*?><div class="mg-page-titles top68"><!--parallax-->
    <div class="container-fluid nopad">
    <img class="lazy mtop_cover" data-src="<?php echo $photo_cover;?>" alt="inspiringvillas cover" width="100%" >
        <div class="row">
        </div>
    </div>
</div>
<?php */?>
<?php /*?>--------------------new-----------------------<?php */?>
<div id="mega-sliders" class="carousel slide top48" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php
	$a=0;
	$sqls = $dbc->Query("select * from slide_photo where status > 0 order by sort asc");
	while($row = $dbc->Fetch($sqls))
	{
		$act = ($a==0)?'active beactive':'';
		$photo = json_decode($row['photo'],true);
		echo '<div class="item '.$act.'  ">';
			echo '<img  src="'.imagePath($photo).'" alt="inspiringvillas cover">';// 
            echo '<div class="carousel-caption">';
                //echo '<!--<img src="libs/images/stars.png" alt="">-->';
            echo '</div>';
        echo '</div>';
		$a++;
	}
	?>
    </div>
    <a class="left carousel-control" href="#mega-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
    <a class="right carousel-control" href="#mega-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
</div>



<?php /*?><img class="lazy" data-src="/upload/category/photo_1503739883.jpg" />
<img class="lazy" src="/upload/category/photo_1503739883.jpg" data-src="/upload/category/photo_1503739883.jpg"  /><?php */?>

<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
function cleartime(func)
{
	clearInterval(func);
}
</script>
<?php include "libs/pages/google_remarketing.php";?>
<?php include "libs/pages/search.php";?>


<?php /*?><script>
var tt0=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".mg-book-now ").offset().top-50) 
	{
		if(tt0==true)
		{
			$(".lovmore").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-load-home-cate.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".lovmore").fadeOut(100);
					$(".vmore").html(res);
				}
			});
			tt0=false;
		}
	}
	else
	{
		
	}
});
</script><?php */?>

<style>
@media screen and(max-width:768px)
{
	.mtop255{
		margin-top: 25px;
	}
	.mtop255_2{
		margin-top: 25px;
	}
}
@media screen and(min-width:768px)
{
	.mtop255{
		/*margin-top: 25px;*/
	}
	.mtop255_2{
		margin-top: 15px;
	}
}

#locationBox:hover #locationText {
   color: #FFF;
}
.locationText{
    text-align: center;
    color: #112845; 
}
</style>


<div class="container">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
        	<div class="col-xs-12 col-sm-12 col-md-12 " >
            	<div style="height: 40px;"></div>
            </div>
            
        	<?php /*?><div class="col-xs-12 col-sm-4 col-md-4 text-center nopad t_t11 ql_text"><strong>Quick Link >>></strong></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t22"><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Phuket">Phuket</button></a></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t33"><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Koh Samui">Koh Samui</button></a></div><?php */?>
            <?php /*?><div class="col-xs-4 col-sm-3 col-md-3 text-center nopad t_t44"><a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Sri Lanka">Sri Lanka</button></a></div><?php */?>
        </div>
    </div>
</div>



<div class="container">
<div class="inside_data_recently_home"></div>
</div>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-recently-home.php",
		type:"POST",
		dataType:"html",
		data:{},
		success: function(res){
			$(".inside_data_recently_home").html(res);
		}
	});
    setTimeout(function(){
		//window.location.reload();
	},500);
});

</script>



<div class="mg-best-rooms catego " style="    margin-top: -40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <center>
                    <h1 class="hidden-xs1 mtop255_2" >Luxury Villas Thailand</h1>
                    <h2 class="f16" style="    font-family: pt !important;">Discover Luxury Villas</h2>
                    </center>
                <br>
                <div class="row">
                <?php /*?><div class="col-md-12 hidden-xs hidden-sm">
                	<ul class="cbar">
                    	<?php
						$sql_cate_bar = $dbc->Query("select * from categories where status > 0 order by sort asc");
						$xyz=0;
						while($r_cate_bar = $dbc->Fetch($sql_cate_bar))
						{
							$na = explode("-",$r_cate_bar['name']);
							$addc = ($xyz==0)?'acctt':'';
							echo '<a href="/'.$r_cate_bar['ht_link'].'.html"><li class="'.$addc.'">'.switchcase_sort($r_cate_bar['id']).'</li></a>';
							$xyz++;
						}
						?>
                    </ul>
                </div><?php */?>

				<?php 
				$sql_cate = $dbc->Query("select * from categories where status > 0 and id IN (6,4,8,5) order by sort asc limit 0,4"); //
				$zz=0;
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$nam = explode("-",$r_cate['name']);
					$pho = json_decode($r_cate['photo'],true);
					if($zz<=1){$cal="top10";}else{$cal="top30";}
					$zz++;
					echo '<div class="col-sm-6 col-md-6 '.$cal.'">';
					if($r_cate['id']==4)
					{
						$ht_links = "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort";
						//$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
					}
					else
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
					}
						echo '<a href="'.$ht_links.'"><div class="col-md-12 col-sm-12 col-xs-12 boxpho nopad">';
							if($zz<3)
							{
								echo '<img src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							else
							{
								echo '<img class="lazy" data-src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img class="lazy" data-src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							
							if($r_cate['id']==5)
							{
								$name_more = '(>14)';
							}
							else
							{
								$name_more = '';
							}
							//$rcate = $r_cate['id'];
							$rcate =($r_cate['id']==5)?"f13":"";
							if($r_cate['id']==4)
							{
								//echo '<div class="ca_box_name">Thailand Villas</div>';
								echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort';
							}
							else
							{
								echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
							}
						echo '</div></a>';
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]); 
                        
                        if($r_cate['id']==6)
						{
							$small_font = 'sm_text';
						}
						elseif($r_cate['id']==5)
						{
							$small_font = 'sm_text_l';
						}
						else
						{
							$small_font = '';
						}
                        
						echo '<div class="col-md-12 col-sm-12 col-xs-12  nopad bottom20">'; 
                        
							echo '<div class="col-xs-6 col-sm-6 col-md-6  bpl top10" onclick="window.location.href=\'' . $phuket_link . '\'" style="cursor: pointer;" id="locationBox">';
								echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $phuket_link . '">Phuket '.$ca_name[0].'</a></div>';								
								echo '</div>';     
							echo '</div>';  
                            
                            echo '<div class="col-xs-6 col-sm-6 col-md-6  bpr top10" onclick="window.location.href=\'' . $koh_samui_link . '\'" style="cursor: pointer;" id="locationBox">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14 '.$rcate.' '.$small_font.'">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $koh_samui_link . '">Koh Samui '.$ca_name[0].'</a></div>';
                                echo '</div>';
                            echo '</div>';                           
                            
						echo '</div>';
					echo '</div>';
                    
//old
/* 
                       echo '<div class="col-md-12 col-sm-12 col-xs-12  nopad bottom20">';//echo $ca_name[0]; 
                            echo '<div class="col-xs-6 col-sm-6 col-md-6  bpl top10">';
                                echo '<a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html">';//echo '<a href="/'.$r_cate['ht_link'].'.html">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14">';
                                    echo '<center>Phuket '.$ca_name[0].'</center>';
                                    
                                echo '</div>';     
                                echo '</a>';
                            echo '</div>';  
                            echo '<div class="col-xs-6 col-sm-6 col-md-6  bpr top10">';
                                echo '<a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html">';//echo '<a href="/'.$r_cate['ht_link'].'.html">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14 '.$rcate.'">';
                                    echo '<center>Koh Samui '.$ca_name[0].'</center>';
                                echo '</div>';
                                echo '</a>';
                            echo '</div>'; 
                        echo '</div>';
                    echo '</div>';
*/                    
					
				}
				function collection_home($option)
				{
					switch($option)
					{
						case "2" :
							return "party-villas";
						break;
						case "3" :
							return "family-villas";
						break;
						case "4" :
							return "seaview-villas";
						break;
						case "5" :
							return "larger-group-villas";
						break;
						case "6" :
							return "beachfront-villas";
						break;
						case "8" :
							return "wedding-villas";
						break;
						default:
							return "all-collections";
					}
				}
				function switchcase_alt($val)
				{
					switch($val)
					{
						case "2":
							return "Party Villa";
						break;
						case "3":
							return "Family Villas";
						break;
						case "4":
							return "Seaview Villa Photo";
						break;
						case "5":
							return "Large Villa Photo";
						break;
						case "6":
							return "Beach Villa Photo";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
						break;
						case "8":
							return "Villa Wedding Photo";
						break;
						default:
					}
				}
				?>
                <div class="loadd lovmore">
                    <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
                </div>
                <div class="vmore" style="    margin-top: 330px;"></div>
                
				<?php /*?><div class="col-md-12 col-sm-12 col-xs-12 top30"><?php */?>
                	<?php /*?><center>
                    	<a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="btnnl " style="color:#000;"><strong>ALL THAILAND VILLAS</strong></a><br><br>
                        <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="btnnl " style="color:#000;"><strong>ALL PHUKET VILLAS</strong></a><br><br>
                        <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="btnnl " style="color:#000;"><strong>ALL KOH SAMUI VILLAS</strong></a>
                    </center><?php */?>
                <?php /*?></div><?php */?>
            </div>
        </div>
    </div>
</div>
<br>
<?php /*?><script>
var tt1=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".catego").offset().top-100) 
	{
		if(tt1==true)
		{
			$(".lowho_we_are").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-load-who-we-are.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".lowho_we_are").fadeOut(100);
					$(".who_we_are").html(res);
				}
			});
			tt1=false;
		}
	}
	else
	{
		
	}
});
</script><?php */?>

<div class="container">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
        	<div class="col-xs-12 col-sm-12 col-md-12 text-center t_t1- ql_text" style="margin-bottom:30px;">
            	<div class="bar_inside">
                <button class="but_ql but_main tb"><strong>Quick Links >>></strong></button>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Phuket Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Koh Samui Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Koh Phagnan Villas</a>
                </div>
            </div>
            
        	<?php /*?><div class="col-xs-12 col-sm-4 col-md-4 text-center nopad t_t11 ql_text"><strong>Quick Link >>></strong></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t22"><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Phuket">Phuket</button></a></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t33"><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Koh Samui">Koh Samui</button></a></div><?php */?>
            <?php /*?><div class="col-xs-4 col-sm-3 col-md-3 text-center nopad t_t44"><a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Sri Lanka">Sri Lanka</button></a></div><?php */?>
        </div>
    </div>
</div>


<style>
@media screen and (max-width: 768px)
{
	.but_ql {
		width:100%;
	}
}
@media screen and (min-width: 768px) 
{
.but_ql {
    padding: 10px 25px 10px 25px !important;
    color: #fff;
    background: none;
    border: none;
    /* width: 100%; */
}
}
.bar_inside {
   width: 100%;
   margin-left: 0px;
}
@media screen and (max-width:992px)
{
	.mbt30m
	{
		margin-bottom: 30px;
	}
}
</style>
<div class="loadd lowho_we_are">
    <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
</div>
<div class="who_we_are"></div>

<div class="mg-about parallax">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                    <center><h2 style="color:#fff;">WHO WE ARE</h2>
                    <p class="f16" style="font-family:pt !important;">Inspiring Villas offers a unique and sensational villa holiday experience in the finest hand-picked luxury villas in <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Thailand</a><?php /*?>, <a href="/search-rent/indonesia-bali/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bali</a><?php */?> <?php /*?>& <a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Sri Lanka</a><?php */?>, the holiday of a lifetime, receiving full 24/7 care from our professional team inside and outside the villa.</p>
                    <br>
                    <?php /*?><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Phuket</a><br>
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui luxury villas</a><?php */?>
                    </center>
                    
                    <?php /*?><div class="col-md-6">
                        <div class="col-md-12 nopad  text-center  f18 mbt30m">
                            <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 nopad  text-center f18 mbt30m">
                            <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Phuket</a>
                        </div>
                    </div><?php */?>
                    
                    
                    <?php /*?><div class="col-md-4">
                        <div class="col-md-12 nopad  text-center f18 mbt30m">
                            <a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Sri Lanka</a>
                        </div>
                    </div><?php */?>
                    <?php /*?><div class="col-md-3">
                        <div class="col-md-12 nopad  text-center f18 ">
                            <a href="/search-rent/indonesia-bali/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bali</a>
                        </div>
                    </div><?php */?>
                    
                    <div class="col-md-12 mob top30">
                    	<img src="/upload/pata.png" width="120" class="center-block" alt="PATA Logo">
                        <?php /*?><img src="/upload/travller.png" width="165" class="center-block" alt="traveller Logo"><?php */?>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid web af" style="background:#eee;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="mg-feature"  style="border-right: 1px solid #ddd;">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-heart"></i>
                        <h3>LUXURY VILLA RENTALS</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Our selection of Thailand villas for rent offer a unique villa holiday experience. We offer the best villas in the most incredible locations. Guests enjoy exclusivity and privacy, complete with full service from dedicated villa staff, a private chef and incredible facilities.
                    <?php /*?>Our selection of luxury & private villas for rent offer a unique villa holiday experience. We offer the best private pool villas in the most incredible locations- Wedding Villas, Sea View Villas, Garden Villas, Beachfront Villas and more. Guests enjoy exclusivity and privacy, complete with full service from dedicated villa staffs.<?php */?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature"  style="border-right: 1px solid #ddd;">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-lightbulb-o"></i>
                        <h3>BE INSPIRED</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;"> There is truly something for everyone. Our staff can find the perfect holiday villa match for you, helping you to discover the location and villa that best suits your needs. We will show you which beach (in Phuket, Koh Samui, Koh Phagnan) and villa are perfect for your next vacation.
                    <?php /*?>There is truly something for everyone. Our staff can find the perfect holiday villa match for you, helping you to discover the location and villa that best suits your needs. We will show you which beach (in Phuket or Koh Samui) and villa are perfect for your next vacation.<?php */?>
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-thumbs-up"></i>
                        <h3>WHY CHOOSE US</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Inspiring Villas selects only the finest luxury villas in Thailand to be featured in our collection. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that your experience is the very best one.
                    <?php /*?>Inspiring Villas selects only the finest luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?><?php /*?>Inspiring Villas selects only the finest Thailand luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?></p>
                </div>
            </div>
        </div>
    </div><br>
</div>

<div class="container-fluid mob af" style="background:#eee;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-thumbs-up"></i>
                        <h3>WHY CHOOSE US</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Inspiring Villas selects only the finest luxury villas in Thailand to be featured in our collection. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that your experience is the very best one.
                    <?php /*?>Inspiring Villas selects only the finest luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?><?php /*?>Inspiring Villas selects only the finest Thailand luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?></p><br><br>
                </div>
            </div>
       </div>
   </div>
</div>
<?php /*?><div class="container-fluid mob af" style="background:#eee;">
   <div class="row">
            <div class="col-sm-4 blu_line"></div>
    </div>
</div>
<div class="container-fluid mob af" style="background:#eee;">
	<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-lightbulb-o"></i>
                        <h3>BE INSPIRED</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">In the south are magical islands, with incredible variety, and there is truly something for everyone. Our staff can find the perfect holiday villa match for you in Thailand, helping you to discover the tropical location and private villa that best suits your needs. We will show you which beach and villa are perfect for your next vacation.</p>
                </div>
            </div>
        </div>
    </div><br>
</div><?php */?>



<style>
.blu_line
{
	border-top: 23px solid #112845;
    margin-top: 35px;
}
</style>



<?php /*?><script>
var tt=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".af").offset().top-300) 
	{
		if(tt==true)
		{
			$(".lopageHeight").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-load-height.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".lopageHeight").fadeOut(100);
					$(".pageHeight").html(res);
				}
			});
			tt=false;
		}
	}
	else
	{
		
	}
});
</script><?php */?>

<?php /*?>
<div class="mg-featuress ">
    <div class="container-fluid pad20" >
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                	<center><h2 style="margin-top: 25px;">Highlighted Villas</h2>
                    <h4 style="    font-family: pt !important;">Explore our featured Luxury Villas<?php /*?>Find out our best featured villas & highlighted promotions  <?php *-/?></h4></center><br>
                    <div class="col-md-10 col-md-offset-1">
                    	<div class="web">
                    	<div class="loadd lopageHeight">
                            <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
                        </div>
                        <?php
						$l=0;
						//$ar_hl = array();
						$sql = $dbc->Query("select * from properties where id='13' OR id='178' OR id='7' OR id='149' and status > 0 order by nob asc");//--7
						while($line_long = $dbc->Fetch($sql))
						{
							
							//$line_long = $dbc->GetRecord("properties","*","id='".$da['id']."'");
							$img_long = json_decode($line_long['photo'],true);
							$vname = explode("|",$line_long['name']);
							$ac = ($l==0)?'active':'';
							echo '<div class="col-md-3 col-sm-6 col-xs-12 bottom15 top15">';
								echo '<a href="/'.$line_long['ht_link'].'.html"><img class="lazy" data-src="'.imagePath($img_long[0]['img']).'" alt="'.$vname[0].'" width="100%" alt="...">';
								echo '</a>';
								echo '<div class="text-center col-md-12 top15 fnb f18">';
									echo $vname[0];//.''.$line_long['id'];
								echo '</div>';
								echo '<div class="text-center col-md-12 top15 bbdet">';
									echo string_len(base64_decode($line_long['detail'],true),90);
								echo '</div>';
								//echo '<div class="text-center col-md-12 top15 ">';
//									//echo $line_long['actualbed'].' Bedrooms';
//									switch($line_long['id'])
//									{
//										case '13':
//											echo  "Chan Grajang 4-6 Bedrooms";
//											$bedd = "Chan Grajang 4-6 Bedrooms";
//										break;
//										case '178':
//											echo  "Villa Thousand Hills 2-9 Bedrooms";
//											$bedd = "Villa Thousand Hills 2-9 Bedrooms";
//										break;
//										case '8':
//											echo  "Villa Yang 3 Bedrooms";
//											$bedd = "Villa Yang 3 Bedrooms";
//										break;
//										case '149':
//											echo  "Makata Villa 3-6 Bedrooms";
//											$bedd = "Makata Villa 3-6 Bedrooms";
//										break;
//									}
//								echo '</div>';
								echo '<div class="text-center col-md-12 top15 ">';
									echo '$'.$line_long['pmin'].' - $'.$line_long['pmax'];
								echo '</div>';
								echo '<div class="text-center col-md-12 top15 ">';
									echo '<a class="tb btnnl" href="/'.$line_long['ht_link'].'.html">View More </a>';
								echo '</div>';
							echo '</div>';
							
							$in_ar_hl[] = array(
								'photo' => $img_long[0]['img'],
								'name' => $vname[0],
								'detail' => string_len(base64_decode($line_long['detail'],true),90),
								//'bedroom' => $bedd,
								'price' => '$'.$line_long['pmin'].' - $'.$line_long['pmax'],
								'link' => $line_long['ht_link'].'.html'
							);
							
							$l++;
						}
						
						/*echo '<pre>';
							print_r($in_ar_hl);
						echo '</pre>';*-/
						?>
                        </div>
                        
                        <div class="pageHeight"></div>
                    </div>	
                    
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="container" style="margin-bottom: 30px;">
	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 mob">                  
        <div id="hl-sliders" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php /*?><ol class="carousel-indicators">
                <li data-target="#hl-sliders" data-slide-to="0" class="active"></li>
                <li data-target="#hl-sliders" data-slide-to="1"></li>
                <li data-target="#hl-sliders" data-slide-to="2"></li>
            </ol><?php *-/?>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            
            <?php 
            $zxzx = 0;
            foreach($in_ar_hl as $inside)
            {
                //echo '-----------';
                $acctt = ($zxzx==0)?'active':'';
                echo '<div class="item '.$acctt.'"><a href="'.$inside['link'].'">';
                    echo '<img src="'.$inside['photo'].'" width="100%">';
                    echo '<div class="carousel-caption2 pad10 tb">';
                        echo '<b>'.$inside['name'].'</b><br>';
                        echo $inside['detail'].'<br>';
                        //echo $inside['bedroom'].'<br>';
						//echo '<br>';
                        echo $inside['price'].'<br>';
                    echo '</div>';
                echo '</a></div>';
                $zxzx++;
            }
            ?>
            
                
                
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control caro l0" href="#hl-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control caro r0" href="#hl-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>
     </div> 
     </div>
</div>   
<?php */?>                  
<style>.ddet p{font-family:pt !important}
.carousel-caption2
{
	/*border:1px solid #000;*/
	background-color:#eee;
}
</style>
<?php /*?><script>
/*$(document).ready(function(e) {
    lazy(img);
});
function lazy(img)
{
    var imgTag = $("img.lazy");
	var imgPath = $(img);//imgTag.attr("data-src");
	imgTag.attr("src",imgPath);
}
*d/
var tt2=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".pageHeight").offset().top-300) 
	{
		if(tt2==true)
		{
			$(".load2").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-load-lifestyle.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".load2").fadeOut(100);
					$(".liftstlye").html(res);
				}
			});
			tt2=false;
		}
	}
	else
	{
		
	}
});
</script><?php */?>


<script>
$(document).ready(function(e) {
    $(".ard").click(function(e) {
		var tard = $("#t_ard").val();
        if(tard=='0')
		{
			$("#t_ard").val(1);
			$(".ard").removeClass('fa-angle-down');
			$(this).addClass('fa-angle-up');
			$(".covlife").slideDown(600);
		}
		else
		{
			$("#t_ard").val('0');
			$(".ard").removeClass('fa-angle-up');
			$(this).addClass('fa-angle-down');
			$(".covlife").slideUp(600);
		}
    });
});
</script>
<style>
.paa>p{font-family:unset !important}.paa>center>.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:110px;height:1px;background-color:#d3a267;position:absolute;bottom:0;left:50%;margin-left:-55px;margin-bottom:10px !important}.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:80px;height:0px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px !important;top:43px}.mg-sec-title h2{color:#16262e;font-size:30px;text-transform:inherit;font-weight:400;margin:-33px 0 10px}.mg-feature .mg-feature-icon-title i{display:block;width:40px;line-height:40px;background-color:#112845;text-align:center;font-size:21px;color:#fff;border-radius:50%;float:left;-webkit-transition:background-color 0.3s;transition:background-color 0.3s;margin-top:1px}.mg-feature .mg-feature-icon-title h3{display:block;font-family:"Playfair Display",serif;font-size:17px;color:#16262e;font-weight:400;margin-left:60px;margin-top:13px;margin-bottom:-3px;text-transform:uppercase}</style>

<!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com-->
<script type="text/javascript" src="https://a.optmnstr.com/app/js/api.min.js" data-account="41772" data-user="36782" async></script>
<!-- / OptinMonster -->