<?php 
$cover = $dbc->GetRecord("cover","*","page='contact' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
?>
<style>
.mg-page-title{padding-top:0px;padding-bottom:50px;padding-left:0px;background-image:url(<?php echo $photo_cover;?>);background-repeat:no-repeat;background-position-x:50% !important}.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:45px;height:2px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px !important;top:43px}.:after,.mg-widget-titless:after{content:'';display:block;width:45px;height:0px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px !important;top:43px}.links{color:#000}.bggray{padding-left:15px !important}@media screen and (max-width:992px){.bggray{background:#eee}}@media screen and (min-width:992px){.bggray{background:#eee;padding:0px}}.mg-contact-form-input{margin-bottom:-6px;display:block}.emailsc{border-radius:0px;width:100% !important;float:left}input[type=date].form-control,input[type=time].form-control,input[type=datetime-local].form-control,input[type=month].form-control{line-height:normal}
</style>

<!-- Global site tag (gtag.js) - Google AdWords: 853694063 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-853694063"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-853694063');
</script>

<!-- Event snippet for Contact conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-853694063/pTzVCKj4ingQ76yJlwM'});
</script>

<div class="mg-page-titles top68"><!--parallax-->
    <div class="container-fluid nopad">
    <img class="lazy" data-src="<?php echo $photo_cover;?>" alt="inspiringvillas cover" width="100%" class="motop">
        <div class="row">
            <!--<div class="col-md-12">
                <h2>Contact Us</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>
<script>
//เรียกใช้งาน
var hash = window.location.hash;
if(hash=='')
{
	//alert(slug);
	//alert(hash);
}
else
{
	//alert(hash);
	setTimeout(function(){
		$('html,body').animate({ 
			scrollTop: $(".viewform").offset().top-50
		}, 1000);
	},1000);
	 
}
</script>
<!--<div class="mg-page-title mobi"></div>-->
<?php include "libs/pages/google_remarketing.php";?>
<?php include "libs/pages/search.php";?>


		<div class="mg-page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                    
                    <div class="col-md-12 nopad conbox">
                    	<center><h1 class=" contitle hidden-xs1">Contact Us</h1></center>
                        <h2 class="f16 text-center" style="    font-family: pt !important;">For a quick response please provide your name & email - we'll get straight back to you!</h2><br>
                    	<div class="col-md-12 det text-center"><?php echo '---'.$_REQUEST['view'];?>
                        	<?php /*?>One of our villa specialists will attend to your inquiry shortly. We value your privacy. <br>We promise to never sell or share your 
information with a third-party. <br><?php */?>
For any urgent requests, please call us at <a href="tel:+85281986765" style=" color:#4b565b;">+852 8198 6765</a><br><br>

<?php /*?>Tell us exactly what you are looking by completing the form below and submit. One of our villa specialists or team <br>
members will attend to your queries shortly. We value your privacy. We promise to never sell or share your <br>
information with a third-party. You can also find answer for common question in our <a href="/faq">FAQ.</a> <br>
For any urgent requests, please call us at <a href="tel:+66846771551" style=" color:#4b565b;">+66 84 677 1551</a> <br><?php */?>
                        </div> 
                        
                        <!--<br><br><br><br>-->
                    	<h2 class="ico" style="text-align: center;">
                        <a href="https://api.whatsapp.com/send?phone=66846771551" target="_blank" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;">
                        	<img class="lazy" data-src="../../upload/whatsapp.png" alt="Inspiring Villas Whatsapp">
                        </a>&nbsp;
                        <a href="http://m.me/inspiringvillas/" class="alignnone"  target="_blank" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;">
                        	<img class="lazy" data-src="../../upload/mass.png" alt="Inspiring Villas Messanger">
                        </a>
                        &nbsp;
                        <a href="skype:Inspiringvillas?call" class="alignnone"  target="_blank" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;">
                        	<img class="lazy" data-src="../../upload/skpye.png" alt="Inspiring Villas Skpye">
                        </a>
                        &nbsp;
                        <a href="mailto:info@inspiringvillas.com" class="alignnone" target="_blank" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;">
                        	<img class="lazy" data-src="../../upload/gmail.png" alt="Inspiring Villas Gmail">
                        </a>
                        &nbsp;
						<a href="tel:0846771551/" class="alignnone" style="margin: 0px; padding: 0px; display: inline-block; position: relative; overflow: hidden;">
                            <img class="lazy" data-src="../../upload/call.png" alt="Inspiring Villas Call">
                        </a>
                        </h2><!--<br><br>-->
                        <br>
                    </div>
                    
                   
                    </div>
					<div class="col-md-8 viewform"><br>
                        <div class="col-md-12 nopad">
                            <h2 class="mg-sec-left-title">Reach out to us!</h2>
                            <div class="col-md-12 borr" style="    padding-left: 0px;">
                            <form id="contactus" class="clearfix">
                                <!--<div class="mg-contact-form-input col-md-6 nopad">
                                    <label for="full-name">Check In</label>
                                    <input type="date" class="form-control" id="checkin" name="checkin">
                                </div>
                                <div class="mg-contact-form-input col-md-6 nopad">
                                    <label for="full-name">Check Out</label>
                                    <input type="date" class="form-control" id="checkout" name="checkout">
                                </div>-->
                                <div class="mg-contact-form-input">
                                    <label for="full-name">Full Name <span class="cred">*</span></label>
                                    <input type="text" class="form-control ip" id="full-name" name="full-name">
                                </div>
                                <div class="mg-contact-form-input">
                                    <label for="email">E-mail <span class="cred">*</span></label>
                                    <input type="text" class="form-control ip emailsc" id="email" name="email" onKeyUp="lower_text(this)">
                                </div>
                                <div class="mg-contact-form-input">
                                    <label for="subject">Phone - for WhatsApp - it’s quicker! <!--<span class="cred">*</span>--></label>
                                    <input type="text" class="form-control ip" id="subject" name="subject">
                                </div>
                                <div class="mg-contact-form-input">
                                    <label for="subject">Message  - Where, What are you looking for?<?php /*?><span class="cred">(optional)</span><?php */?></label>
                                    <textarea class="form-control ip" id="message" name="message" rows="5"></textarea>
                                </div>
                                <input type="button" onClick="send_contact()" class="btn btn-dark-main2 pull-right" value="SEND" style="padding: 10px 0px 10px 0px;">
                            </form>
                            <span class="textalert"></span>
                            </div>
                        </div>
                    </div>
					<div class="col-md-4 nopad"><br><br><br>
                    	<div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Telephone Contacts </h2>
                            <div style="padding-left: 15px;font-size: 14px;">
                                <?php /*?><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Unit 1104, 11/F, Crawford House, 70 Queen's<br>
                                 &nbsp;&nbsp;&nbsp;Road Central, Central, Hong Kong<br><?php */?>
                                 <?php /*?><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; 88/44 Moo4, Koh Khew Sub-District,<br> &nbsp;&nbsp;&nbsp;Maung Phuket District, Phuket 83000<br><?php */?>
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+66846771551" style=" color:#4b565b;">+66 84 677 1551 (Thailand)</a><br>
                                <?php /*?><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+66836556452" style=" color:#4b565b;">+66 83 655 6452 (Samui)</a><br><?php */?>
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+85281986765" style=" color:#4b565b;">+852 8198 6765 (Hongkong)</a><br>
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+61861027522" style=" color:#4b565b;">+61 8 6102 7522 (Australia)</a><br>
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+13477964362" style=" color:#4b565b;">+1 347 796 4362 (USA)</a><br>
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+442032875367" style=" color:#4b565b;">+44 20 3287 5367 (UK)</a><br><br>
                            </div>
                        </div>
                        
                        <div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Email Contacts</h2>
                            <div  style="padding-left: 15px;font-size: 14px;">
                            	<a class="links" href="mailto:info@inspiringvillas.com" style=" color:#4b565b;"><i class="fa fa-envelope" aria-hidden="true" style="color:#4b565b"></i>&nbsp; info@inspiringvillas.com </a><br>
                                <a class="links"  href="mailto:rsvn@inspiringvillas.com" style=" color:#4b565b;">&nbsp;&nbsp;&nbsp; rsvn@inspiringvillas.com </a><br>
                                <a class="links"  href="mailto:billing@inspiringvillas.com" style=" color:#4b565b;">&nbsp;&nbsp;&nbsp; billing@inspiringvillas.com</a>
                                <br><br>
                            </div>
                        </div>
                        
                        <div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Hong Kong Corporate Address</h2>
                            <div  style="padding-left: 15px;font-size: 14px;">
                            	<?php /*?><a href="https://goo.gl/maps/jpjruBmcvay" target="_blank"  title="Google map"><?php */?><i class="fa fa-map-marker" aria-hidden="true"></i><?php /*?></a><?php */?>&nbsp; Unit 1104, 11/F, Crawford House, 70 Queen's<br>
                                 &nbsp;&nbsp;&nbsp;Road Central, Central, Hong Kong<br>
                                <br><br>
                            </div>
                        </div>

                        <div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Thailand Concierge Head Office</h2>
                            <div style="padding-left: 15px;font-size: 14px;">
                            	-&nbsp;Feel free to visit if you are in Phuket<br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; 37/10 Sri Sonnthorn Road, <br>
                                &nbsp;&nbsp;&nbsp;Cherng Thale Sub District, Thalang, Phuket 83110<br>
                                <?php /*?><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<a href="tel:+6676626762" style=" color:#4b565b;">+66 76 626 762</a><br> 
                                <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <a href="tel:+66846771551" style=" color:#4b565b;">+66 84 677 1551</a><br><?php */?>
                                <br>
                            </div>
                        </div>
                        
                        <div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Australian Administration Office</h2>
                            <div style="padding-left: 15px;font-size: 14px;">
                            	Please use telephone or email contacts at the top <br>of this page<br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;245 Selby Street, Perth, WA, 6014
                                <br><br>
                            </div>
                        </div>
                        
                        
                        

						<?php /*?><ul class="mg-contact-info">
							<li><!--<i class="fa fa-map-marker"></i>--> Unit 1104, 11/F, Crawford House, 70 Queen's </li>
                            <li><!--<i class="fa fa-map-markers"></i>--> Road Central, Central,Hong Kong</li>
							<li><!--<i class="fa fa-phone"></i>--> HK: +852 8198 6765</li>
                            <li><!--<i class="fa fa-skype"></i>--> Skype: Inspiring Villas</li>
							<li><!--<i class="fa fa-envelope"></i>--> <a href="mailto:rsvn@inspiringvillas.com">Email: rsvn@inspiringvillas.com</a></li>
						</ul><?php */?>
                        
						
                       <?php /*?> <h2 class="mg-sec-left-title">Phuket Office Address </h2>
                        <ul class="mg-contact-info">
							<li><i class="fa fa-map-marker"></i> 88/44 Moo.4 Sub-District Koh Khew District  </li>
                            <li><i class="fa fa-map-markers"></i> Maung Phuket Province Phuket</li>
							<li><i class="fa fa-phone"></i> Mobile: +66 (0) 84 677 1551</li>
                            <li><i class="fa fa-phone"></i> Office Number: +66 (0) 76633022</li>
							<!--<li><i class="fa fa-envelope"></i> <a href="mailto:rsvn@inspiringvillas.com">Email: rsvn@inspiringvillas.com</a></li>-->
						</ul>
                        <img src="libs/images/visa.png" alt="" width="300"><?php */?>
						<?php /*?><div id="mg-map" class="mg-map"></div><?php */?>
                        <?php /*?><h2 class="mg-sec-left-title">THAILAND OFFICE ADDRESS </h2>
						<ul class="mg-contact-info">
							<li><i class="fa fa-map-marker"></i> 88/44 Land&House 88 Koh Khew Moo. 4 Sub-District Koh Khew District Maung Phuket Province Phuket 83000</li>
							<li><i class="fa fa-phone"></i> TH: +66 76 633 022</li>
                            <li><i class="fa fa-skype"></i> Skype: Inspiring Villas</li>
							<li><i class="fa fa-envelope"></i> <a href="mailto:rsvn@inspiringvillas.com">Email: rsvn@inspiringvillas.com</a></li>
						</ul><?php */?>
						<?php /*?><div id="mg-map2" class="mg-map"></div><?php */?>
					</div>
                
				</div>
			</div>
		</div>
        
        <div class="container-fluid footer_bar" ></div>
        
        <div class="container">
        	Inspiring Villas is the premium provider of Thailand luxury villas for vacations and holidays.<br>
            We specialise in the very best luxury villas in Phuket & Koh Samui villas, in Thailand.<br>
            Our concierge staff have many years of experience and know all the villas and their attractions.<br>
            We match the perfect villas to your group requirements.<br>
            Our sister brand provides all types of concierge services in Thailand.<br>
            Executive assistants, corporates and family offices use these concierge services.<br>
            Specialising in transportation, private excursions and vacation villa search & select services.<br>
            Inspiring Villas is affiliated with <a href="http://luxesorted.com">LUXESORTED</a>, the luxury concierge service in Thailand.
            <br><br>
        </div>
        
        
        
<script>
function lower_text(str)
{
	var text = $(str).val();
	var res = text.toLowerCase();
	$(str).val(res);
}
function send_contact()
{
	if($("#checkin").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("Please fill your data");
		$("#checkin").focus();
		return false;
	}
	else if($("#checkout").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("Please fill your data");
		$("#checkout").focus();
		return false;
	}
	else if($("#full-name").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("Please fill your data");
		$("#full-name").focus();
		return false;
	}
	else if($("#email").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("Please fill your data");
		$("#email").focus();
		return false;
	}
	/*else if($("#subject").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("Please fill your data");
		$("#subject").focus();
		return false;
	}*/
	/*else if($("#message").val()=='')
	{
		alert("Please fill your data");
		$("#message").focus();
		return false;
	}*/
	else
	{
		/*var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("email").value.match(Email))
		{
		   $(".textalert").text("Email format is not valid");//alert('Email format is not valid');
		   document.getElementById("email").focus();
		   return false;
		}
		else
		{*/
			$.ajax({
				url:"libs/actions/action-send-contact.php",
				type:"POST",
				dataType:"json"	,
				data:$("#contactus").serialize(),
				success: function(res){
					if(res.status==true)
					{
						
						$(".q_form").val('');
						window.location = "<?php echo $url_link;?>thank-you-contact";
						/*$(".textalert").text("Successful");
						$(".textalert").css({"color":"green"});*/
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		/*}*/
		
	}
}
</script>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>