
<?php include "libs/pages/fr_head.php";?>

<?php //include "libs/pages/search_forrent.php";?>
<style>
 .new_foot
 {
	 background:#f8faf5;
 }
 .pad20
 {
	 padding:20px;
 } 
 .padtop50
 {
	 padding-top:0px;
	 padding-bottom:50px;
 }
 .top69
 {
	 margin-top: 69px;
 }
  .top41
 {
	 margin-top: 41px;
 }
   .top21
 {
	 margin-top: 21px;
	 margin-bottom:0px;
 }
 .f30
 {
	 font-size:30px;
 }
 .blu,.blu>a
 {
	 color:#236AB7 !important;
 }
 .tg
 {
	 color:#4b565b !important;
 }
</style>





<?php

if(isset($_REQUEST['des']))
{
	if($_REQUEST['des']=='all')
	{
		$thai = '';
		$show_thai='';
		$show_koh_samui='hidden';
		$show_phuket='hidden';
		
		if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
		{
			$show_thai='';
			$show_koh_samui='hidden';
			$show_phuket='hidden';
			$hiddd = "hidden";
			$f_hidden = "";
		}
		else
		{
			$show_thai='hidden';
			$show_koh_samui='hidden';
			$show_phuket='hidden';
			$hiddd = "";
			$f_hidden = "hidden";
		}
		//$br2 = "<br>";
	}
	elseif($_REQUEST['des']=='38')
	{
		$phuket = '';
		$show_thai='hidden';
		$show_koh_samui='hidden';
		$show_phuket='';
		
		if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
		{
			$show_thai='hidden';
			$show_koh_samui='hidden';
			$show_phuket='';
			$hiddd = "hidden";
			$f_hidden = "";
		}
		else
		{
			$show_thai='hidden';
			$show_koh_samui='hidden';
			$show_phuket='hidden';
			$hiddd = "";
			$f_hidden = "hidden";
		}
		//$br2 = "<br>";
	}
	elseif($_REQUEST['des']=='39')
	{
		$samui = '';
		$show_thai='hidden';
		$show_koh_samui='';
		$show_phuket='hidden';
		
		if($_REQUEST['cate']==6 || $_REQUEST['cate']==0)
		{
			$show_thai='hidden';
			$show_koh_samui='';
			$show_phuket='hidden';
			$hiddd = "hidden";
			$f_hidden = "";
		}
		else
		{
			$show_thai='hidden';
			$show_koh_samui='hidden';
			$show_phuket='hidden';
			$hiddd = "";
			$f_hidden = "hidden";
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
	
	
	$show_thai='';
			$show_koh_samui='hidden';
			$show_phuket='hidden';
			$hiddd = "hidden";
			$f_hidden = "";
	
}
?>
<footer itemprop="brand" itemscope itemtype="http://schema.org/Brand" itemref="_logo6" class="mg-footer my_footers" >

	<div class="container-fluid  webss padtop50 new_foot">
    </div>
    <br>
		<div class="container-fluid  webss padtop50">
            <div class="container  ">
            	                <h2 class=" mb f30"><strong><a class="tg cdf" >Discover in the Best Luxury Villas Koh Samui</a></strong></h2>
                <div class="col-md-12 nopad top41 f18">
                    Koh Samui is a beautiful tropical island in the southern Gulf of Thailand. Relaxed, laid back and small, everything is easy and convenient.
    The type of villa holiday you go to for a week’s break to refresh & recharge in secluded privacy. 
    
                </div>
                
                <!--<div class="col-md-12 nopad top41">
                <h2 class=" mb f18 top"><strong><a class="tg cdf" >Koh Samui villa rentals</strong></h2>
                </div>-->
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Koh Samui villa rentals</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There is a wide range of luxury villas for rent in Koh Samui and a wide range of pricing too. Even if a villa is large with eight bedrooms they will let you use less bedrooms and pay less per night. But you still get the use of the entire private villa and all its amenities.<br>
    Prices vary between seasons and are highest over the peak season of Christmas and New year.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >What is included in your villa holiday</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        When you rent a private villa it’s your personal accommodation for that period of time. All the villas are staffed with a villa manager, housekeeping, and nearly all include a full time chef. All have facilities such as cinema, games and fitness rooms.<br>
                        And their private pools of course.<br><br>
    
    
    All you need to do is pay for your groceries should you wish the chef to cook meals for you. But dont worry, you wont need to go shopping, that will happen whilst you are lying beside the pool. Daily breakfast is often included.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Luxury villa rentals Koh Samui</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There are a range of villas to rent in Koh Samui which are able to serve groups of different sizes
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html">2,3,4 bedroom villas Koh Samui</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There is a great range of mid sized villas for your Koh Samui holiday villa.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html">5,6,7 bedroom villas Koh Samui</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        These villas offer the largest flexibility in group numbers. Sleeping up to 14 adults and children but allowing you to pay less and use less     bedrooms too. So a smaller group can get a great villa to hang out in at a much reduced price.<br>
    Most have cinema room, games and fitness room as well as other amenities.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html">8,9,10 > bedroom villas Koh Samui</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Finally there are the large group luxury villas with expansive space and amenities.<br>
    These 8,9,10 > bedroom villas offer huge space with many different indoor and outdoor areas for extended groups
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >What type of luxury villas are available for rent on Koh Samui?</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        1.Beachfront Villas Koh Samui offer the sand between your toes and the feeling you need go nowhere else. Kayaks on the beach, sunset swims, beach restaurants just a walk away. There are exquisite <a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui villas on the beach</a> and even some with private beaches.<br><br>
     
    2.In the hills above are many beautiful private villas. Villas that offer privacy and panoramic views of the Gulf of Thailand.
    There are many seaview villas in Koh Samui as most beaches on the island have hilltops behind them.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top21">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >Popular Villa locations Koh Samui</a></strong></h2>
                </div>
                
                <div class="col-md-12 nopad top21">
                <!--<h2 class=" mb f22 top"><strong><a class="tg cdf" >Where to go in Thailand</a></strong></h2>-->
                    <div class="col-md-12 nopad  f18">
                        Koh Samui is quite small with a few locations being the most popular for private villa rentals. Here are the top destinations your next luxury villa vacation.
                    </div>
                </div>
                
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ></a><a class="blu" href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html">1,2,3 Bophut Villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        A beautiful beach with many restaurants and shops in the charming Fishermans Village. The sweeping bay is perfect for swimming with clear safe water. There are many luxury villas for rent in Bophut Koh Samui looking out to it’s neighbouring island.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ></a><a class="blu" href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html">1,2,3 Chaweng Villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Chaweng is the center of the nightlife, entertainment and restaurants in Koh Samui, located around one of the islands best beaches.
    Chaweng Noi just to the south offers more tranquil surroundings with convenient access to this busy area. 
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ></a><a class="blu" href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html">1,2,3 Maenam Villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Maenam is next to Bophut on the north of the island directly facing the island of Koh Phangan. A beautiful long bay with crystal clear water there are many beachfront luxury villas here.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ></a><a class="blu" href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html">1,2,3 Lipa Noi Villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Lovely secluded bay away from any tourist trail, quiet and safe for swimming.<br>
There are beach villas all the way along this beautiful beach and Niki beach club is located here.
                    </div>
                </div>
                
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" ></a><a class="blu" href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html">1,2,3 Lamai Villas</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Koh Samui’s second tourist center there are plenty of restaurants, cafes and bars here.<br>
The villas are away from the center and in prime beach or hillside locations.
                    </div>
                </div>
                
                
                
                 
                 
                 
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >FAQ</a></strong></h2>
                    <!--<div class="col-md-12 nopad top41">
                        There are three distinct seasons - the hot season from March to May, the cool season from November to February and the rainy season from June to October. But take your pick as even in rainy season this can just be an afternoon shower in a lovely day.
                    </div>-->
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >1.How are children accommodated</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Private villas are prefect for children. More space to run around and specific areas of the villa for them to hang out. Most villas have games and cinema rooms and of course every one of the villas has its own private pool. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >2.Can you organise my <a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html">Koh Samui Villa Wedding</a></a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Yes of course, small or large weddings can be organized in these luxury villas. We can liaise with wedding villa planners on Koh Samui and help organize your big day.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f22 top"><strong><a class="tg cdf" >3.How do I book</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available. When you decide which villa, the Owner will hold the villa for a period of time to receive a deposit.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >How to get to Koh Samui</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        There is one airport on the island.Known as one of the coolest airports in the world, with open air boarding gates and trolley buses that take you to your plane. International flights arrive from China, Hong Kong, Singapore and Kuala Lumpur. Domestic flights arrive daily from Bangkok where international flights connect.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h2 class=" mb f30 top"><strong><a class="tg cdf" >When to go to Koh Samui</a></strong></h2>
                    <div class="col-md-12 nopad top21 f18">
                        Peak season is Christmas and New Year followed by dry season through to end of April. Monsoon rains come in June, October and November.
                    </div>
                </div>

            </div>
		</div>
  
  
  
  
  
  
  
  
  
  
  
      
<div class="container-fluid new_foot webss padtop50 <?php echo $f_foot.' '.$f_hidden;?>">
    <div class="container">   
    	<div class="col-md-12 nopad top41">
            <h2 class=" mb f30 top text-center"><strong><a class="tg cdf"> Unique Experiences  - Luxury Villa Holidays</a></strong></h2>
            <!--<div class="col-md-12 nopad top41">
                A deposit between 30-50% is required dependent on how far forward the stay is. This deposit can be paid by bank transfer or credit card.<br>
The remaining balance is payable 45 days prior to arrival except for peak season of Christmas and New Year which is payable 90 days 
in advance.
            </div>-->
        </div>  
        <div class="col-md-12 nopad top41">
            <div class="col-md-6">
                <h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Koh Samui Villa Rentals</a></strong></h2>
                <div class="col-md-12 nopad top41 text-center  f18 blu">
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui luxury villas</a>
                </div>
                <div class="col-md-12 nopad top21 text-center  f18 blu">
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui Beach Villas</a>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Explore Phuket Villa Rentals</a></strong></h2>
                <div class="col-md-12 nopad top41 text-center f18 blu">
                    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Phuket</a>
                </div>
                <div class="col-md-12 nopad top21 text-center f18 blu">
                    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket Luxury Beachfront Villas</a>
                </div>
            </div>
        </div>
    </div> 
</div> 

</footer>
    
<style>
  #map {
	height: 400px;
	width:100%;
  }
</style>
<!--action-load-more-porperty-->
<script>
var des = '<?php echo isset($_REQUEST['des'])?$_REQUEST['des']:'all';?>';
var beach = '<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>';
var price = '<?php echo isset($_REQUEST['pri'])?$_REQUEST['pri']:'all';?>';
var cate = '<?php echo isset($_REQUEST['cate'])?$_REQUEST['cate']:'0';?>';
var room = '<?php echo $_REQUEST['room'];?>';
var tigg = true;
var starts = 15;
var stoped = '<?php echo $num;?>';
var my_footers;
$(document).ready(function(e) {
	
	
	
    $(window).scroll(function () {
		if($(window).width()<976)
		{
			my_footers = $(".my_footers").offset().top-550;
		}
		else
		{
			my_footers = $(".my_footers").offset().top-850;
		}
		
		if ($(this).scrollTop() > my_footers) 
		{
			if(tigg==true)
			{
				//alert(starts);
				tigg = false;
				$(".loadd").fadeIn(100);
				$.ajax({
					url:"<?php echo $url_link;?>libs/actions/action-load-more-porperty.php",
					type:"POST",
					dataType:"html",
					data:{des:des,sub:beach,pri:price,starts:starts,room:room,cate:cate},
					success: function(res){
						$(".loadd").fadeOut(100);
						$(".rooms").append(res);
						
						if(starts<=stoped)
						{
							starts+=15;
							tigg = true;
						}
						else
						{
							starts=stoped;
							tigg = false;
						}
						
					}
				});
			}
			
			
		}
		else
		{
			
		}
	});
});
</script>





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
	//foreach($arr_map as $map)
//	{
//		?>
//		{
//			position: new google.maps.LatLng(<?php echo $map['la'];?>, <?php echo $map['lo'];?>),
//			type: 'info'
//		},
//		<?php
//	}
	?>
	];

	for (var i = 0, feature; feature = features[i]; i++) {
	  addMarker(feature);
	}
  }*/
</script>
<script src="<?php echo $url_link;?>libs/js/inspiring.js"></script>

