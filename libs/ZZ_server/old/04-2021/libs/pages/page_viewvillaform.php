<meta name="robots" content="noindex">
<?php
$id = $_REQUEST['id'];
if(isset($_SESSION['auth']['user_id']))
{
	?>
    <button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
    <script>
	function goback()
	{
		window.history.back();
	}
	
	</script>
	<?php
}
?>
<style>
body
{
	background: #E5E5E5;
}
.back_form
{
	background:white;
	box-shadow:0px 0px 5px #b7b7b7;
	padding:20px 20px 20px 20px;
	font-size:18px;
}
.btn_back
{
	width:100px;
	z-index:10;
	position:relative;
}
.vf_title
{
	font-weight:bold;
	font-size:22px;
}
.vt_undl
{
	text-decoration:underline;
}
.vf_title_sub
{
	margin-left:50px;
}
.inp
{
	width:100%;
}
.cok,.tok
{
	color:#3bcc39;
	display:none;
}
.cno,.tno
{
	color:#369000;
	display:none;
}
input,textarea
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#e5e5e5;
}
input:focus,textarea:focus
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#fff;
}
</style>

<br>
<br>
<br>
<?php
	
	$data = $dbc->GetRecord("properties","*","id='".$id."'");
	$vil_name = explode("|",$data['name']);
	
	if(!$dbc->HasRecord("villa_form","property = '".$id."'"))
	{
		$val = array(
			'#id' => "DEFAULT",
			'#property' => $id,
			'#created' => 'NOW()',
		);
		$dbc->Insert("villa_form",$val);
		$form_id = $dbc->GetID();
	}
	else
	{
		$form = $dbc->GetRecord("villa_form","*","property = '".$id."'");
		$form_id = $form['id'];
	}
?>

<script>
function alert_text(inp)
{
	alert("Please fill your data");
	$(inp).focus();
	return false;
}
</script>

<div class="container back_form">
<form id="v_form_0">
<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    <div class="col-md-12 nopad ">
        <div class="vf_titlea">
            <strong>Customer :</strong> <?php echo $form['cus_name'];?> / 
            <strong>Travel date :</strong>  <?php echo $form['arrive'];?> - <?php echo $form['arrive_to'];?>
           
        </div>
    </div>
    
</form>
</div>

<div class="container back_form">
	<div class="col-12 nopad">
    	<img src="../../upload/v_form1.png" width="100%">
    </div>
	<div class="rows">
    <form id="v_form_1">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	<div class="vf_title">Dear <?php echo $form['dear_name'];?>,
            <span class="icon">
            	<i class="fa fa-check cok cok1" aria-hidden="true"></i> <span class="tok tok1"></span>
                <i class="fa fa-check cno cno1" aria-hidden="true"></i> <span class="tno tno1"></span>
            </span></div>
        	Thank you for your reservation with InspiringVillas.<br>
            I would like to gather the information to make sure your stay at <strong><?php echo $vil_name[0];?></strong> will be as wonderful as possible.
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">1) VILLA GENERAL INFORMATION </div>
            <?php $inf = json_decode($form['informations'],true);?>
            <dl class="dl-horizontal top15">
              <dt>Villa Name</dt> <dd><strong><?php echo $vil_name[0];?></strong></dd>
              <dt>Address</dt> <dd><?php echo $inf['address'];?></dd>
              <dt>Location</dt> <dd><?php echo $inf['location'];?></dd>
              <dt>Telephone</dt> <dd><?php echo $inf['phone'];?></dd>
              <dt>Instagram</dt> <dd>#InspiringVillas </dd>
            </dl>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">2) SERVICE HOURS</div>
            <p class="top15"><?php echo $form['services'];?></p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">3) ONSITE CONTACT</div>
            <p class="top15"><?php echo $form['onsite_con'];?></p>
        </div>
    </form>
    
    
    <form id="v_form_4">
        <div class="col-md-12 nopad top15">
        	<?php $arrival = json_decode($form['arrival'],true);?>
        	<div class="vf_title vt_undl">4) ARRIVAL AND DEPARTURE TIMES</div>
            <p class="top15">Please provide your flight information in tables below for our team to be ready to check your party in.</p>
            <div class="col-md-6 text-center">Check-in time: <?php echo $arrival['check_in'];?></div>	
            <div class="col-md-6 text-center">Check-out time: <?php echo $arrival['check_out'];?></div>	
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">AIRPORT TRANSFER</div>
            <p class="top15 vf_title_sub"><?php echo $arrival['transfer'];?></p>
        </div>
        
        <div class="col-md-12 nopad top15">
        
        	<table id="tb_4" width="100%%" border="1" class="table table-striped">
             <thead>
                <tr>
                  <th>Transfers</th>
                  <th>Date</th>
                  <th>Airline</th>
                  <th>Flight number</th>
                  <th>Time</th>
                  <th>No. of passengers</th>
                  <th>Transfer request</th>
                  <!--<th>#</th>-->
                </tr>
             </thead>
             <tbody>
             <?php 
			 $air = json_decode($form['airport_transfer'],true);
			 if(count($air)>0)
			 {
				 foreach($air as $at)
				 {
					echo '<tr>';
						echo '<td  style="width: 140px;">HKT Arrival</td>';
						echo '<td >'.$at['tx_date_a'].'</td>';
						echo '<td >'.$at['tx_airline_a'].'</td>';
						echo '<td >'.$at['tx_flight_a'].'</td>';
						echo '<td >'.$at['tx_time_a'].'</td>';
						echo '<td >'.$at['tx_pass_a'].'</td>';
						echo '<td >'.$at['tx_transfer_a'].'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td  style="width: 140px;">HKT Departure</td>';
						echo '<td >'.$at['tx_date_d'].'</td>';
						echo '<td >'.$at['tx_airline_d'].'</td>';
						echo '<td >'.$at['tx_flight_d'].'</td>';
						echo '<td >'.$at['tx_time_d'].'</td>';
						echo '<td >'.$at['tx_pass_d'].'</td>';
						echo '<td >'.$at['tx_transfer_d'].'</td>';
					echo '</tr>';
				 }
			 }
			 else
			 {
				 ?>
                    <tr>
                      <td style="width: 140px;"><div class="col-md-12 nopad">HKT Arrival</div><div class="col-md-12 nopad top20">HKT Departure</div></td>
                      <td ></td>
                      <td ></td>
                      <td ></td>
                      <td ></td>
                      <td ></td>
                      <td ></td>
                      <?php /*?><td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td><?php */?>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table>
            <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
        </div>
    </form>
    
    <form id="v_form_5">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">5) TELEPHONE NUMBER</div>
            <p class="top15">The mobile number you will have arriving the villa in Phuket</p>
            
            <div class="col-md-12 nopad "><input type="tel" name="tx_phone" id="tx_phone" style="width:100%" value="<?php echo $form['phone'];?>">
            <?php /*?><textarea name="tx_phone" id="tx_phone" cols="30" rows="5" style="width:100%" readonly><?php echo $form['phone'];?></textarea><?php */?></div>
            <p>
            	
            	<span class="icon">
                    <i class="fa fa-check cok cok5" aria-hidden="true"></i> <span class="tok tok5"></span>
                    <i class="fa fa-check cno cno5" aria-hidden="true"></i> <span class="tno tno5"></span>
                </span></div>
            </p>
        </div>
        
    </form>
    
    <form id="v_form_6">
    <input type="hidden" name="txtID" id="txtID" value="<?php echo $form_id;?>" >
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">6) GUEST REGISTRATION</div>
            <p class="top15">Pursuant to The Rental Terms & Conditions, there will be a charge of $300 per night for any unregistered guest who stays at the villa. For your room assignment, please have a look at floor plan attached</p>
        </div>
        
        <div class="col-md-12 nopad top15">
        <div class="">
        
        <span class="icon">
            <i class="fa fa-check cok cok6" aria-hidden="true"></i> <span class="tok tok6"></span>
            <i class="fa fa-check cno cno6" aria-hidden="true"></i> <span class="tno tno6"></span>
        </span>
        	<table id="tb_guest" width="100%%" border="1" class="table table-striped">
             <thead>
                <tr>
                  <th>No.</th>
                  <th>First & Last Name</th>
                  <th>Passport No.</th>
                  <th>City/Country of Residence</th>
                  <th>Date of Birth</th>
                  <th>Nationality</th>
                  <th>Room assignment</th>
                </tr>
             </thead>
             <tbody>
             <?php 
			 $gue = json_decode($form['guest'],true);
			 if(count($gue)>0)
			 {
				 $i=0;
				 foreach($gue as $guest)
				 {
					 $i++;
					echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$guest['tx_first'].'</td>';
						echo '<td>'.$guest['tx_passport'].'</td>';
						echo '<td>'.$guest['tx_city'].'</td>';
						echo '<td>'.$guest['tx_date'].'</td>';
						echo '<td>'.$guest['tx_nationality'].'</td>';
						echo '<td>'.$guest['tx_room'].'</td>';
					echo '</tr>';
				 }
			 }
			 else
			 {
				 ?>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table>
            <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
        </div>
        
    </form>
    
    <form id="v_form_7a">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">7) FOOD AND BEVERAGES</div>
            <p class="top15">Food and beverage requests are required at least 72 hours prior to your arrival. The items will be purchased at cost plus a 20% procurement charge.</p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">A. FIRST DINNER</div>
            <p class="top15 vf_title_sub">Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for more than 6 guests are 8 dishes including appetizers and desserts. </p>
        </div>
        
        <div class="col-md-12 nopad top15">
        
            <div class="vf_title_sub">
            <span class="icon">
            	<i class="fa fa-check cok cok7a" aria-hidden="true"></i> <span class="tok tok7a"></span>
                <i class="fa fa-check cno cno7a" aria-hidden="true"></i> <span class="tno tno7a"></span>
            </span>
            
            </div>
            
            <div class="col-md-12 nopad top15">
                <div class="nopad vf_title_sub col-md-12 dinn">
                	<?php
					$din = json_decode($form['dinner'],true);
					$a=0;
					foreach($din as $dinner)
					{
						$a++;
						echo '<div class="col-md-12 nopad top10">';
							echo '<div class="col-md-1 text-right">'.$a.'. </div>';
							echo '<div class="col-md-8 nopad">'.$dinner.'</div>';
							
						echo '</div>';
					}
					?>
                	<!--<div class="col-md-12 nopad top10">
                    
                        <div class="col-md-8 nopad"><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner"></div>
                        <div class="col-md-4"></div>
                    </div>-->
                </div>
            </div>
            <p class="top15 vf_title_sub"></p><br><br><br>
        </div>
        
    </form>
    
    <form id="v_form_7b">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">B. FIRST BREAKFAST</div>
                <p class="top15 vf_title_sub"></p>
        </div>
        
            <div class="vf_title_sub">
            <div class="col-md-12 nopad "><textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" style="width:100%" readonly><?php echo $form['breakfast'];?></textarea></div>
            <p>
            <span class="icon">
            	<i class="fa fa-check cok cok7b" aria-hidden="true"></i> <span class="tok tok7b"></span>
                <i class="fa fa-check cno cno7b" aria-hidden="true"></i> <span class="tno tno7b"></span>
            </span>
            	</p>
            </div>
        </div>
    </form>
    
    
    <?php $f7c = json_decode($form['provisioning'],true); ?>
    <form id="v_form_7c">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">C. INITIAL PROVISIONING</div>
                <p class="top15 vf_title_sub">Please select from the <strong>provisional list</strong> attached the ingredients and groceries pre-stocked for your arrival. </p>
            </div>
        
            <div class="vf_title_sub">
                <div class="col-md-12 nopad ">
                    <table width="100%%" border="0" class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Provisioning</td>
                                <td><?php echo ($f7c['wine']=='')?'Please select and attach back the provisional list with your requirements.':$f7c['provisioning'];?></td>
                            </tr>
                            <tr>
                                <td>Wine List</td>
                                <td><?php echo $f7c['wine'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>
                <span class="icon">
                    <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                    <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                </span>
                </p>
            </div>
        </div>
    </form>
    
    <form id="v_form_7d">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">D. SPECIAL DIETARY</div>
                <p class="top15 vf_title_sub">Please advise of any special dietary requirements i.e. vegetarian, vegan, food allergies, low sodium, etc.</p>
        </div>
        
            <div class="vf_title_sub">
            <div class="col-md-12 nopad "><textarea name="tx_special" id="tx_special" cols="30" rows="5" style="width:100%" readonly><?php echo $form['dietary'];?></textarea></div>
            <p>
            	<span class="icon">
                    <i class="fa fa-check cok cok7d" aria-hidden="true"></i> <span class="tok tok7d"></span>
                    <i class="fa fa-check cno cno7d" aria-hidden="true"></i> <span class="tno tno7d"></span>
                </span>
            </p>
            </div>
        </div>
    </form>
    
    
    <form id="v_form_8">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	
        	<div class="vf_title vt_undl">8) PAYMENT ON ARRIVAL</div>
            <p class="top15">Any expense made at the villa is only payable in cash</p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">A. SECURITY DEPOSIT </div>
            <p class="top15 vf_title_sub">The refundable security deposit <?php echo $form['deposit'];?>
                 in any major currency will be collected cash upon arrival or credit card authorization.</p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">B. REIMBURSEMENT</div>
            <p class="top15 vf_title_sub">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers.  </p>
        </div>
    </form>
    
    
    <?php $f9 = json_decode($form['service'],true);?>
    <form id="v_form_9">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	
        	<div class="vf_title vt_undl">9) CONCEIRGE SERVICES</div>
            <p class="top15">Any expense made at the villa is only payable in cash</p>
        </div>
        
        <div class="col-md-12 nopad ">
            <table width="100%%" border="0" class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td style="width:30%;">Excursion & Tours</td>
                        <td><?php echo ($f9['Tours']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Tours'];?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Restaurant Reservation</td>
                        <td><?php echo $f9['Restaurant'];?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Massage & Spa</td>
                        <td><?php echo $f9['Massage'];?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Special Occasion</td>
                        <td><?php echo ($f9['Occasion']=='')?'Birthday, Anniversary, Wedding, Proposal, Honeymoon, others…':$f9['Occasion'];?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Other Arrangements</td>
                        <td><?php echo($f9['Arrangements']=='')?'Baby equipment required, extra bed, ':$f9['Arrangements'];?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Dietary</td>
                        <td><?php echo ($f9['Dietary']=='')?'Vegan, vegetarian, gluten free, kosher, Muslim, allergies:':$f9['Dietary'];?></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 nopad "><textarea name="tx_Comment" id="tx_Comment" cols="30" rows="5" style="width:100%" placeholder="Comment" readonly><?php echo $f9['Comment'];?></textarea></div>
        </div>
        <p>
        <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
        </p>
    </form>
    
    
    <div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">10) GRATUITIES</div>
        <p class="top15">Gratuities are not mandatory but a customary gesture to award the staff for their kind hospitality and flexibility. The method of payment is cash for tips on-site.</p>
        <p class="top15">I look forward to receiving the above information and welcoming you to Talay Naiharn Villa. Please do not hesitate to contact us if you have questions or requests.</p>
    </div>
    
    <div class="col-md-12 nopad top30">
        <p class="top15">Kind regards,</p>
        <p class="top15"><strong>Your Inspiring Villas Team!</strong></p>
    </div>
    
    
    
    </div><!--end row-->
</div>


<br><br><br><br><br><br>














