
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
					if($_REQUEST['cate']==8 || $_REQUEST['cate']==6 || $_REQUEST['cate']==0 || $_REQUEST['cate']==5 )
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
					elseif($_REQUEST['cate']==5 )
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


$mtop ='';
$f_foot_2 = "";
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
	
	if($_REQUEST['des']=='all' && $_REQUEST['cate']!='8')
	{
		$f_foot = "hidden";
	}
	else
	{
		$f_foot = "";
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
<?php if($_REQUEST['page']=='home')
{?>
<style>
.my_footers div.top70{
	margin-top:0px;
}
</style>
<?
}
?>
 <?php /*?>?page=forrent& des=all & sub=all & pri=all & room=all & cate=0 & sort=all<?php */?>
<footer  class="mg-footer my_footers" style=" <?php echo $mtop;?>background:#fff;    margin-top: -22px;" ><?php //echo '----'.$_REQUEST['room'];?>

		<?php
        if($_REQUEST['des']=='all' && $_REQUEST['cate']=='5')
		{
			?><div class="container-fluid  webss padtop50 new_foot  "></div><?php
		}?>
        
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
        
        // do not show video for 
        // ANY SUBDESTINATIONS(including Thailand ones)
        // ANY OTHER REGIONS other than Thailand, Phuket and KS
        // in other words: only show for Phuket & Koh Samui if no sub-destination is selected
        
        $countryID = countryIdSlugNameFromDestinationID($_REQUEST['des'])[0];
        $destinationID = $_REQUEST['des'];
        $subdestinationID = $_REQUEST['sub'];
        $showVideo = 0;
        
        if( $countryID == 2 && ($destinationID == 38 || $destinationID == 39) && $subdestinationID == 'all' ) $showVideo = 1;

        //die("<br>\ncountryID = $countryID\nhello \ndestinationID = " . $destinationID . "\nsubdestinationID = $subdestinationID\nshowVideo = $showVideo");        
        
		if($page=='forrent' && $showVideo == 1 )
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
            
            
            <?php
            if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8)
            {?>
                
                
               
                
            <?php
            }
            elseif($_REQUEST['cate']==6) //beachfront content
            {
                
                ?>
                <div class="container-fluid  webss padtop502  <?php echo $show_thai;?>" ><?php /*?>style="padding-top: 46px;"<?php */?>
            </div>
            <div class="container  <?php echo $show_thai;?> top70">
            
            
                <h2 class=" mb f30"><strong><?php /*?><a class="tg cdf" ><?php */?><br><br>Discover Luxury Beach Villas Thailand<?php /*?></a><?php */?></strong></h2>
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
                <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Villas with staff & full-time chef<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        One of the biggest attractions of renting your own villa is the level of service and attention.<br>
    The villa manager is your personal concierge for your stay<br>
    Then there is the housekeeping staff and your private full-time chef.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Private Villa Rental<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Villas open different number of bedrooms so your group requirement does not have to match the villa size. And you still get all the villa amenities to use. In our search results we state the range of bedrooms that each villa will open for a booking. We list all the villas that accommodate the number of bedrooms you search so all you have to do is choose the bedroom number range that matches your group and you will be able to view every villa available.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Beach Villas Thailand<?php /*?></a><?php */?></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket beachfront villas for rent</a><?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These villas offer luxurious comforts in the most stunning settings directly on the beach.<br>
    With the limited number of beach villas in Phuket it is best to book well in advance.<br><br>
    In Phuket you will find many incredible <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" class="blu">Sea view villas</a><br>
    These can be found in the hills and cliffs above the beaches.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui beachfront Villas</a><?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There is a large selection of villas on the beach for rent here.<br>
    Not all beaches in Koh Samui are swimmable so be sure to choose the right beach.<br>
    Quick guide - Taling Ngam & Laem Sor are not swimmable beaches.
                    </div>
                </div>
                
                
                <?php /*?><div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >Where can I find the full selection of beach villas in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Right here is the answer. We represent all the very best villas and other agents have to rent them through us so if you would like to rent a private beach villa direct from the owner then Inspiring Villas is the place to do this.
                    </div>
                </div><?php */?>
                
                <?php /*?><div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><a class="tg cdf" >Could this be the best beach villa in Thailand</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        We think so. <a href="/luxury-villas/villa-thousand-hills/nai-harn-phuket-thailand.html" class="blu">Villa Thousand Hills</a> beside Nai Harn beach, Phuket, allows you to open between 2 and 9 bedrooms, sleeps up to 22 and is a few steps to one of the best snorkeling beaches on the island. This modern villa just completed in 2017 comes with all the facilities you could need, and provides a multi-van for airport transfers and daily complimentary use for your stay.
                    </div>
                </div><?php */?>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>When to visit Thailand<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are three distinct seasons - the hot season from March to May, the cool season from November to February and the rainy season from June to October. But take your pick as even in rainy season this can just be an afternoon shower in a lovely day.
                    </div>
                </div>
                
                
            <div class="col-md-12 nopad top41">
            <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2018/ 2019 Thailand Beachfront Villas Cost Survey<?php /*?></a><?php */?></strong></h2>
            
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
            <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>FAQs<?php /*?></a><?php */?></strong></h2>
            </div>
            
            <?php /*?><div class="col-md-12 nopad top41">
            <h2 class=" mb f22 top"><strong><a class="tg cdf" >1. What is a beachfront villa</a></strong></h2>
                <div class="col-md-12 nopad top21 f18">
                   A beachfront villa has direct access from the villa grounds to the beach. Often the villa will have a garden with a pool area leading directly to the beach. Please note there are many more beach villas in Koh Samui than there are in Phuket. Mostly the villas in Phuket are in the hills behind the beach or on clifftops above.
                </div>
            </div><?php */?>
            
            
             <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>1. Do villas require a minimum number of nights booking<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Most villas ask for a minimum number of nights stay to be able to make any booking.<br>
    This is typically 3 nights throughout the year although at peak and high season this can increase to 5, 7 and even 10 nights. At the bottom of our villa details pages we show the minimum nights required at the different times of the year.
                    </div>
                </div>
    
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2. Peak Season Travel advice<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are particular times of year when Thailand becomes very busy.<br>
    The peak seasons are December, January and Chinese New Year.<br>
    At these times villa bedroom pricing can increase and a larger minimum number of nights may be required to book.<br>
    Plan ahead, if you are staying here during peak season then advance planning will reward you as often the flights are full up for long periods and it is much more expensive to travel and stay.
                    </div>
                </div>
    
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>3. How do I book excursions for our stay<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        With us. We have representatives on the ground in both Phuket and Koh Samui and so we can help you plan and book your excursions before you arrive.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>4. Who does all the grocery shopping that we will need<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        The villa staff or you can shop yourself if you wish.<br>
                        The staff only objective is to be helpful where they can, according to your requests.<br>
                        Don’t forget in nearly all villas you have a full-time chef who is on standby for a luncheon or evening barbecue. All you have to do is ask.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>5. How are children accommodated<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Beach villas are perfect for children with games, swimming and fun flowing from the garden straight onto the white sand. Most villas have kayaks and paddle boards. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>6. What time is check-in and check-out<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by late morning or midday. Each villa is different so please ask us.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>7. How do I book<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.<br>
    When you decide which villa, the Owner will hold the villa for a period of time to receive a deposit. 
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                    <h2 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>8. Do I need a visa for Thailand<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        For many passport holders travelling to Thailand it’s easy as you will receive a 30 day tourist visa on arrival at the airport with no planning required. Please check with your own government travel advisory service for further information.<br><br>
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
<?php 

    include "footer_all_collection.php";
    include "footer_koh_samui.php"; 
    include "footer_phuket.php";  
    include "footer_beach_v_1.php"; 
    
    include "marketing_footer/config.inc.php"; 

	if($_REQUEST['page']=='forrent')
	{
?>  
  
    <?php /*?><div class="container">   
    	<div class="col-md-12 nopad top211">
        	<?php include "libs/pages/fr_description.php";?>
        </div>
    </div>  <?php */?>
<?php }

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