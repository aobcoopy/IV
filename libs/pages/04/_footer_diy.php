
<?php
$all = 'hidden';
$thai = 'hidden';
$phuket = 'hidden';
$samui = 'hidden';
$destiantion_only = 'hidden';
$collection_only = 'hidden';

$show_thai='ns';
$show_koh_samui='ns';
$show_phuket='ns';
$f_foot_3 = "hidden";
	
$destination = $_REQUEST['des'];

if(isset($_REQUEST['des']))
{
	if($_REQUEST['des']=='all')
	{
		$thai = '';
		if($_REQUEST['page']=='forrent')
		{
			if($_REQUEST['des']=='all' && $_REQUEST['sub']=='all')
			{
				$show_thai='';
				$show_koh_samui='ns';
				$show_phuket='ns';
				$f_foot_3 = "";
				
				if($_REQUEST['cate']==0 && $_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==8 || $_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
						$f_foot_3 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']!='all')
				{
					$show_thai='ns';
					$show_koh_samui='ns';
					$show_phuket='ns';
					$hiddd = "";
					$f_hidden = "hidden";
					$f_foot2 = "hidden";
					$f_foot_3 = "hidden";
				}
				elseif($_REQUEST['cate']==0 && $_REQUEST['room']!='all') //-------------take out footer--------------
				{
					if($_REQUEST['cate']==8 || $_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						/*$show_thai='';
						$show_koh_samui='hidden';
						$show_phuket='hidden';
						$hiddd = "hidden";
						$f_hidden = "";*/
						
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
						$f_foot_3 = "hidden";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
						$f_foot_3 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==8 || $_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					elseif($_REQUEST['cate']==8 )
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
						$f_foot_3 = "hidden";
					}
				}
				else
				{
					$show_thai='ns';
					$show_koh_samui='ns';
					$show_phuket='ns';
					$hiddd = "";
					$f_hidden = "hidden";
					$f_foot2 = "hidden";
					$f_foot_3 = "hidden";
				}
			}
		}
		else
		{
			
		}
		//$br2 = "<br>";
	}
	elseif($_REQUEST['des']=='38')  //----------------------------------------------phuket-------------------------------------------------
	{
		$phuket = '';
		if($_REQUEST['page']=='forrent')
		{
			if( $_REQUEST['sub']=='all')
			{
				$show_thai='ns';
				$show_koh_samui='ns';
				$show_phuket='';
				$f_foot_3 = "";
				
				if($_REQUEST['cate']==0 && $_REQUEST['room']=='all')
				{
					if( $_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']!='all')
				{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
				}
				elseif($_REQUEST['cate']==0 && $_REQUEST['room']!='all')  //-------------take out footer--------------
				{
					if( $_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='';
						$hiddd = "hidden";
						$f_hidden = "";
						
						
						/*$show_thai='hidden';
						$show_koh_samui='hidden';
						$show_phuket='hidden';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";*/
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					elseif($_REQUEST['cate']==5 || $_REQUEST['cate']==4 || $_REQUEST['cate']==8 )
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
			}
			else
			{
					$show_thai='ns';
					$show_koh_samui='ns';
					$show_phuket='ns';
					$hiddd = "";
					$f_hidden = "hidden";
					$f_foot2 = "hidden";
			}
		}
		//$br2 = "<br>";
	}
	elseif($_REQUEST['des']=='39')   //----------------------------------------------koh samui-------------------------------------------------
	{
		$samui = '';
		if($_REQUEST['page']=='forrent')
		{
			if( $_REQUEST['sub']=='all')
			{
				$show_thai='ns';
				$show_koh_samui='';
				$show_phuket='ns';
				$f_foot_3 = "";
				
				if($_REQUEST['cate']==0 && $_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']!='all')
				{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
				}
				elseif($_REQUEST['cate']==0 && $_REQUEST['room']!='all')  //-------------take out footer--------------
				{
					if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
						
						
						/*$show_thai='hidden';
						$show_koh_samui='hidden';
						$show_phuket='hidden';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";*/
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
				elseif($_REQUEST['cate']!=0 && $_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
					{
						$show_thai='ns';
						$show_koh_samui='';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					elseif($_REQUEST['cate']==5 || $_REQUEST['cate']==8 )
					{
						$show_thai='ns';
						$show_koh_samui='';
						$show_phuket='ns';
						$hiddd = "hidden";
						$f_hidden = "";
					}
					else
					{
						$show_thai='ns';
						$show_koh_samui='ns';
						$show_phuket='ns';
						$hiddd = "";
						$f_hidden = "hidden";
						$f_foot2 = "hidden";
					}
				}
			}
			else
			{
					$show_thai='ns';
					$show_koh_samui='ns';
					$show_phuket='ns';
					$hiddd = "";
					$f_hidden = "hidden";
					$f_foot2 = "hidden";
			}
		}
		//$br2 = "<br>";
	}
	$all = 'hidden';
	$destiantion_only = '';
	$collection_only = 'hidden';
}
elseif(isset($_REQUEST['cate']) && !isset($_REQUEST['des']))
{
	$all = 'hidden';
	$destiantion_only = 'hidden';
	$collection_only = '';
	
}
else
{
	if(isset($_REQUEST['id']))
	{
	}
	else
	{
		$all = '';
		$thai = 'hidden';
		$phuket = 'hidden';
		$samui = 'hidden';
	}
	
}




if($_REQUEST['page']=='forrent')
{
	$brr = "<br>";
	//$hiddd = "hidden";
	$f_foot = "";
	$f_foot_2 = "";
	$old_footer = "hidden";
	if($_REQUEST['sub']!='all')
	{
		$mtop = "margin-top: -60px;";
	}
	
	
}
else
{
	//$hiddd = "";
	$f_foot = "hidden";
	$f_foot_2 = "hidden";
	$old_footer = "";
}



?>
 <?php /*?>?page=forrent& des=all & sub=all & pri=all & room=all & cate=0 & sort=all<?php */?>
<footer  class="mg-footer my_footers" style=" <?php echo $mtop;?>background:#fff;    margin-top: -22px;" ><?php //echo '----'.$_REQUEST['room'];?>

        <div class="container-fluid  webss padtop50 new_foot  <?php echo $f_foot.' '.$f_foot2.' '.$f_foot_3;?>">
        </div>
        
        <?php
		if($_REQUEST['des']=='38')
		{
			$texts = "Discover Phuket ";
		}
		elseif($_REQUEST['des']=='39')
		{
			$texts = "Discover Koh Samui";
		}
		else
		{
			$texts = "Discover Thailand";
		}
		
		if($_REQUEST['des']==38)
		{
			$img_vdo = "Phuket";
		}
		elseif($_REQUEST['des']==39)
		{
			$img_vdo = "Koh_Samui";
		}
		else
		{
			$img_vdo = "pall";
		}
		?><?php /*?>VDOOOOOOO<?php */?>
        <?php
		if($page=='forrent')
		{
		?>
        <div class="container tvdo">
		<div class=" web">    
			<div class="col-md-12 pal nopad ">
				<div class="col-md-12  nopad">
					<div class="filters"></div>
					<div class="text-center ttmain"><?php echo $texts;?></div>
					<div class="ttsub text-center"></div>
					<i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['des'];?>')"></i>
					<div class="imggs">
						<img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>.jpg" width="100%" class="vdo_cov">
					</div>
				</div>
			</div>
		</div>
		<div class=" mob">
			<div class="col-md-12 pal nopad pmob ">
				<div class="col-md-12 cinside nopad">
					<div class="filters2"></div>
					<div class="text-center ttmain"><?php echo $texts;?></div>
					<div class="ttsub text-center"></div>
					<i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['des'];?>')"></i>
					<div class="imggs">
						<img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>2.jpg" width="100%" class="vdo_cov">
					</div>
				</div>
			</div>
		</div>
        </div>
        <?php
		}
		?>
	
	<div class="container-fluid  webss padtop501  <?php echo $f_foot.' '.$f_hidden;?>">
        
        
        <?php
		if($show_thai == '')
		{
			//echo "11111111111";
			?>
            <div class="container-fluid  webss padtop502  <?php echo $show_thai;?>" ><?php /*?>style="padding-top: 46px;"<?php */?>
            </div>
            <div class="container  <?php echo $show_thai;?>">
            
            <?php
            if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8)
            {?>
                <h2 class=" mb f30"><strong><a class="tg cdf" >Discover Luxury Villas in Thailand</a></strong></h2><?php /*?>Discover the Best Luxury Villas in Thailand<?php */?>
                <div class="col-md-12 nopad top41 f18">
                    Luxury Villas make a great holiday option with private accommodation and grounds, staff and modern facilities. 
    Your own space to call home for a private villa holiday in Thailand.<br><br>
    
    Indoor and outdoor areas with panoramic views, private pool and facilities like fitness, games and cinema rooms. <br>
    All villas are fully staffed with a Manager, housekeeping and service staff, and nearly all offer a full-time chef.
    
                </div>
                
                <div class="col-md-12 nopad top21" style="    margin-top: 33px;">
                <h2 class=" mb f22 top blu"><strong><a class="tg cdf " >Discover all Thailand Luxury Villas</a></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top21">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >How much does it cost to rent a villa in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are a range of villas and pricing.<br>
    Even if a villa is large with eight bedrooms they offer you to use less bedrooms and pay less per night.<br>
    Prices vary between seasons and are highest over the peak season of Christmas and New Year.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21" style="margin-top: -2px;">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >What’s included in Thailand luxury villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        The private villa is yours for the period of your booking. Staff, service, privacy, all facilities.<br>
    All you need to do is pay for your food should you wish the chef to cook meals for you.<br>
    But don’t worry, you will not need to go shopping, that happens whilst you are relaxing by the pool. <br>
    Often daily breakfast is included.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Thailand Luxury Villa Holidays </a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are a range of villa sizes available for rental to serve groups of different numbers.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >2,3,4 bedroom villas Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These villas make for a great family villa holiday.<br>
                        Sleeping up to 8 adults and often have the option for add-on beds for the children.<br>
                        2 villa bedrooms is the minimum number of bedrooms to open for a stay.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >5,6,7 bedroom villas Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These are the most common bedroom size of villas offering the largest flexibility in group numbers.<br>
                        These private villas often allow you to pay less and use less bedrooms so it’s worth looking through all the options.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >8,9,10 > bedroom villas Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These large luxury villas have expansive space and amenities with different indoor and outdoor areas for extended groups. Your own private estate for your villa holiday. Note you can usually open a minimum of four villa bedrooms for a stay.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Where to go in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        1.	Phuket is a large island with beautiful beaches and surrounded by many beautiful islands scattered in the Andaman sea.
    Home to many high-end spas, restaurants and beach clubs. There is so much to do here.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21">
                <h2 class=" mb f22 top"><strong><a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Explore luxury villas in  Phuket</a></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top21">
                    <div class="col-md-12 nopad f18">
                        2.	Koh Samui is a small laid back island in the Gulf of Thailand known for its beaches and relaxed atmosphere.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21">
                <h2 class=" mb f22 top tg"><strong><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Explore Koh Samui luxury villas</a></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >What type of Thailand luxury villas are available for rent</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are many types of Thailand villas available for rental to make your next luxury villa vacation.<br>
    Clifftop villas with panoramas, Beach villa chic, Contemporary design, Modern luxury villas with uber-facilities. There is sure to be a villa in Thailand to suit your group. Whether it’s a family holiday, large group or even a wedding villa.
    
                    </div>
                </div>
                
                 <div class="col-md-12 nopad top21">
                    <div class="col-md-12 nopad  f18">
                        There are two main options for villa location.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21">
                    <div class="col-md-12 nopad  f18">
                        1.<a class="blu" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html"><strong>Beachfront villas Thailand</strong></a> offer direct access to enjoy the sea and a beach lifestyle holiday. Thailand beach villas are very popular, where the sand is just in front of the pool and all the beach surrounds are readily available to you like beach restaurants and afternoon walks.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21">
                    <div class="col-md-12 nopad  f18">
                        2.Nestled in the hills above the bays are Thailand’s seaview villas. That offer quiet, privacy and panoramic views. Perfect for laid back Thailand luxury villa holidays.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >When to visit Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are three distinct seasons - the hot season from March to May, the cool season from November to February and the rainy season from June to October. But take your pick as even in rainy season this can just be an afternoon shower in a lovely day.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Where can i find the best villa vacation rentals available</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        We list all the luxury villa rentals in Thailand here.<br>
    Whether you are looking for a villa on the beach or in the hills overlooking<br>
    the sea we have all the best villas available.<br>
    We represent the Owners directly so there is no need to go anywhere else.<br>
    And there is sure to be a villa to match your group requirements.<br><br>
    
    Our website search allows you to choose bedroom numbers and island, and beach location if you know it already.<br>
    Because villas allow you to open a different number of bedrooms at different prices we list all the villas<br>
    that match your bedroom requirements.On the villa details pages if you scroll down you will see the price<br>
    for the different bedroom numbers open.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Where can i find a concierge service to help me plan and book my villa holiday, transport and excursions</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Inspiring Villas offer a complete concierge service.<br>
    Once you make a website enquiry on any villa or direct to us then a villa specialist will contact you<br>
    to discuss your needs. Once we understand your group profile and requirements we will be able to suggest<br>
    the very best villas and locations for your dates and group.<br>
    We also offer transport, arrival planning & excursions to make sure your villa vacation is just perfect.<br>
    Feel free to ask us anything.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >2018/ 2019 Thailand Luxury Villa Cost Survey</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                    Inspiringvillas.com has the widest choice available of Luxury Villas in Thailand.<br>
                    We have analysed our 2018 rental value data to bring you the most accurate and current luxury villa rental costs in Thailand.<br>
                    Of course these values change based on the villa size, location, time of year, size of group, number of nights and deals available.<br>
                    For 2018 the average cost per room in a Thailand private villa was USD$222.50++<br>
                    <?php /*?>For 2018 the average cost per room in a Thailand private villa in 2018 was USD$222.50++<br><?php */?>
                    This means USD$111.25++ per person each night.<br>
                    For our many Australian customers this translates to AUD$154++ as of December 2018.<br>
                    Tax ++ in Thailand is 17.7%
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Top tips for finding the best deals on Thailand Luxury villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                    Thailand is a very popular luxury villa holiday destination.<br>
                    As such there are a lot of villas available, in all different styles and locations.<br>
                    If you follow these steps you are sure to find a selection of villas to choose from which will offer you the best value for money.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >1. Seasons</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Consider booking just outside of peak and high seasons. The price variance can be very large and the weather is always still fine and comfortable.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >2. Location</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        One island is cheaper than the other(Koh Samui is cheaper!), and also different beach locations can demand different prices.<br>
                        Where you find may villas to choose from you will generally find lower prices.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >3.Plan Early & Book in Advance</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Most villas offer a discount for early booking(usually 90 days in advance).<br>
                        Your flights will cost less too if you book early.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >4.Not all villas are equal!</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Think about whats important to you.<br>
                        A villa with a wine cellar and private nightclub is amazing but will you use it?<br>
                        Focus on the facilities that you require and there is sure to be a selection of great villas to choose from.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >5.The more the merrier!</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        The affordability of a villa will get better and better as you use more of the bedrooms available.
                        <br>So consider coming with friends and family to make use of all the bedrooms and amenities the villa has on offer.
                    </div>
                </div>
                
                
                
                
                
                <div class="col-md-12 nopad top41">
            <h2 class=" mb f30 top"><strong><a class="tg cdf" >FAQs</a></strong></h2>
            </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >1. How does it compare to staying in a hotel</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        The luxury villa is your very own playground for your holiday. The entire villa is yours including all facilities like games, fitness and cinema room. Staff are there to make your stay as comfortable as possible with a full-time chef at your service.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >2. How does the price compare to a hotel</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Starting from 3 bedroom villa rentals upwards the cost is often more affordable than staying in a hotel. When many bedrooms are used in private villas the savings are significant compared to a hotel.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >3. How are children accommodated</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Private villas are prefect for children. More space to run around and specific areas of the villa for them to hang out. Most villas have games and cinema rooms and of course every one of the villas has its own private pool. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >4. How does the pricing work</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Prices work by the number of bedrooms and time of year.<br>
                        You can rent a large luxury villa in Thailand and enjoy all its facilities with just a few bedroom rental cost.
                    </div>
                </div>
            
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >5. Can I have my wedding in one of these villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Yes of course, small or large weddings can be organized in these villas. We can liaise with yourself and the planners in Thailand about the wedding villas.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >6. Can i host a corporate event in private villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Corporate retreats of all types can be accommodated, one or multi-day events. Large groups can use villas which are next to each other creating a villa complex for your company retreat.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >7. How do I book</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.<br>
                        When you decide which villa, the Owner will hold the villa for a period of time to receive a deposit.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >8. How do I pay the deposit?</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        A deposit between 30-50% is required dependent on how far forward the stay is. This deposit can be paid by bank transfer or credit card. The remaining balance is payable 45 days prior to arrival except for peak season of Christmas and New Year which is payable 90 days in advance.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >9. Villa rental periods</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        It is common that a villa requires a 3 night minimum for a booking.<br>
    During high season this can increase to 5 or 7, and in peak season it can be 10 nights.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >10. High & Peak Season Travel Advice</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Thailand is one of the most popular villa holiday destinations in the world.<br>
                        The busiest seasons are December, January, Chinese New Year, Easter and July.<br>
                        In these months villa bedroom pricing can increase and a larger number of minimum nights may be required to book.<br>
                        Planning well in advance to secure the villa you prefer is advisable. Also flights can be fully booked at this time of year.
                    </div>
                </div>
               
               <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >11. Visa requirements</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        For most passport holders travelling to Thailand is easy as you can receive a 30 day tourist visa on arrival at the airport. <br>
                        Please check with your own government travel advisory service for further information.<br><br>
                    </div>
                </div>
            <?php
            }
            elseif($_REQUEST['cate']==6) //beachfront content
            {
                
                ?>
                <h2 class=" mb f30"><strong><a class="tg cdf" >Discover Luxury Beach Villas Thailand</a></strong></h2>
                <div class="col-md-12 nopad top41 f18">
                    The beaches are amazing in Thailand.<br>
                    White sand, palm-fringed, calm waters in protected coves and bays.<br>
                    Thailand is a great choice for a beachfront villa holiday.<br><br>
                    
                    Thailand would never have the same appeal without it’s beautiful people.<br>
                    Mainly Buddhist, the relaxed & accepting attitude to changing life is evident in the ambience and all interactions.<br>
                    It makes for a very calm and free place where you don’t need to feel guilty about spending some time-out for relaxation.<br>
                    And this is exactly why your next villa vacation should be a Thailand luxury beach villa.<br><br>
                    
                    There is so much to do on a private villa holiday here.<br>
                    Nearly every villa on the beach will have watersports equipment like kayaks and paddle boards.<br>
                    To be able to wander a few steps from your pool directly onto the beach is a fantastic feeling.<br>
                    You get to enjoy the vibes and energy of the sea, and the relaxation of the horizon whilst lounging by your pool.<br><br>
                    
                    Being right next to the beach provides privacy at the same time as the feeling of being part of the daily beach activity. It can be a lovely part of the day to take a relaxing walk along the beach.<br>
                    In the evening there may well be bars and restaurants on the beach not too far from the villa.<br>
                    Alternatively you can ask your villa manager to organise transport to the restaurant of your choice, or stay in the villa as a group and enjoy the evening in your private space.
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >Villas with staff & full-time chef</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        One of the biggest attractions of renting your own villa is the level of service and attention.<br>
    The villa manager is your personal concierge for your stay<br>
    Then there is the housekeeping staff and your private full-time chef.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >Private Villa Rental</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Villas open different number of bedrooms so your group requirement does not have to match the villa size. And you still get all the villa amenities to use. In our search results we state the range of bedrooms that each villa will open for a booking. We list all the villas that accommodate the number of bedrooms you search so all you have to do is choose the bedroom number range that matches your group and you will be able to view every villa available.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Luxury Beach Villas Thailand</a></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket beachfront villas</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These villas offer luxurious comforts in the most stunning settings directly on the beach.<br>
    With the limited number of beach villas in Phuket it is best to book well in advance.<br><br>
    In Phuket you will find many incredible <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" class="blu">Sea view villas</a><br>
    These can be found in the hills and cliffs above the beaches.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui Beach Villas</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There is a large selection of villas on the beach for rent here.<br>
    Not all beaches in Koh Samui are swimmable so be sure to choose the right beach.<br>
    Quick guide - Taling Ngam & Laem Sor are not swimmable beaches.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >Where can I find the full selection of beach villas in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Right here is the answer. We represent all the very best villas and other agents have to rent them through us so if you would like to rent a private beach villa direct from the owner then Inspiring Villas is the place to do this.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >Could this be the best beach villa in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        We think so. <a href="/luxury-villas/villa-thousand-hills/nai-harn-phuket-thailand.html" class="blu">Villa Thousand Hills</a> beside Nai Harn beach, Phuket, allows you to open between 2 and 9 bedrooms, sleeps up to 22 and is a few steps to one of the best snorkeling beaches on the island. This modern villa just completed in 2017 comes with all the facilities you could need, and provides a multi-van for airport transfers and daily complimentary use for your stay.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >When to visit Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are three distinct seasons - the hot season from March to May, the cool season from November to February and the rainy season from June to October. But take your pick as even in rainy season this can just be an afternoon shower in a lovely day.
                    </div>
                </div>
                
                
            <div class="col-md-12 nopad top41">
            <h2 class=" mb f30 top"><strong><a class="tg cdf" >2018/ 2019 Thailand Beachfront Villas Cost Survey</a></strong></h2>
            
            	<div class="col-md-12 nopad top21 f18">
                   By offering the largest selection of beach villas in Thailand we are able to analyse our rentals and publish this accurate and current up-to-date data.<br>
                    Prices will vary based on villa location, time of year, number of nights, size of group, any booking windows and the villa premium itself.<br>
                    On average across 2018 Thailand beachfront villas cost USD$346.50++ per room per night in Thailand.<br>
                    This equates to USD$173.25++ per person.<br>
                    Providing a helpful guide to 2019 this average cost per person in Australia Dollars is AUD$241++ as of December 2018.<br>
                    Thailand tax ++ is 17.7% 
                </div>
            </div>
            
            
            
            
            <div class="col-md-12 nopad top41">
            <h2 class=" mb f30 top"><strong><a class="tg cdf" >FAQs</a></strong></h2>
            </div>
            
            <div class="col-md-12 nopad top41">
            <h2 class=" mb f22 top"><strong><a class="tg cdf" >1. What is a beachfront villa</a></strong></h2>
                <div class="col-md-12 nopad top21 f18">
                   A beachfront villa has direct access from the villa grounds to the beach. Often the villa will have a garden with a pool area leading directly to the beach. Please note there are many more beach villas in Koh Samui than there are in Phuket. Mostly the villas in Phuket are in the hills behind the beach or on clifftops above.
                </div>
            </div>
            
            
             <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >2. Do villas require a minimum number of nights booking</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Most villas ask for a minimum number of nights stay to be able to make any booking.<br>
    This is typically 3 nights throughout the year although at peak and high season this can increase to 5, 7 and even 10 nights. At the bottom of our villa details pages we show the minimum nights required at the different times of the year.
                    </div>
                </div>
    
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >3. Peak Season Travel advice</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are particular times of year when Thailand becomes very busy.<br>
    The peak seasons are December, January and Chinese New Year.<br>
    At these times villa bedroom pricing can increase and a larger minimum number of nights may be required to book.<br>
    Plan ahead, if you are staying here during peak season then advance planning will reward you as often the flights are full up for long periods and it is much more expensive to travel and stay.
                    </div>
                </div>
    
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >4. How do I book excursions for our stay</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        With us. We have representatives on the ground in both Phuket and Koh Samui and so we can help you plan and book your excursions before you arrive.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >5. Who does all the grocery shopping that we will need</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        The villa staff or you can shop yourself if you wish.<br>
                        The staff only objective is to be helpful where they can, according to your requests.<br>
                        Don’t forget in nearly all villas you have a full-time chef who is on standby for a luncheon or evening barbecue. All you have to do is ask.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >6. How are children accommodated</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Beach villas are perfect for children with games, swimming and fun flowing from the garden straight onto the white sand. Most villas have kayaks and paddle boards. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >7. What time is check-in and check-out</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by late morning or midday. Each villa is different so please ask us.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >8. How do I book</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.<br>
    When you decide which villa, the Owner will hold the villa for a period of time to receive a deposit. 
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >9. Do I need a visa for Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        For many passport holders travelling to Thailand it’s easy as you will receive a 30 day tourist visa on arrival at the airport with no planning required. Please check with your own government travel advisory service for further information.
                    </div>
                </div>
                <?php
            }// beachfront content
            ?>
            </div><?php /*?>thai<?php */?>
        <?php
		}
		else
		{
			//echo "000000000";
		}
		?>
    </div>
<?php include "footer_all_collection.php";?>
<?php include "footer_koh_samui.php";?> 
<?php include "footer_phuket.php";?>  
<?php include "footer_beach_v_1.php";?>        
<div class="container-fluid new_foot webss padtop50 <?php echo $f_foot_2;//.' '.$f_hidden;?>">
    <div class="container">   
    	<div class="col-md-12 nopad top41">
            <h2 class=" mb f30 tg top text-center"><strong><?php /*?><a class="tg1 blu cdf" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" style="cursor:pointer !important;"><?php */?>Unique Experiences - Luxury Villa Rental <?php /*?></a><?php */?></strong></h2><?php /*?>Unique Experiences  - Luxury Villa Rental<?php */?>
        </div>  
        <?php
		/*if($destination=='39')
		{*/?>
           <?php /*?> <div class="col-md-12 nopad top41">
                <div class="col-md-12">
                    <h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Koh Samui Villa Rentals</a></strong></h2>
                    <div class="col-md-6 nopad top41 text-center  f18 blu">
                        <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui luxury villas</a>
                    </div>
                    <div class="col-md-6 nopad top41 text-center  f18 blu" style="margin-bottom: 37px;">
                        <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui Beach Villas</a>
                    </div>
                </div>
            </div><?php */?>
        <?php
		/*}
		else
		{*/
			?>
			<div class="col-md-12 nopad top21">
                
                <div class="col-md-4">
                    <?php /*?><h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Thailand Luxury Villas</a></strong></h2><?php */?>
                    <div class="col-md-12 nopad top41 text-center f18 blu"> <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Luxury Beach Villas Thailand</a>
                    </div>
                    <div class="col-md-12 nopad top21 text-center f18 blu"> <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Thailand</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php /*?><h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Koh Samui Villa Rentals</a></strong></h2><?php */?>
                    <div class="col-md-12 nopad top41 text-center f18 blu"> <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui luxury villas</a>
                    </div>
                    <div class="col-md-12 nopad top21 text-center f18 blu" style="margin-bottom: 37px;"> <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui Beach Villas</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php /*?><h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Phuket Villa Rentals</a></strong></h2><?php */?>
                    <?php
					/*if($_SERVER['REQUEST_URI']=='/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
					{
						$f_link = '<a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket Beachfront Villas</a>';
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
					{
						$f_link = '<a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket Beachfront Villas</a>';
					}
					else
					{
						$f_link = '<a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Phuket</a>';
					}*/
					?>
                    <div class="col-md-12 nopad top41 text-center f18 blu"> <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Phuket</a>
                    </div>
                    <div class="col-md-12 nopad top21 text-center f18 blu"> <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket Luxury Beachfront Villas</a>
                    </div>
                </div>
            </div>
            
			<?php
			
		/*}*/
        ?>
        
        
    </div> 
</div> 
    <?php
	if($_REQUEST['page']=='forrent')
	{?>    
    <div class="container">   
    	<div class="col-md-12 nopad top211">
        	<?php include "libs/pages/fr_description.php";?>
        </div>
    </div>  
    <?php }?>
   
    
    
    
    <?php
	if($_SERVER['REQUEST_URI']=='/' || $_SERVER['REQUEST_URI']=='/our-service'|| $_SERVER['REQUEST_URI']=='/blog'|| $_SERVER['REQUEST_URI']=='/faq'|| $_SERVER['REQUEST_URI']=='/contact' )
	{
		$fooo = 'hidden';
	}
	else
	{
		$fooo = '';
	}
	?>
    
	
    <?php /*?><div class="container-fluid topfoot webss NNNNNSSSSSSS <?php  echo $fooo;?>   <?php  echo $hidd.' '.$old_footer;?> <?php echo $hid_main;?>"><?php */?>
    	
        <?php //include "libs/pages/footer_collection.php";?>
        
        
    
    
   


<?php
function check_links_footer($c_des,$c_beach,$c_room,$c_collection)
{
	global $dbc;
	//echo '----------'.$c_des.'---'.$c_beach.'---'.$c_room.'---'.$c_collection."<br>";
	
	$s_des = '';
	$s_sub = '';
	$s_room = '';
	$s_cate = '';
	
	if($c_des==0)
	{
		$s_des = "WHERE properties.destination BETWEEN 38 AND 39 ";
	}
	else
	{
		$s_des = "WHERE properties.destination = ".$c_des;
	}
	
	if($c_beach==0)
	{
		$s_sub = "";
	}
	else
	{
		$s_sub = "AND properties.subdestination = ".$c_beach;
	}
	
	if($c_room==0)
	{
		 $s_room = "";
	}
	else
	{
		$s_room = "AND property_room.room = ".$c_room;
	}
	
	if($c_collection==0)
	{
		$s_cate = "";
	}
	else
	{
		$s_cate = "AND property_cate.caategory = ".$c_collection;
	}
	
	/*echo "SELECT properties.id,properties.`name` AS pname,property_cate.caategory AS cate,property_room.room AS room,properties.destination AS des,properties.subdestination AS sub,properties.`status` AS `status`
		FROM properties
		LEFT JOIN property_cate ON properties.id = property_cate.property
		LEFT JOIN property_room ON properties.id = property_room.property
		".$s_des." ".$s_sub." ".$s_room." ".$s_cate." AND properties.status > 0 <br>";*/
			
	$Qqry = $dbc->Query("SELECT
			properties.id,
			properties.`name` AS pname,
			property_cate.caategory AS cate,
			property_room.room AS room,
			properties.destination AS des,
			properties.subdestination AS sub,
			properties.`status` AS `status`
		FROM
			properties
		LEFT JOIN property_cate ON properties.id = property_cate.property
		LEFT JOIN property_room ON properties.id = property_room.property
		".$s_des." ".$s_sub." ".$s_room." ".$s_cate." AND properties.status > 0");	
	
	$numss = $dbc->Getnum($Qqry);
	//echo  ">>--".$numss."--<<<br>";
	if($numss>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function destination_footer($option)
{
    switch($option)
    {
        case "38" :
            return "thailand-phuket";//"phuket";
        break;
        case "39" :
            return "thailand-koh-samui";//"koh-samui";
        break;
        default:
            return "thailand";
    }
}

function destination_name($option)
{
    switch($option)
    {
        case "38" :
            return "Phuket";//"phuket";
        break;
        case "39" :
            return "Koh Samui";//"koh-samui";
        break;
        default:
            return "Thailand";
    }
}

function bed_footer($option)
{
    switch($option)
    {
        case "1" :
            return "1-4-bedrooms";//"1-4";
        break;

        case "2" :
            return "5-7-bedrooms";//"5-7";
        break;
        case "3" :
            return "8-10-bedrooms";//"8-10";
        break;
        case "4" :
            return "over-10-bedrooms";//"11";
        break;
        default:
            return "all-bedrooms";//"all-bed";
    }
}

function bed_footer_name($option)
{
    switch($option)
    {
        case "1" :
            return "2,3,4 bedroom";//"1-4";
        break;
        case "2" :
            return "5,6,7 bedroom";//"5-7";
        break;
        case "3" :
            return "8,9,10> bedroom";//"8-10";
        break;
        /*case "4" :
            return "> 10 bedroom";//"11";
        break;*/
        default:
            return "all-bedroom";//"all-bed";
    }
}

function beach_footer($option)
{
    switch($option)
    {
        case "54" :
            return "angthong-beach";
        break;
        case "55" :
            return "ao-po-beach";//"aopo-beach";
        break;
        case "56" :
            return "bang-po-beach";
        break;
        case "58" :
            return "bangrak-beach";
        break;
        case "59" :
            return "bang-tao-beach";//"bangtao-beach";
        break;
        case "60" :
            return "bophut-beach";//"bo-phut-beach";
        break;
        case "61" :
            return "cape-yamu";
        break;
        case "62" :
            return "chaweng-noi-beach";
        break;
        case "63" :
            return "chaweng-beach";
        break;
        case "64" :
            return "choeng-mon-beach";
        break;
        case "65" :
            return "haad-thong-lang-beach";
        break;
        case "66" :
            return "kamala-beach";
        break;
        case "67" :
            return "kata-beach";
        break;
        case "68" :
            return "laem-noi-beach";
        break;
        case "69" :
            return "laem-set-beach";
        break;
        case "70" :
            return "laem-yai-beach";
        break;
        case "71" :
            return "lamai-beach";
        break;
        case "72" :
            return "layan-beach";
        break;
        case "73" :
            return "laem-sor-beach";
        break;
        case "74" :
            return "lipa-noi-beach";
        break;
        case "75" :
            return "maenam-beach";
        break;
        case "76" :
            return "naithon-beach";
        break;
        case "77" :
            return "natai-beach";
        break;
        case "78" :
            return "phuket-town";
        break;
        case "79" :
            return "plai-leam-beach";
        break;
        case "80" :
            return "surin-beach";
        break;
        case "81" :
            return "taling-ngam-beach";
        break;
        case "83" :
            return "cape-panwa-beach";
        break;
        case "84" :
            return "ao-yon-bay";
        break;
        case "85" :
            return "patong";
        break;
        case "86" :
            return "ao-makham-bay";
        break;
        case "87" :
            return "kalim-beach";
        break;
        case "88" :
            return "chalong-bay";
        break;
        case "89" :
            return "rawai-beach";
        break;
        case "96" :
            return "nai-harn";
        break;
		case "97" :
            return "nathon-beach";
        break;
        default:
            return "all-beach";
    }
}

function collection_footer($option)
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
function collection_footer_name($option)
{
    switch($option)
    {
        case "2" :
            return "Party";
        break;
        case "3" :
            return "Family";
        break;
        case "4" :
            return "Seaview";
        break;
        case "5" :
            return "large Group";
        break;
        case "6" :
            return "Beachfront";
        break;
        case "8" :
            return "Wedding";
        break;
        default:
            return "all-collections";
    }
}
?>