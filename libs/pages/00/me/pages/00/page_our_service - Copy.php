<?php /*?><div id="mega-slider" class="carousel slide " data-ride="carousel" style="margin-top:97px !important;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
        <li data-target="#mega-slider" data-slide-to="1"></li>
        <li data-target="#mega-slider" data-slide-to="2"></li>
        <li data-target="#mega-slider" data-slide-to="3"></li>
        <li data-target="#mega-slider" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active beactive">
            <img src="libs/images/web/cover/Header Photos- Blog&Life Style.jpg" width="100%" alt="...">
            <!--<div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Welcome to Mega Hotel</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
        <div class="item ">
            <img src="libs/images/web/cover/Header Photos2.jpg" width="100%" alt="...">
            <!--<div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Welcome to Mega Hotel</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
        <div class="item ">
            <img src="libs/images/web/cover/Header Photos3.jpg" width="100%" alt="...">
            <!--<div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Welcome to Mega Hotel</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
        <div class="item ">
            <img src="libs/images/web/cover/Header Photos4.jpg" width="100%" alt="...">
            <!--<div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Welcome to Mega Hotel</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
        <div class="item ">
            <img src="libs/images/web/cover/Header Photos5.jpg" width="100%" alt="...">
            <!--<div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Welcome to Mega Hotel</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
        <!--<div class="item">
            <img src="libs/images/slide-2.png" alt="...">
            <div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Feel Like Your Home</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
        <div class="item">
            <img src="libs/images/slide-3.png" alt="...">
            <div class="carousel-caption">
                <img src="libs/images/stars.png" alt="">
                <h2>Perfect Place for Dining</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>-->
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev" style="margin-top: -60px!important;">
    </a>
    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next" style="margin-top: -60px!important;">
    </a>
</div><?php */?>
<?php 
$cover = $dbc->GetRecord("cover","*","page='service' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
?>
<style>
/*.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
    /* background-position: 0% !important; *5/
    color: #fff;
    text-align: center;
    height: 600px;
    /* background: red; *5/
}*/
</style>
<div class="mg-page-titles "><!--parallax-->
    <div class="container-fluid nopad">
            <img src="<?php echo $photo_cover;?>" alt="" width="100%">
        <div class="row">
            <!--<div class="col-md-12">
                <h2>Our Service</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>

<div class="mg-team pb70">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                <div class="mg-sec-title">
                    <h2>OUR SERVICES</h2>
                </div>
                <h5 class="mg-widget-title">OUR SERVICES</h5>
                <p>At Inspiring Villas we pride ourselves on knowing what our guests want before they have to ask for it. This allows us to give you the best service found anywhere on Phuket Island. We aim to make the experience of choosing Inspiring Villas a pleasant one from the time you book until you check out.</p>
                <h5 class="mg-widget-title">Booking Process</h5>
                <p>Our booking service is provided by a knowledgeable, Phuket-based staff that has experienced the comfort and splendor of our villas first hand. We have beach front villas for a romantic getaway, large villas for corporate work retreats, villas where you can throw a spectacular bachelor party, and much more. No matter what you’re looking for, our service-minded staff has the perfect, fully-serviced villa already waiting for you.</p>
                <p>On our website just choose the location and indicate the number of guests and the purpose of your stay. We’ll confirm the condition and availability of your request and then once we locate the villa that suits your needs, we’ll confirm your booking. We accept payments by international bank transfer, Paypal, and Credit Card. All our prices are guaranteed so you can be rest assured you are getting the best rate for our 5-star services from the moment you book until your stay with us ends.</p>
                <h5 class="mg-widget-title">Concierge Service</h5>
                <p>Our top-notch concierge service sets us apart from any hotel or other villa operator in Phuket. Our concierge staff gets to work before you even arrive; whether it is getting necessities like your grocery list, setting up a dive class, or arranging a yacht to sail around the turquoise Andaman Sea. Once the team has arranged for all your needs, they coordinate with the villa manager to assure your villa is ready for you. We’ll do one last pre-check-in inspection to make sure all is just right and then we’ll head to the airport to pick you up.</p>
                <p>Once you have arrived you’ll be welcomed with a guest welcome pack and everything you requested in place. Each villa we run is fully-serviced with daily cleaning service and linen change every three days. Every villa comes with a private chef and guest support available 24/7.  Additionally, we hold a Thailand Tourism License meaning all members of your party are properly insured during sightseeing tours or any other excursions you might want to go on.</p>
                <p>As our guest, we endeavor to provide everything you and your guests need to make your stay as pleasurable as can be. Inspiring Villas doesn’t just supply 5-star accommodation in clean and comfortable villas. We are so much more. Book a villa today to begin your path toward inspiration.</p>
            </div>
        </div>
    </div>
</div>

<div class="mg-team pb70" style="margin-top: -15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mg-sec-title">
                    <h2>WHAT OTHERS SAY ABOUT US</h2>
                   <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>-->
                </div>
            </div>
        </div>
        <div class="row">
        
         <!-- Swiper -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/css/swiper.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/js/swiper.min.js"></script>
         <style>
			
			.swiper-container {
				width: 100%;
				height: 100%;
			}
			.swiper-slide {
				text-align: center;
				font-size: 18px;
				background: #fff;
				/* Center slide text vertically */
				display: -webkit-box;
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;
				-webkit-box-pack: center;
				-ms-flex-pack: center;
				-webkit-justify-content: center;
				justify-content: center;
				-webkit-box-align: center;
				-ms-flex-align: center;
				-webkit-align-items: center;
				align-items: center;
			}
			p
			{
				font-size:14px;
			}
			</style>
            <div class="swiper-container" >
                <div class="swiper-wrapper">
                <?php 
				$testimonial = $dbc->Query("select * from testimonial where status > 0");
				while($line = $dbc->Fetch($testimonial))
				{
					$det = base64_decode($line['detail'],true);
					echo '<div class="swiper-slide">';
                    	echo '<div class="col-md-12 text-left">';
                        echo '<p class="f14"><strong>'.$line['name'].'</strong></p>';
                        echo '<p class="f14" style="margin-top: -15px;font-size:14px;">'.$det.'</p>';
                        echo '</div>';
                    echo '</div>';
				}
				?>
                    <!--<div class="swiper-slide">
                    	<div class="col-md-12 text-left">
                        <h3>September 19th, 2016 - September 24th, 2016</h3>

                        <p>Awesome views and awesome place. Too much awesomeness happening. It's a fabulous place and we are loving it. 
                        Bhavesh D, India</p>
                        
                        <p>See more reviews on Trip Advisor</p>
                        </div>
                    	
                    </div>
                    
                    <div class="swiper-slide">
                    	<div class="col-md-12 text-left">
                        <h3>September 19th, 2016 - September 24th, 2016</h3>

                        <p> Awesome views and awesome place. Too much awesomeness happening. It's a fabulous place and we are loving it. 
                        Bhavesh D, India
                        
                        See more reviews on Trip Advisor
                        March 26th, 2016 - March 30th, 2016
                        
                        I would like to tell you that the villa is so amazing! All 19 of my family members were so happy about it. All staff are very nice, even the drivers. The housekeeping service is top-notch. They clean the room when we have every meal, breakfast, lunch and dinner. Every time when you went back room to grab a thing or change clothes, the room is so tidy! We enjoyed every moment at the villa. The villa manager, AJ, is so nice. She organised everything very well to suit our needs. Thank you very much.
                        Dave C, Hong Kong
                        See more reviews on Trip Advisor</p>
                        <p>Dave C, Hong Kong</p>
                    	</div>
                    </div>
                    <div class="swiper-slide">
                    	<div class="col-md-12 text-left">
                        	<h3>September 19th, 2016 - September 24th, 2016</h3>
                            <p>
                            I am more than satisfied with you and your staffs' excellent services. You were always attentive and willing to help us so that we could fully enjoy our stay and so were the other staffs. Your food was great, too. We had all of our meals in house during our 5 nights stay except one dinner and one lunch. I could see all the dishes were carefully prepared and the chef were trying her best to serve as much variety as possible. And I also enjoyed the market tour and cooking class with chef Care. My wife, son and I really miss the time we spent there flashing back to all the activities and all kinds of food we will never experience forever. I have told other families are all really satisfied with the services you provided. Especially the timely and thorough information about restaurant, golf and tour was very helpful.
                            Taewon C, South Korea</p>
                            <p>See more reviews on Trip Advisor</p>
                        </div>
                    </div>-->
                    
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <!--<div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>-->
            </div>
        
            <!-- Swiper JS -->
        
            <!-- Initialize Swiper -->
            <script>
            var swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				paginationClickable: true,
				spaceBetween: 30,
				centeredSlides: false,
				autoplay: 4000,
				autoplayDisableOnInteraction: false
            });
            </script>
        
        
        
        
            <!--<div class="col-md-3 col-sm-6">
                <div class="mg-team-member">
                    <figure>
                        <img src="libs/images/web/img/15801368_10158095280700602_1923917884_n.png" width="100%" alt="" class="img-responsive">
                    </figure>
                    <div class="mg-team-member-overlayer"></div>
                    <div class="mg-team-info">
                        <h3>Tony</h3>
                        <strong>October 2016</strong>
                        <ul class="mg-team-member-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mg-team-member">
                    <figure>
                        <img src="libs/images/web/img/15841018_10158095280680602_1893766144_n.png" width="100%" alt="" class="img-responsive">
                    </figure>
                    <div class="mg-team-member-overlayer"></div>
                    <div class="mg-team-info">
                        <h3>Oillie</h3>
                        <strong>October 2016</strong>
                        <ul class="mg-team-member-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mg-team-member">
                    <figure>
                        <img src="libs/images/web/img/15840993_10158095280705602_2134542901_n.png" width="100%" alt="" class="img-responsive">
                    </figure>
                    <div class="mg-team-member-overlayer"></div>
                    <div class="mg-team-info">
                        <h3>Shuan</h3>
                        <strong>October 2016</strong>
                        <ul class="mg-team-member-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="mg-team-member">
                    <figure>
                        <img src="libs/images/web/img/15822271_10158095280695602_226971266_n.png" width="100%" alt="" class="img-responsive">
                    </figure>
                    <div class="mg-team-member-overlayer"></div>
                    <div class="mg-team-info">
                        <h3>Kenzie</h3>
                        <strong>October 2016</strong>
                        <ul class="mg-team-member-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>        

