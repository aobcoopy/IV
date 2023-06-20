<?php 
$cover = $dbc->GetRecord("cover","*","page='service' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
$photo_cover = imagePath($photo_cover);
?>
<style>  
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
     background-position: 50% !important; 
    /*color: #fff;
    text-align: center;
    height: 600px;
     background: red; */
}
.mg-available-rooms {
     padding: 0px 0; 
}
p {
     margin-bottom: 10px; 
}
@media screen and (max-width:992px)
{
	.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 100%;
		height: 0px;
		background-color: #d3a267;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
	}
}
@media screen and (min-width:992px)
{
	.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 70%;
		height: 0px;
		background-color: #d3a267;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
	}
}

</style>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>
<div class="mg-page-titles top68"><!--parallax-->
    <div class="container-fluid nopad">
            <img class="lazy" data-src="<?php echo $photo_cover;?>" alt="inspiringvillas cover" width="100%" class="motop">
        <div class="row" >
            <!--<div class="col-md-12">
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>
<!--<div class="mg-page-title mobi"></div>-->
<?php include "libs/pages/search.php";?>

<br>
<div class="mg-best-rooms">
    <div class="container">
        <div class="row">
        	<!--<center></center>-->
            <div class="col-md-12">
                <?php /*?><div class="mg-sec-title">
                  
                    <!--<p>These best rooms chosen by our customers</p>-->
                </div><?php */?>
                <div class="col-md-12 nopad conbox">
                    	<center><h1 class=" contitle wosv hidden-xs"> Thailand Luxury Villa Rental Services in Koh Samui & Phuket, Thailand </h1></center>
                        <h2 class="f16 text-center" style="    font-family: pt !important;">Thailand Luxury Villa Rental Services</h2><br>
                    	<div class="col-md-12 det text-center">
                        	At Inspiring Villas we pride ourselves on knowing what our guests want even before they ask for it. We provide the very best services available to Thailand Private Villa Holidays in Phuket and Koh Samui. We aim to make the guest experience with Inspiring Villas a pleasant and seamless one, from the time of booking until check-out.jll<!--At Inspiring Villas we pride ourselves on knowing what our guests want before they ask for it. This allows us to give the best service found anywhere in Luxury Private Villa rentals in Phuket, Thailand. We <a>aim</a> to make the experience of choosing Inspiring Villas a pleasant and seamless one, from the time you book until you check-out.--> <br><br>
                        </div> 
                        
                        <!--<br><br><br><br>-->
                    	
                    </div>
                    
                <div class="row text-center">
                
                </div>
                <br><br>
                <div class="col-md-12 nopad bline">
                	<div class="col-md-12 nopad titleb"><div class="dot ft"></div>Booking Process</div>
                    <div class="col-md-12 detai">
                    	<div style="font-family: pt !important;">
                        	Our booking service is provided by our experienced Thailand based staff that have experienced the comfort and splendour of all our Thailand holiday villas first hand. We have beachfront private villas for a romantic getaway, large villas for corporate work retreats, villas where you can throw a spectacular celebration, and more, all in Koh Samui or Phuket, in Amazing Thailand! No matter what you’re looking for, we have the perfect, fully-serviced private luxury villa in Thailand waiting for you.  On our website just make a choice and indicate the number of guests and dates. We’ll confirm availability and can provide alternative villas that suit your needs, once confirmed we can complete the booking for you. We accept payments by international bank transfer, Paypal, and Credit Card. All our prices are guaranteed so you can rest assured of the best rate for our 5-star services.

                            <!--Our booking service is provided by our experienced Phuket-based staff that have experienced the comfort and splendour of all of our villas to rent first hand. We have beach front private villas for a romantic getaway, large villas for corporate work retreats, villas where you can throw a spectacular celebration, and many more. No matter what you’re looking for, our service-minded staff have the perfect, fully-serviced private luxury villa to rent in Phuket already waiting for you.
                            <br><br>
                                On our website just make a choice and indicate the number of guests and dates. We’ll confirm availability and can provide alternative villas that suits your needs, once confirmed we can complete the booking for you. We accept payments by international bank transfer, Paypal, and Credit Card.
                                <a>All our prices are guaranteed so you can rest assured of the best rate for our 5-star services from the moment you book until your stay with us ends.</a>-->
                    	</div>
                    </div>
                </div>
                <div class="col-md-12 nopad bline">
                	<div class="col-md-12 nopad titleb"><div class="dot"></div>Pre Arrival Process</div>
                    <div class="col-md-12 detai ">
                    	<div style="font-family: pt !important;">
                        	Our first class concierge service sets us apart in Thailand villa holidays. Our concierge staff work before you arrive; whether collecting requested necessities such as a grocery list, booking a nanny service, or arranging a yacht to sail around the islands. We attend the villa for inspection prior to check-in to make sure all is just right and then we’ll head to the airport to pick you up.

                            <!--Our top-notch concierge service sets us apart from any hotel or other villa operator in Phuket. Our concierge staff gets to work before you even arrive; whether it is getting necessities like your grocery list, setting up a dive class, or arranging a yacht to sail around the turquoise Andaman Sea. Once the team has arranged for all your needs, they coordinate with the villa manager to assure your villa is ready for you. We’ll do one last pre-check-in inspection to make sure all is just right and then we’ll head to the airport to pick you up.-->
                           
                    	</div>
                    </div>
                </div>
                <div class="col-md-12 nopad bline">
                	<div class="col-md-12 nopad titleb"><div class="dot" style="    margin-left: -36px;"></div>During Guest Stay Process</div>
                    <div class="col-md-12 detai ">
                    	<div style="font-family: pt !important;">
                        	Once you have arrived you’ll be welcomed with a guest welcome pack and everything you requested in place. Each villa we run is fully-serviced with daily cleaning service and linen change every three days. Every villa comes with a private chef and guest support available 24/7. Additionally, we hold a Thailand Tourism License meaning all members of your party are properly insured during sightseeing tours or any other excursions you might want to enjoy through our concierge service.<br><br>
 As our guest, we strive to provide everything you and your guests desire to make your stay as pleasurable as possible. Inspiring Villas doesn’t just supply 5-star accommodation. We are so much more. Book a Villa holiday in Thailand with us today to begin your path towards inspiration.

                            <!--Once you have arrived you’ll be welcomed with a guest welcome pack and everything you requested in place. Each villa we run is fully-serviced with daily cleaning service and linen change every three days. Every villa comes with a private chef and guest support available 24/7. Additionally, we hold a Thailand Tourism License meaning all members of your party are properly insured during sightseeing tours or any other excursions you might want to go on.<br><br>

As our guest, we endeavor to provide everything you and your guests need to make your stay as pleasurable as can be. Inspiring Villas doesn’t just supply 5-star accommodation in clean and comfortable villas. We are so much more. Book a villa today to begin your path toward inspiration.-->
                    	</div>
                    </div>
                </div>
                <div class="col-md-12 nopad bline">
                	<div class="col-md-12 nopad titleb"><div class="dot" style="    margin-left: -36px;"></div>Concierge Service</div>
                    <div class="col-md-12 detai ">
                    	<div style="font-family: pt !important;">
                        	Our personal concierge service sets us apart from any hotel or other holiday villa rental in Phuket. Our concierge staff get to work before you arrive; whether it is getting necessities like your grocery list, setting up a dive class, or arranging a yacht to sail around the turquoise Andaman Sea. Once the team has arranged for all your needs, the villa staffs take over to make sure your arrival at the villa is easy and effortless. We will complete a pre-arrival inspection to make sure all is just right for you and then we’ll head to the airport to pick you up.  Once you have arrived you’ll be welcomed with a guest welcome pack and everything you requested in place. Each villa we run is fully-serviced with daily cleaning service and linen change every three days. Every villa comes with a private chef and guest support available 24/7. Additionally, we hold a Thailand Tourism Licence meaning all members of your party are properly insured during sightseeing tours or any other excursions you might want to go on if booked through us.  As our guest, we endeavour to provide everything you and your guests need to make your private villa holiday on Phuket an unforgettable, enjoyable experience. Book a villa today to begin your path towards inspiration.
                            <!--Our personal concierge service sets us apart from any hotel or other holiday villa rental in Phuket. Our concierge staff get to work before you arrive; whether it is getting necessities like your grocery list, setting up a dive class, or arranging a yacht to sail around the turquoise Andaman Sea. Once the team has arranged for all your needs, the villa staff take over to make sure your arrival at the villa is easy and effortless. We will complete a pre-arrival inspection to make sure all is just right for you and then we’ll head to the airport to pick you up.
                            <br><br>

Once you have arrived you’ll be welcomed with a guest welcome pack and everything you requested in place. Each villa we run is fully-serviced with daily cleaning service and linen change every three days. Every villa comes with a private chef and guest support available 24/7. <a>Additionally, we hold a Thailand Tourism Licence meaning all members of your party are properly insured during sightseeing tours or any other excursions you might want to go on if booked through us.
</a>
<br><br>
As our guest, we endeavour to provide everything you and your guests need to make your private villa holiday on Phuket an unforgettable, enjoyable experience.Book a villa today to begin your path towards inspiration.-->
                    	</div>
                    </div>
                </div>

                
                
                
				<!--<center><a href="" class="btn btn-main">See All Villas</a></center>-->
            </div>
        </div>
    </div>
</div>



