<?php 
$cover = $dbc->GetRecord("cover","*","page='about' AND status > 0");
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
    color: #fff;
/*//    text-align: center;
//    height: 600px;
//     background: red; */
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
<div class="mg-page-titles webss top68"><!--parallax-->
    <div class="container-fluid nopad">
            <img data-src="<?php echo $photo_cover;?>" class="lazy" alt="inspiringvillas cover" width="100%">
        <div class="row" >
        </div>
    </div>
</div>
<!--<div class="mg-page-title mobi"></div>-->
<?php include "libs/pages/search.php";?>

<br>
<div class="mg-best-rooms">
    <div class="container">
        <div class="row">
        
        	<div class="col-md-12 nopad conbox">
                <center><h1 class=" contitle abw">Inspiring Villas in Thailand - Koh Samui & Phuket</h1>
                <h2 class="f16" style="    font-family: pt !important;    margin-bottom: 28px;">About Us</h2>
                </center>
                <div class="col-md-10 col-md-offset-1 det text-center" style="padding-bottom:30px;">
                    <center>
                    Inspiring Villas are a highly motivated team of skilled professionals who understand how the accommodation plays a big part in the villa holiday experience. Every member of our team has had the opportunity to stay in our luxury villa rentals in Thailand  to experience each villa service that our guests will.  This provides firsthand knowledge and unique insight into which villas match the needs of our guests. Put another way, each member of our staff have been inspired to pass the best experience onto you.  Just let us know what you’re looking for, not only for accommodation, but in the overall experience you want your vacation to be.  We’re here to help you choose the perfect villa holiday in Thailand and to facilitate the best, most stress-free holiday you could dream of. Begin your path to Inspiration by booking our 5-star villa holidays in Thailand today.

                    <!--Inspiring Villas are a highly motivated team of skilled professionals who understand how the accommodation plays a big part in the holiday experience.Every member of our team has had the opportunity to stay in our luxury villa rentals in Phuket <br>to experience each villa service that our guests will. 
                    <br><br>
                    This provides firsthand knowledge and unique insight into which villas are perfect for the needs of our customers. <br>Put another way, each member of our staff have been inspired to pass the best experience onto you.
                    <br><br>
                    Just let us know what you’re looking for, not only for accommodation, but in the overall experience you want your vacation to be. <br>We’re here to help you choose the perfect villa to rent and facilitate the best, most stress-free holiday you could ever dream of
                    <br><br>
                    Begin your path to Inspiration by booking our 5-star villas today.-->
                </center>
                </div> 
            </div>
            
            
        	<center><!--<h2 style="margin-top: -25px;">About Us</h2>-->
            <div class="col-md-10 col-md-offset-1">
                <!--<div class="mg-sec-title">
                    <h2>About Us</h2>
                </div>-->
                <div class="row ">
               <!-- <center>
                    Inspiring Villas are a highly motivated team of skilled professionals who understand how accommodation plays a big part during
                    holidays. That is why we are here for you. Every member of our team has had the opportunity to stay in our world class villas to
                    experience each villa service that our guests will have.<br><br>
                    This allows them firsthand knowledge and unique insight into which villas are perfect for the varying needs and desires of our
                    customers. Put another way, each member of our sta have been Inspired to pass the best experience onto you.<br><br>
                    Just let us know what you're looking for, not only for accommodation, but in the overall experience you want your vacation to be.
                    We're here to help you pick the perfect villa and facilitate the best, most stress-free holiday you could ever dream of.<br>
                    Begin your path to Inspiration by booking our 5-star villas today.
                </center>-->
                <br><br>
                
                    <div class="col-md-12 nopad">
                    	<div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/1.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>PICKED BY PROFESSIONAL</strong></div>
							<div class="sub">Carefully Hand-Picked & Inspected</div>
                        </div>
                        <div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/5.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>FULL SERVICED VILLAS</strong></div>
							<div class="sub">Dedicated with Chef, Staff, Manager</div>
                        </div>
                        <div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/2.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>PRICE GUARANTEED</strong></div>
							<div class="sub">Best Valued Price</div>
                        </div>
                        
                    </div>
                    <div class="col-md-12 nopad">
                    	<div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/3.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>SERVICED WITH LOVE</strong></div>
							<div class="sub">24/7 Experienced Customer Service</div>
                        </div>
                        <div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/6.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>PERSONAL CONCIERGE SERVICE</strong></div>
							<div class="sub">Tailor Made Personalized Activities </div>
                        </div>
                    	<div class="col-xs-12  col-sm-6  col-md-4">
                        	<img data-src="libs/images/about/4.png" width="80" class="center-block lazy">
                            <div class="athead"><strong>SECURED PAYMENT</strong></div>
							<div class="sub">Electronic & Remittance Accepted </div>
                        </div>
                        
                        
                    </div>
                </div><br><br>
                
                
                <div class="row mobi">
              
                </div>
                
            </div>
            
            
        </div>
    </div>
</div>



