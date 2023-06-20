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
    <img class="lazy web" data-src="<?php echo imagePath($photo_cover);?>" alt="inspiringvillas cover" width="100%" class="motop">
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
<div class="web"><?php include "libs/pages/search.php";?></div>


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
                                	<div class="col-xs-12 col-sm-12 col-md-12 nopad">
                                	<label for="subject">Phone - for WhatsApp - it’s quicker! <!--<span class="cred">*</span>--></label>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-3 nopad">
                                        <?php /*?><label for="subject">Area code <!--<span class="cred">*</span>--></label><?php */?>
                                        <select name="countryCode" id="countryCode" class="form-control ip" >
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
                                        <!--<input type="text" class="form-control ip" id="subject" name="subject">-->
                                    </div>
                                    <div class="col-xs-8 col-sm-9 col-md-9 tPhone">
                                        <?php /*?><label for="subject">Phone - for WhatsApp - it’s quicker! <!--<span class="cred">*</span>--></label><?php */?>
                                        <input type="text" class="form-control ip" id="subject" name="subject">
                                    </div>
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
                        
                        <?php /*?><div class="col-md-12 bggray" style="margin-bottom:20px;">
                            <h2>Australian Office</h2>
                            <div style="padding-left: 15px;font-size: 14px;">
                            	Please use telephone or email contacts at the top <br>of this page<br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;245 Selby Street, Perth, WA, 6014
                                <br><br>
                            </div>
                        </div><?php */?>
                        
                        
                        

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
            <?php /*?>Inspiring Villas is affiliated with <a href="http://luxesorted.com">LUXESORTED</a>, the luxury concierge service in Thailand.<?php */?>
            <?php /*?><br><br><?php */?>
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