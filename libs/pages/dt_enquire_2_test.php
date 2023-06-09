<script src="<?php echo $url_link;?>libs/js/sticky.js"></script>
<script>
$(document).ready(function(e) {
    var sidebar = document.getElementById('enbox');
	Stickyfill.add(sidebar);
	setTimeout(function(){
		var eb = $(".enboxx").height();
		$(".cenb").css({"height":eb+"px"});
		//alert(eb+'---'+$(".cenb").height());
	},2000);
	setTimeout(function(){
		$(".top_mores").slideUp(500);
		$(".top_en_box ").animate({height:"40px"});
		$(".show_buton_more").fadeIn(500);
	},5000);
	
	var id=0;
	$(".show_buton_more").click(function(e) {
		if(id==0)
		{
			$(".top_mores").slideDown(500);
			$(".top_en_box ").animate({height:"80px"});
			$(this).children(".fa").css({"transform": "rotateX(180deg)"},500);
			id=1;
		}
		else
		{
			$(".top_mores").slideUp(500);
			$(".top_en_box ").animate({height:"40px"});
			$(this).children(".fa").css({"transform": "rotateX(0deg)"},500);
			id=0;
		}
    });
	
	
});
</script>
<style>
.enbox_xy {
  position: -webkit-sticky;
  position: sticky;
  top: 150px;
}

.btn-dark-main:hover {
    background-color: #efb76d;
    border-color: #e7b315;
    color: #fff;
}
.enbox .ip {
    background: #fff;
    border: 2px solid #eeeeee;
    font-size: 15px;
    padding: 10px 5px 10px 10px;
}
@media screen and (max-width:992px)
{
	select.ips {
		padding: 7px 10px 7px 10px;
		color: #9c9c9c;
		width: 100%;
		/* background: none; */
		border: none;
		background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI1NSAyNTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI1NSAyNTU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0iYXJyb3ctZHJvcC1kb3duIj4KCQk8cG9seWdvbiBwb2ludHM9IjAsNjMuNzUgMTI3LjUsMTkxLjI1IDI1NSw2My43NSAgICIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) 96% / 10px no-repeat #eee !important;
		border: 1px solid #ced4d7;
	}
	.btn-dark-main {
		color: #FFF;
		background-color: #f05b46;
		border-color: #16262e;
		width: 100%;
		padding: 10px 0px 10px 0px;
		margin-top: 9px;
	}
}
@media screen and (min-width:992px)
{
	select.ips {
		padding: 7px 10px 7px 10px;
		color: #9c9c9c;
		width: 100%;
		/* background: none; */
		border: none;
		background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI1NSAyNTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI1NSAyNTU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0iYXJyb3ctZHJvcC1kb3duIj4KCQk8cG9seWdvbiBwb2ludHM9IjAsNjMuNzUgMTI3LjUsMTkxLjI1IDI1NSw2My43NSAgICIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) 96% / 10px no-repeat #fff !important;
		border: 1px solid #ced4d7;
	}
	.btn-dark-main {
		color: #FFF;
		background-color: #d3a260;
		border-color: #16262e;
		width: 100%;
		padding: 13px 0px 13px 0px;
		margin-top: 9px;
		font-size: 16px;
	}
}
select#countryCode_en_d {
    padding: 11px 10px 12px 10px;
    color: #9c9c9c;
    width: 100%;
    /* background: none; */
    border: none;
    background:  url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI1NSAyNTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI1NSAyNTU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0iYXJyb3ctZHJvcC1kb3duIj4KCQk8cG9seWdvbiBwb2ludHM9IjAsNjMuNzUgMTI3LjUsMTkxLjI1IDI1NSw2My43NSAgICIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) 96% / 10px no-repeat #fff ;
    border: 1px solid #ced4d7;
}
.top_en_box
{
	color:#000 !important;
}

.s_price
{
	/*background: #d7e9ff;
    padding: 5px 5px 2px 10px;
    border: 2px solid #112845;
    width: 100% !important;
    color: #112845;*/

    padding: 5px 5px 2px 10px;
    border: 0px solid #eeeeee;
    width: 100% !important;
	font-size:15px;
}
.idet
{
	/*font-size:12px;*/
}
.show_buton_more
{
	position:absolute;
	right:0;
	top:0;
	background:none;
	border:none;
	font-size:20px;
	cursor:pointer;
	display:none;
}
.show__more
{
	display:none;
	position:absolute;
	left:50%;
	bottom:0;
	background:none;
	border:none;
	font-size:20px;
	cursor:pointer;
	transform: translateX(-50%);
}
.show__more_dis
{
	display:block;
	position:absolute;
	left:50%;
	bottom:0;
	background:none;
	border:none;
	font-size:20px;
	cursor:pointer;
	transform: translateX(-50%);
}
.p_box
{
	border-top:1px solid #eee;
}
.sh_dis
{
	display:none;
}
</style>
<?php 
$ar_bedroom = array();
foreach($data as $d_price)
{
	for($i=1;$i<=28;$i++)
	{
		if($d_price['val'.$i]!='')
		{
			if(!in_array($i,$ar_bedroom))
			{
				array_push($ar_bedroom,$i);
			}
			//echo $i.'--'.$d_price['val'.$i].'<br>';
		}
	}
}
//print_r($ar_bedroom);
$ss = json_decode($room['photo'],true);?>
<br><br><br>
<div class=" mg-room-fecilities padl50 ">
    <div class="mg-single-room-txt  cenb  web992" id="style-3" style="margin-top:-30px; ">
        <div id="enbox"  class="enbox_xy">
        	
            <div class="top_en_box">
            	<div class="col-md-12 nopad"><div class="t_top_enbox">Contact our villa expert</div><button type="button" class="show_buton_more"><i class="fa fa-angle-down" aria-hidden="true"></i></button></div>
                <div class="col-md-12 nopad top_mores">
                	<div class="col-md-6 nopad"><button class="bt_top_enbox"><a href="/contact#viewform" style="color:#000;"><i class="fa fa-envelope"></i>&nbsp;&nbsp; Email Us</a></button></div>
                    <div class="col-md-6 nopad"><button class="bt_top_enbox" onClick="open_phone();"><i class="fa fa-phone"></i>&nbsp;&nbsp; Call Us</button></div>
                </div>
            </div>
        	
            <div id="enbox2"  class="col12 enbox box   ">
                <h2 class="mg-sec-left-titles enti"><center><strong>Enquire Now</strong></center></h2>
                <form id="form_contact_website" class="clearfix">
                    <input type="hidden" name="txtID" value="<?php echo $room['id'];?>">
                    
                    <div class="mg-contact-form-input col-md-6 nopad" style="padding-right:2px;">
                        <label for="full-name"><!--Check In--></label>
                        <input type="text" class="form-control ip" id="checkin" name="checkin" placeholder="Check In*">
                        <button type="button" class="butides calenin" ><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <div class="mg-contact-form-input col-md-6 nopad" style="padding-left:2px;"><!-- -->
                        <label for="full-name"><!--Check Out--></label>
                        <input type="text" class="form-control ip required" id="checkout" name="checkout" placeholder="Check Out*" onBlur="check_price();">
                        <button  type="button" class="butides r calenout"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    
                    <div class="mg-contact-form-input col6 nopad" style="padding-right:2px;"> 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest" id="cbbGuest" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input col6 nopad" style="padding-left:2px;"><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip f14" name="cbbChildren" id="cbbChildren" placeholder="No. Children (3-12 yrs)">
                    </div>
                    <div class="mg-contact-form-input col-md-12 nopad">
                    	<div class="ipsc2">	
                        <!--<label for="full-name">Full Name</label>-->
                        <select class="form-control ips f15t" id="no_bed" name="no_bed"  placeholder="No. Bedroom*" onChange="check_price();">
                        	<option class="cbb_0" value="0">No. Bedroom*</option>
                            <?php 
							foreach($ar_bedroom as $nobed)
							{
								echo '<option class="cbb_1" value="'.$nobed.'">'.$nobed.'</option>';
							}
							?>
                        </select>
                        </div>
                    </div>
                    <div class="mg-contact-form-input">
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" id="full_name" name="full_name" placeholder="Full Name*">
                    </div>
                    <div class="mg-contact-form-input">
                        <!--<label for="email">E-mail</label>-->
                        <input type="text" class="form-control ip" id="txemail" name="txemail" onBlur="lower_text(this)"  placeholder="E-mail*">
                    </div>
                    <div class="mg-contact-form-input">
                    	<div class="col-md-4 nopad">
                        	<select name="countryCode_en_d" id="countryCode_en_d" class="form-control ips" >
                                <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                <option data-countryCode="US" value="1">USA (+1)</option>
                                <optgroup label="Other countries">
                                    <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                    <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                    <option data-countryCode="AO" value="244">Angola (+244)</option>
                                    <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                    <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                    <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                    <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                    <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                    <option data-countryCode="AU" value="61">Australia (+61)</option>
                                    <option data-countryCode="AT" value="43">Austria (+43)</option>
                                    <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                    <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                    <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                    <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                    <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                    <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                    <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                    <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                    <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                    <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                    <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                    <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                    <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                    <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                    <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                    <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                    <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                    <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                    <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                    <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                    <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                    <option data-countryCode="CA" value="1">Canada (+1)</option>
                                    <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                    <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                    <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                    <option data-countryCode="CL" value="56">Chile (+56)</option>
                                    <option data-countryCode="CN" value="86">China (+86)</option>
                                    <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                    <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                    <option data-countryCode="CG" value="242">Congo (+242)</option>
                                    <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                    <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                    <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                    <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                    <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                    <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                    <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                    <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                    <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                    <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                    <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                    <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                    <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                    <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                    <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                    <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                    <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                    <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                    <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                    <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                    <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                    <option data-countryCode="FI" value="358">Finland (+358)</option>
                                    <option data-countryCode="FR" value="33">France (+33)</option>
                                    <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                    <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                    <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                    <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                    <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                    <option data-countryCode="DE" value="49">Germany (+49)</option>
                                    <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                    <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                    <option data-countryCode="GR" value="30">Greece (+30)</option>
                                    <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                    <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                    <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                    <option data-countryCode="GU" value="671">Guam (+671)</option>
                                    <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                    <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                    <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                    <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                    <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                    <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                    <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                    <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                    <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                    <option data-countryCode="IN" value="91">India (+91)</option>
                                    <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                    <option data-countryCode="IR" value="98">Iran (+98)</option>
                                    <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                    <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                    <option data-countryCode="IL" value="972">Israel (+972)</option>
                                    <option data-countryCode="IT" value="39">Italy (+39)</option>
                                    <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                    <option data-countryCode="JP" value="81">Japan (+81)</option>
                                    <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                    <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                    <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                    <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                    <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                    <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                    <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                    <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                    <option data-countryCode="LA" value="856">Laos (+856)</option>
                                    <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                    <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                    <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                    <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                    <option data-countryCode="LY" value="218">Libya (+218)</option>
                                    <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                    <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                    <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                    <option data-countryCode="MO" value="853">Macao (+853)</option>
                                    <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                    <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                    <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                    <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                    <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                    <option data-countryCode="ML" value="223">Mali (+223)</option>
                                    <option data-countryCode="MT" value="356">Malta (+356)</option>
                                    <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                    <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                    <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                    <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                    <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                    <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                    <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                    <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                    <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                    <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                    <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                    <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                    <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                    <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                    <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                    <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                    <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                    <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                    <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                    <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                    <option data-countryCode="NE" value="227">Niger (+227)</option>
                                    <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                    <option data-countryCode="NU" value="683">Niue (+683)</option>
                                    <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                    <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                    <option data-countryCode="NO" value="47">Norway (+47)</option>
                                    <option data-countryCode="OM" value="968">Oman (+968)</option>
                                    <option data-countryCode="PW" value="680">Palau (+680)</option>
                                    <option data-countryCode="PA" value="507">Panama (+507)</option>
                                    <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                    <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                    <option data-countryCode="PE" value="51">Peru (+51)</option>
                                    <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                    <option data-countryCode="PL" value="48">Poland (+48)</option>
                                    <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                    <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                    <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                    <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                    <option data-countryCode="RO" value="40">Romania (+40)</option>
                                    <option data-countryCode="RU" value="7">Russia (+7)</option>
                                    <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                    <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                    <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                    <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                    <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                    <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                    <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                    <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                    <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                    <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                    <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                    <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                    <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                    <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                    <option data-countryCode="ES" value="34">Spain (+34)</option>
                                    <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                    <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                    <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                    <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                    <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                    <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                    <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                    <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                    <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                    <option data-countryCode="SI" value="963">Syria (+963)</option>
                                    <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                    <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                    <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                    <option data-countryCode="TG" value="228">Togo (+228)</option>
                                    <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                    <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                    <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                    <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                    <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                    <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                    <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                    <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                    <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                    <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                    <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                    <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                    <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                    <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                    <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-8 nopad txx_phone">
                        	<!--<label for="subject">Phone</label>-->
                        	<input type="text" class="form-control ip f14" id="txsubject" name="txsubject" placeholder="Phone-WhatsApp-it’s quicker!">
                        </div>
                    </div>
                    <div class="mg-contact-form-input">
                        <textarea class="form-control ip" id="txmessage" name="txmessage" rows="2.5" placeholder="Message "></textarea>
                    </div>
                    
                    <div id="ajaxLoader1" style="display: none;"><img src="<?php echo $url_link;?>libs/images/AjaxLoader.gif" style="width: 32px; height: 32px; display: block; margin: 0 auto;"></div>
                    <button type="button" onClick="prop_contact();" class="btn btn-dark-main baa " style="font-family:pr;" >SENDTEST</button>
                    <div class="show_price"></div>
                </form>

                <span class="textalert"></span>
                <div class="footbox"></div>
                
                <div class="adsv top10">
                    <div class="col-md-12 nopad">
                        <ul class="check_enq">
                            <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> No Booking fees</li>
                            <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> Best Price Guaranteed</li>
                        </ul>
                    </div>
                    <?php /*?><div class="col-md-6 nopad">
                        <ul class="check_enq">
                            <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> Best Price Guaranteed</li>
                        </ul>
                    </div><?php */?>
                    <?php /*?><ul class="check_enq">
                        <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> No Booking fees</li>
                        <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> Best Price Guaranteed</li>
                    </ul><?php */?>
                </div>
            </div>
            
            <div class="sp speakcall">
                <?php /*?><center>
                    Speak to a villa expert<br>
                    Call Thailand <a href="tel:+66846771551">+66 84 677 1551</a><br>
                    Hongkong <a href="tel:+85281986765">+852 8198 6765</a><br>
                    Sydney <a href="tel:+61270047651">+612 7004 7651</a><br>
                    USA <a href="tel:+13477964362">+1 347 796 4362</a><br>
                    UK <a href="tel:+442032875367">+44 20 3287 5367</a>
                </center><?php */?>
                <button class="bt_share_enbox" onClick="fx_share();"> <i class="fa fa-share"></i>&nbsp;&nbsp; Share this page</button>
            </div>
            
            <?php /*?><div class="adsv">
            	<ul class="check_enq">
                	<li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> No Booking fees</li>
                    <li><img data-src="<?php echo $url_link;?>upload/fa-check.png" class="lazy"> Best Price Guaranteed</li>
                </ul>
            </div><?php */?>
            
            <?php //include 'libs/pages/dt_recently.php';?>
        
        </div>
        <!--enbox-->
        <br>
        
        <div class="sp">
           <!-- <center>
                Speak to our villa expert: <a href="tel:+66846771551">+66 84 677 1551</a>
            </center>-->
        </div>
        <br>
        <br>
        <div class="whychoose sp" style="margin-top: 10px;">
           <!-- <img src="<?php echo $url_link;?>files/Why Choose Us Box.png" width="100%">-->
        </div>
        <div class="bottomwhy"></div>
    </div>

</div>


<?php
$fb_detail = string_len_2(base64_decode($room['short_det'],true),100);
function string_len_2($text,$amount)
{
	if(strlen($text)>$amount)
	{
		return substr($text,0,$amount).'...';
	}
	else
	{
		return $text;
	}
}
?>
<?php //$url_link = 'https://www.inspiringvillas.com/';
	$link = $url_link.$room['ht_link'].'.html';
	$title_tw_1 = str_replace(" ","",$room['name']);
	$title_tw = str_replace("|","-",$room['name']);
	$fb_detail_new = str_replace("'","",$fb_detail);
?>

<?php /*?><img src="/upload/pata.png" width="165" class="center-block" alt="PATA Logo" onClick="onShare('<?php echo $room['ht_link'].'.html';?>','<?php echo $room['name'];?>','<?php echo $fb_detail;?>','<?php echo $ss[0]['img'];?>');"><?php */?>
                        
<div class="bg_popup_share"></div>
<div class="popup_share">
	<div class="title_popup_share">Share</div>
    <button class="bt_close_pop_share" onClick="close_share();">X</button>
    Show this villa to your friend
    <div class="popup_share_detail">
    	<ul class="pop_share_ul">
        	<li onClick="onShare('<?php echo $room['ht_link'].'.html';?>','<?php echo $room['name'];?>','<?php echo $fb_detail_new;?>','<?php echo $ss[0]['img'];?>');">
                <div class="li_title_popup_share"><button class="bt_share fb" data-toggle="tooltip"  data-placement="bottom" title="Share" ><i class="fa fa-facebook" aria-hidden="true"></i></button>&nbsp;&nbsp; Facebook</div>
            </li>
            <li onclick="popUp=window.open('https://twitter.com/share?text=<?php echo string_len_2($title_tw,500);?>&hashtags=inspiringvillas&original_referer=<?php echo $link;?>&data-url=<?php echo $link;?>&via=inspiringvillas', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false">
                <div class="li_title_popup_share"><button class="bt_share twt" data-toggle="tooltip"  data-placement="bottom" title="Share" ><i class="fa fa-twitter" aria-hidden="true"></i></button>&nbsp;&nbsp; Twitter</div>
            </li>
            <li onClick="wapp('https://api.whatsapp.com/send?phone=66846771551&text=<?php echo string_len_2($title_tw,500);?> <?php echo $link;?>');">
                <div class="li_title_popup_share"><button class="bt_share was" data-toggle="tooltip"  data-placement="bottom" title="Share" ><i class="fa fa-whatsapp" aria-hidden="true"></i></button>&nbsp;&nbsp; WhatsApp</div>
            </li>
            <li onClick="popemail()">
                <div class="li_title_popup_share"><button class="bt_share emails"  data-toggle="tooltip"  data-placement="bottom" title="Share" ><i class="fa fa-envelope-o" aria-hidden="true"></i></button>&nbsp;&nbsp; Email</div>
            </li>
            <li onClick="get_link();">
                <div class="li_title_popup_share"><button class="bt_share " data-toggle="tooltip"  data-placement="bottom" title="Share" ><i class="fa fa-link" aria-hidden="true"></i></button>&nbsp;&nbsp; Get link</div>
            </li>
            
        </ul>
        	<div class="box_getlink">
                <div class="col-md-8 nopad"><input type="text" class="tx_getlink" value="<?php echo $url_link.$room['ht_link'].'.html';?>"></div>
                <div class="col-md-4 nopad"><button class="bt_getlink" onClick="copy_link();">Copy</button></div>
            </div>

    </div>
</div>



<div class="bg_popup_phone"></div>
<div class="popup_phone">
	<div class="title_popup_phone">Call Us</div>
    <button class="bt_close_pop_phone" onClick="close_phone();">X</button>
    <div class="popup_phone_detail">
    	<ul class="pop_phone_ul">
        	<li>
                <div class="li_title_popup_phone">Thailand</div>
                <div class="popup_phone_no"><a href="tel:+66846771551">+66 84 677 1551</a></div>
            </li>
            <li>
                <div class="li_title_popup_phone">Hongkong</div>
                <div class="popup_phone_no"><a href="tel:+85281986765">+852 8198 6765</a></div>
            </li>
            <li>
                <div class="li_title_popup_phone">Sydney</div>
                <div class="popup_phone_no"><a href="tel:+61270047651">+612 7004 7651</a></div>
            </li>
            <li>
                <div class="li_title_popup_phone">USA</div>
                <div class="popup_phone_no"><a href="tel:+13477964362">+1 347 796 4362</a></div>
            </li>
            <li>
                <div class="li_title_popup_phone">UK</div>
                <div class="popup_phone_no"><a href="tel:+442032875367">+44 20 3287 5367</a></div>
            </li>
        </ul>
    </div>
</div>



<div class="modal fade" id="myModal_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_share_email">
      	<input type="hidden" class="form-control" id="tx_id" name="tx_id" value="<?php echo $room['id'];?>">
        <input type="hidden" class="form-control" id="tx_name" name="tx_name" value="<?php echo $room['name'];?>">
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php */?>
        <div class="mg-contact-form-input">
            <?php /*?><label for="email">E-mail</label><?php */?>
            <input type="email" class="form-control" id="txemail_p" name="txemail_p" placeholder="E-mail" autofocus>
        </div>
        <div class="textalert_p"></div>
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="subject">Phone</label>-->
            <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
        </div>
        <div class="mg-contact-form-input">
            <!--<label for="subject">Message</label>-->
            <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
        </div><?php */?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail_p()">Send</button>
      </div>
    </div>
  </div>
</div>


<input type="hidden" class="idx" value="0">
<input type="hidden" class="idx_dis" value="0">



<script src="<?php echo $url_link;?>libs/js/numeral.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>-->
<script language="JavaScript">
function get_price()
{
	setTimeout(function(){
		$.ajax({
			url:"<?php echo $url_link;?>libs/actions/action-get-price.php",
			type:"POST",
			dataType:"json"	,
			data:$("#form_contact_website").serialize(),
			success: function(res){
				if(res.data!=null)
				{
					//var dat = res.data['date1']+' '+res.data['date2']+' '+res.data['val'];
					var dat = 'Price : '+res.data['val']+' USD';
					$(".show_price").html(dat);
				}
				else
				{
					$(".show_price").html('');
				}
			}
		});
	},500);
}
function show_price_detail(me)
{
	var idx=$(".idx").val();
	if(idx==0)
	{
		$(".sh_more").slideDown(300);
		$(me).children(".fa").css({"transform": "rotateX(180deg)"},300);
		$(".idx").val(1);
		$(".show__more_dis").fadeIn(300);
	}
	else
	{
		$(".sh_more").slideUp(300);
		$(me).children(".fa").css({"transform": "rotateX(0deg)"},300);
		$(".idx").val(0);
		
		$(".sh_dis").slideUp(300);
		$(".show__more_dis").children(".fa").css({"transform": "rotateX(0deg)"},300);
		$(".show__more_dis").fadeOut(300);
		$(".idx_dis").val(0);
	}
}
function show_dis_detail(me)
{
	var idx_dis=$(".idx_dis").val();
	if(idx_dis==0)
	{
		$(".sh_dis").slideDown(300);
		$(me).children(".fa").css({"transform": "rotateX(180deg)"},300);
		$(".idx_dis").val(1);
	}
	else
	{
		$(".sh_dis").slideUp(300);
		$(me).children(".fa").css({"transform": "rotateX(0deg)"},300);
		$(".idx_dis").val(0);
	}
}
function check_price()
{
	setTimeout(function(){
		$.ajax({
			url:"<?php echo $url_link;?>libs/actions/action-check-price.php",
			type:"POST",
			dataType:"json"	,
			data:$("#form_contact_website").serialize(),
			success: function(res){
				if(res.data!=undefined)
				{
					if(res.data['val']!=undefined && res.data['val']!=0)
					{
						var price = res.data['val'];
						var services = (res.data['services']!='-')?res.data['services']:0;
						var vat = (res.data['vat']!='-')?res.data['vat']:0;
						var deposite = (res.data['deposite']!='-')?res.data['deposite']:0;
						var exchange = (res.data['exchange']!='-')?res.data['exchange']:'USD';
						var exchange_sym = (exchange=='USD')?'$':'฿';
						var total_price_all_night = parseInt(res.data['trueval'])*res.data['total_night'];
						
						var discount_1 = (res.data['discount_1']!='-')?(total_price_all_night*res.data['discount_1']):0;
						var discount_2 = (res.data['discount_2']!='-')?(total_price_all_night*res.data['discount_2']):0;
						var discount_3 = (res.data['discount_3']!='-')?(total_price_all_night*res.data['discount_3']):0;
						var discount_4 = (res.data['discount_4']!='-')?(total_price_all_night*res.data['discount_4']):0;
						var discount_5 = (res.data['discount_5']!='-')?(total_price_all_night*res.data['discount_5']):0;
						var discount_6 = (res.data['discount_6']!='-')?(total_price_all_night*res.data['discount_6']):0;
						var discount_7 = (res.data['discount_7']!='-')?(total_price_all_night*res.data['discount_7']):0;
						var discount_8 = (res.data['discount_8']!='-')?(total_price_all_night*res.data['discount_8']):0;
						var discount_9 = (res.data['discount_9']!='-')?(total_price_all_night*res.data['discount_9']):0;
						
						var discount_net = parseFloat(discount_1+discount_2+discount_3+discount_4+discount_5+discount_6+discount_7+discount_8+discount_9);
						var price_after_discount = parseFloat(price)-discount_net;
						
						var tax_1 = (res.data['tax_1']!='-')?res.data['tax_1']*price_after_discount:0;
						var tax_2 = (res.data['tax_2']!='-')?res.data['tax_2']*price_after_discount:0;
						var tax_3 = (res.data['tax_3']!='-')?res.data['tax_3']*price_after_discount:0;
						var tax_4 = (res.data['tax_4']!='-')?res.data['tax_4']*price_after_discount:0;
						var tax_5 = (res.data['tax_5']!='-')?res.data['tax_5']*price_after_discount:0;
						
						var tax_net = parseFloat(tax_1+tax_2+tax_3+tax_4+tax_5);
						
						var total = price_after_discount+tax_net;
						var total_price = numeral(total).format('0,0.00');
						
						var dep = numeral(res.data['deposite']).format('0,0');
						
						var dat = '';
						dat += '<div class="s_price">';
							//(res.data['services']!='-')?dat += '<span class="idet">Services/Tax '+res.data['services']+' %</span><br>':0;
							//(res.data['vat']!='-')?dat += '<span class="idet">VAT/Tax '+res.data['vat']+' %</span><br>':0;
							//(res.data['deposite']!='-')?dat += '<span class="idet">Security Deposit '+dep+' '+exchange+'.</span><br>':0;
							dat += '<div class="row">';
								/*dat += '<div class="col-md-7 sh_more">';
									dat += '<span class="idet">Price/night</span>';
								dat += '</div>';
								dat += '<div class="col-md-5 text-right sh_more">';
									(res.data['trueval']!='-')?dat += '<span class="idet">'+exchange_sym+numeral(res.data['trueval']).format('0,0')+'</span>':0;
								dat += '</div>';*/
								
								dat += '<div class="col-md-7 sh_more">';
									(res.data['total_night']!='-')?dat += '<span class="idet">'+exchange_sym+numeral(res.data['trueval']).format('0,0')+' x '+res.data['total_night']+' nights</span><br>':0;
								dat += '</div>';
								dat += '<div class="col-md-5 text-right sh_more">';
									(total_price_all_night!=0)?dat += '<span class="idet">'+exchange_sym+numeral(total_price_all_night).format('0,0')+'</span><br>':0;
								dat += '</div>';
								
								if(discount_net!=0)
								{
									dat += '<div class="col-md-7 sh_more">';
										dat += '<span class="idet">Discount</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_more">';
										dat += '<span class="idet">-'+exchange_sym+discount_net+'</span>';
									dat += '</div>';
									dat += '<div class="col-md-12">';
										dat += '<button type="button" class="show__more_dis" onClick="show_dis_detail(this);"><i class="fa fa-angle-down" aria-hidden="true"></i></button>';
									dat += '</div>';
								}
								
								if(discount_1!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Early bird '+res.data['discount_1_1']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_1+'</span>';
									dat += '</div>';
								}
								if(discount_2!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Last minute '+res.data['discount_2_2']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_2+'</span>';
									dat += '</div>';
								}
								if(discount_3!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Early bird '+res.data['discount_3_3']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_3+'</span>';
									dat += '</div>';
								}
								if(discount_4!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Last minute '+res.data['discount_4_4']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_4+'</span>';
									dat += '</div>';
								}
								if(discount_5!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Long Stay '+res.data['discount_5_5']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_5+'</span>';
									dat += '</div>';
								}
								if(discount_6!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Long Stay '+res.data['discount_6_6']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_6+'</span>';
									dat += '</div>';
								}
								if(discount_7!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Early bird '+res.data['discount_7_7']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_7+'</span>';
									dat += '</div>';
								}
								if(discount_8!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Early bird '+res.data['discount_8_8']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_8+'</span>';
									dat += '</div>';
								}
								if(discount_9!=0)
								{
									dat += '<div class="col-md-7 sh_dis">';
										dat += '<span class="idet">Early bird '+res.data['discount_9_9']+'%</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_dis">';
										dat += '<span class="idet">-'+exchange_sym+discount_9+'</span>';
									dat += '</div>';
								}
								
								if(res.data['deposite']!='-')
								{
									dat += '<div class="col-md-7 sh_more">';
										dat += '<span class="idet">Security Deposit</span>';
									dat += '</div>';
									dat += '<div class="col-md-5 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+dep+'</span>';
									dat += '</div>';
								}
								
								if(res.data['tax_1']!='-')
								{
									dat += '<div class="col-md-8 sh_more">';
										dat += '<span class="idet">'+res.data['tax_1_txt']+'% service charge & vat</span>';
									dat += '</div>';
									dat += '<div class="col-md-4 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+numeral(tax_1).format('0,0.00')+'</span>';
									dat += '</div>';
								}
								
								if(res.data['tax_2']!='-')
								{
									dat += '<div class="col-md-8 sh_more">';
										dat += '<span class="idet">'+res.data['tax_2_txt']+'% service charge & Taxes.</span>';
									dat += '</div>';
									dat += '<div class="col-md-4 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+numeral(tax_2).format('0,0.00')+'</span>';
									dat += '</div>';
								}
								
								if(res.data['tax_3']!='-')
								{
									dat += '<div class="col-md-8 sh_more">';
										dat += '<span class="idet">'+res.data['tax_3_txt']+'% service charge</span>';
									dat += '</div>';
									dat += '<div class="col-md-4 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+numeral(tax_3).format('0,0.00')+'</span>';
									dat += '</div>';
								}
								
								if(res.data['tax_4']!='-')
								{
									dat += '<div class="col-md-8 sh_more">';
										dat += '<span class="idet">'+res.data['tax_4_txt']+'% tax</span>';
									dat += '</div>';
									dat += '<div class="col-md-4 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+numeral(tax_4).format('0,0.00')+'</span>';
									dat += '</div>';
								}
								
								if(res.data['tax_5']!='-')
								{
									dat += '<div class="col-md-8 sh_more">';
										dat += '<span class="idet">'+res.data['tax_5_txt']+'% vat</span>';
									dat += '</div>';
									dat += '<div class="col-md-4 text-right sh_more">';
										dat += '<span class="idet">'+exchange_sym+numeral(tax_5).format('0,0.00')+'</span>';
									dat += '</div>';
								}
								
								dat += '<div class="col-md-12 "><div class="col-md-12 p_box"></div></div>';
								
								dat += '<div class="col-md-7 ">';
									dat += '<strong>Estimated Price</strong>';
								dat += '</div>';
								dat += '<div class="col-md-5 text-right">';
									dat += '<strong>'+exchange_sym+total_price+'</strong>';
								dat += '</div>';
								dat += '<div class="col-md-12">';
									dat += '<button type="button" class="show__more" onClick="show_price_detail(this);"><i class="fa fa-angle-down" aria-hidden="true"></i></button>';
								dat += '</div>';
							dat += '</div>';
							
							/*(res.data['tax_1']!='-')?dat += '<span class="idet">Rate is subject to '+res.data['tax_1_txt']+'% service charge & VAT.</span><br>':0;
							(res.data['tax_2']!='-')?dat += '<span class="idet">Rate is subject to '+res.data['tax_2_txt']+'% service charge & Taxes.</span><br>':0;
							(res.data['tax_3']!='-')?dat += '<span class="idet">Rate is subject to '+res.data['tax_3_txt']+'% service charge.</span><br>':0;
							(res.data['tax_4']!='-')?dat += '<span class="idet">Rate is subject to '+res.data['tax_4_txt']+'% tax.</span><br>':0;
							(res.data['tax_5']!='-')?dat += '<span class="idet">Rate is subject to '+res.data['tax_5_txt']+'% vat.</span>':0;*/
							
						dat += '</div>';
						$(".show_price").html(dat);
						
						
						$(".sh_dis").slideUp(300);
						$(".show__more_dis").children(".fa").css({"transform": "rotateX(0deg)"},300);
						$(".idx").val(0);
						$(".idx_dis").val(0);
						setTimeout(function(){
							$(".sh_more").slideUp(500);
							$(".show__more").fadeIn(500);
							$(".show__more_dis").fadeOut(500);
							$(".show__more_dis").fadeOut(300);
							$(".sh_dis").slideUp(300);
							$(".show__more_dis").children(".fa").css({"transform": "rotateX(0deg)"},300);
							$(".idx").val(0);
							$(".idx_dis").val(0);
						},3000);
					}
					else
					{
						$(".show_price").html('');
					}
				}
				else
				{
					$(".show_price").html('');
				}
			}
		});
	},500);
}

/*$ar_val['services'] = 'Services/Tax : '.($sql['tax']!='')?$sql['tax']:'-';
	$ar_val['vat'] = 'VAT/Tax : '.($sql['vat']!='')?$sql['vat']:'-';
	$ar_val['deposite'] = 'Deposite : '.($sql['deposite']!='')?$sql['deposite']:'-';
	$ar_val['tax_1'] = 'Rate is subject to : '.($sql['tax_1']!='')?$sql['tax_1']:'-';
	$ar_val['tax_2'] = 'Rate is subject to : '.($sql['tax_2']!='')?$sql['tax_2']:'-';
	$ar_val['tax_3'] = 'Rate is subject to : '.($sql['tax_3']!='')?$sql['tax_3']:'-';
	$ar_val['tax_4'] = 'Rate is subject to : '.($sql['tax_4']!='')?$sql['tax_4']:'-';
	$ar_val['tax_5'] = 'Rate is subject to : '.($sql['tax_5']!='')?$sql['tax_5']:'-';
*/	
function sendemail_p()
{
	if($("#txemail_p").val()=='')
	{
		$(".textalert_p").text("* Please fill your data");//alert("* Please fill your data");
		$("#txemail_p").focus();
		$("#txemail_p").css({"border-color":"red"});
		$(".textalert_p").css({"color":"red"});
		return false;
	}
	else
	{
		$.ajax({
			url:"<?php echo $url_link;?>libs/actions/action-property-share-email.php",
			type:"POST",
			dataType:"json"	,
			data:$("#form_share_email").serialize(),
			success: function(res){
				
				if(res.status==true)
				{
					
					$("#txemail_p").val('');
					//window.location = "<?php echo $url_link;?>thanks/<?php echo $room['destination'];?>.html";
					$(".textalert_p").text("Successful");
					$(".textalert_p").css({"color":"green"});
					
					setTimeout(function(){
						$("#myModal_email").modal('hide');
					},2000);
				}
				else
				{
					alert(res.msg);
					return false;
				}
			}
		});
	}
}

function wapp(urll)
{
	window.location = urll;
}

function get_link()
{
	$(".box_getlink").slideDown(300);
	$(".tx_getlink").select();
}
function copy_link()
{
	$(".tx_getlink").select();
	document.execCommand("copy");
}
function close_share()
{
	$(".bg_popup_share,.popup_share,.box_getlink").fadeOut(300);
}
function fx_share()
{
	$(".bg_popup_share").fadeIn(300);
	$(".popup_share").fadeIn(300);
}



function close_phone()
{
	$(".bg_popup_phone").fadeOut(300);
	$(".popup_phone").fadeOut(300);
}
function open_phone()
{
	$(".bg_popup_phone").fadeIn(300);
	$(".popup_phone").fadeIn(300);
}

function prop_contact()
{
    
	if($("#full_name").val()=='')
	{
		//alert("* Please fill your data");
		$(".textalert").text("* Please fill your data");
		$("#full_name").focus();
		$("#full_name").css({"border-color":"red"});
		return false;
	}
	else if($("#txemail").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#txemail").focus();
		$("#txemail").css({"border-color":"red"});
		return false;
	}
	else if($("#no_bed").val()=='0')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#no_bed").focus();
		$("#no_bed").css({"border-color":"red"});
		return false;
	}
	//else if($("#cbbGuest").val()=='')
//	{
//		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
//		$("#cbbGuest").focus();
//		$("#cbbGuest").css({"border-color":"red"});
//		return false;
//	}
	else if($("#checkin").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#checkin").focus();
		$("#checkin").css({"border-color":"red"});
		return false;
	}
	else if($("#checkout").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#checkout").focus();
		$("#checkout").css({"border-color":"red"});
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("txemail").value.match(Email))
		{
		   $(".textalert").text("* Email format is not valid");//alert('Email format is not valid');
		   document.getElementById("txemail").focus();
		   return false;
		}
		else
		{
            showLoader('ajaxLoader1');
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-property-contact-test-2.php",//action-property-contact.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_contact_website").serialize(),
				success: function(res){
					
					if(res.status==true)
					{
						
						$(".ip").val('');
						window.location = "<?php echo $url_link;?>thanks/<?php echo $room['destination'];?>.html";
						$(".textalert").text("Successful");
						$(".textalert").css({"color":"green"});
						
						setTimeout(function(){
							//window.location.reload();
						},2600);
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		}
	}
}
//-->
</script>









