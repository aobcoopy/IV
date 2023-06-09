<meta name="robots" content="noindex">


<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;

if($dbc->HasRecord("villa_form","id = '".$id."'"))
{
	$villa_form = $dbc->GetRecord("villa_form","*","id = '".$id."'");
	$form_id = $villa_form['id'];
		
	$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
	$vil_name = explode("|",$data['name']);
	
	$form = $dbc->GetRecord("villa_form_mapping","*","villaform_id = '".$id."'");
	
}
else
{
	$villa_form = '';
	$data = '';
	$vil_name = '';
	$form = '';
	$form_id = '';
}
	
if(isset($_SESSION['auth']['user_id']))
{
	?>
    <div class="container-fluid nopad top50" style="position:fixed; width:100%; z-index:10;">
        <div class="col-12 nopad text-center">
            <!--<button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>-->
            <div class="col-md-6 nopad"><button type="button" class="btn btn-primary btn_back btn-sm btn-block" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></div>
            <div class="col-md-6 nopad"><button class="btn btn-danger btn-sm btn-block"><?php echo $vil_name[0].'Template';?></button></div>
            
        </div>
    </div>
    
    <!--<div class="container top50"><br><br>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
            <br><br>
            <button class="btn btn-danger btn-lg "><?php echo $vil_name[0].'Template';?></button>
        </div>
    </div>-->
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaform-admin-<?php echo $_REQUEST['id'];?>.html';
	}
	</script>
	<?php
}
?>
<div class="container">
	<div class="col-12 text-center">
    	
    </div>
</div>
<style>
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #f05542;
    border-radius: 10px;
}
.alert-warning {
    border-color: #0b2646;
    background-color: #617b99;
    color: #0b2646;
}
.alert-warning h1, .alert-warning h2, .alert-warning h3, .alert-warning h4, .alert-warning h5, .alert-warning h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success h1, .alert-success h2, .alert-success h3, .alert-success h4, .alert-success h5, .alert-success h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success {
    border-color: #0b2646;
    background-color: #c3d4e8;
    color: #0b2646;
}

body
{
	background: #ffe7e7;
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
	/*width:100px;*/
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
	
	
		
	
?>

<script>
function alert_text(inp)
{
	alert("Please fill your data");
	$(inp).focus();
	return false;
}
</script>

<?php /*?><div class="container back_form">
<form id="v_form_0">
<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    <div class="col-md-12 nopad ">
        <div class="vf_titlea">
            Customer <input type="text" name="tx_cus" id="tx_cus" value="<?php echo $form['cus_name'];?>">
            Travel date From <input type="date" name="tx_cusdate" id="tx_cusdate" value="<?php echo $form['arrive'];?>">
             To <input type="date" name="tx_arrive_to" id="tx_arrive_to" value="<?php echo $form['arrive_to'];?>">
            <button type="button" class="btn btn-primary " onClick="save_cus();"> Save</button>
            <span class="icon">
                <i class="fa fa-check cok cok0" aria-hidden="true"></i> <span class="tok tok0"></span>
                <i class="fa fa-check cno cno0" aria-hidden="true"></i> <span class="tno tno0"></span>
            </span>
        </div>
    </div>
    
</form>
</div>
<script>
function save_cus()
{
	if($("#tx_cus").val()=='')
	{
		alert_text("#tx_cus");
	}
	else if($("#tx_cusdate").val()=='')
	{
		alert_text("#tx_cusdate");
	}
	else
	{
		$.ajax({
			url:"libs/action_form/save_cus.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_0").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok0").fadeIn(300);
					$(".cno0,.tno0").hide();
				}
				else
				{
					$(".cno0,.tno0").fadeIn(300);
					$(".tno0").html(res.msg);
					$(".cok0").hide();
				}
			}
		});
	}
}
</script><?php */?>
    

<div class="container back_form">
	<div class="col-12 nopad">
    	<img src="../../upload/v_form1.png" width="100%">
    </div>
	<div class="rows">
    
    
    <form id="v_form_1">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	<div class="vf_title">Dear <!--<input type="text" name="tx_dear" id="tx_dear" value="<?php echo $form['dear_name'];?>">,<button type="button" class="btn btn-primary " onClick="save_dear();"> Save</button>-->
            <span class="icon">
            	<i class="fa fa-check cok cok1" aria-hidden="true"></i> <span class="tok tok1"></span>
                <i class="fa fa-check cno cno1" aria-hidden="true"></i> <span class="tno tno1"></span>
            </span></div>
        	Thank you for your reservation with InspiringVillas.<br>
            I would like to gather the information to make sure your stay at <strong><?php echo $vil_name[0];?></strong> will be as wonderful as possible.
        </div>
    </form>
    <script>
    function save_dear()
	{
		if($("#tx_dear").val()=='')
		{
			alert_text("#tx_dear");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_dear.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_1").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok1").fadeIn(300);
						$(".cno1,.tno1").hide();
					}
					else
					{
						$(".cno1,.tno1").fadeIn(300);
						$(".tno1").html(res.msg);
						$(".cok1").hide();
					}
				}
			});
		}
	}
    </script>  
    
    <div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">BOOKING DETAILS </div>
		<?php 
        $inf = json_decode($villa_form['informations'],true);
        $booking = json_decode(base64_decode($inf['booking']),true);
		$bd = ($booking['booking_details']!='')?'block':'none';
		//$bi = ($booking['booking_inclusions']!='')?'block':'none';
		$ac = ($booking['additional_charges']!='')?'block':'none';
		
		$inc = json_decode(base64_decode($inf['inclusions']),true);
		$bi = (count($inc)>0)?'block':'none';
		$not = json_decode(base64_decode($inf['note']),true);
		$notess = (count($not)>0)?'block':'none';
        ?>
        <dl class="row top15 dl-horizontal">
            <dt class="col-sm-2- text-right">Villa Name</dt> <dd class="col-sm-10-"><strong><?php echo $vil_name[0];?></strong></dd>
            <dt class="col-sm-2- text-right">Address</dt> <dd class="col-sm-10-"><?php echo $inf['address'];?></dd>
            <dt class="col-sm-2- text-right">Location</dt> <dd class="col-sm-10-"> <?php echo $inf['location'];?></dd>
            <dt class="col-sm-2- text-right">Google map</dt> 
            <dd class="col-sm-10-">
                <?php 
				$disp = ($inf['map']!='')?:'disabled';
				?>
                <a href="<?php echo $inf['map'];?>" target="_blank" class="btn btn-warning <?php echo $disp;?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Google Map</a>
            </dd>
            <dt class="col-sm-2- text-right" style="display:<?php echo $bd;?>">Booking Details</dt> <dd class="col-sm-10-"  style="display:<?php echo $bd;?>">
            	<p style="white-space:pre-warp">	<?php echo nl2br($booking['booking_details']);?></p>
            </dd>
            <dt class="col-sm-2- text-right" style="display:<?php echo $bi;?>">Booking Inclusions</dt> <dd class="col-sm-10-" style="display:<?php echo $bi;?>">
            	<?php
                if(count($inc)>0)
					{
						foreach($inc as $inclus)
						{
							echo '<div class="inclu_inp">';
								echo '- '.$inclus;
							echo '</div>';
						}
					}
				?><!--<p style="white-space:pre-warp"><?php echo nl2br($booking['booking_inclusions']);?></p>-->
            </dd>
            <dt class="col-sm-2- text-right" style="display:<?php echo $ac;?>">Additional Charges</dt> <dd class="col-sm-10-" style="display:<?php echo $ac;?>">
            	<p style="white-space:pre-warp"><?php echo nl2br($booking['additional_charges']);?></p>
            </dd>
            <dt class="col-sm-2- text-right" style="display:<?php echo $notess;?>">Note</dt> <dd class="col-sm-10-" style="display:<?php echo $notess;?>">
            	<?php
                if(count($not)>0)
					{
						foreach($not as $notee)
						{
							echo '<div class="inclu_inp">';
								echo '- '.$notee;
							echo '</div>';
						}
					}
				?><!--<p style="white-space:pre-warp"><?php echo nl2br($booking['booking_inclusions']);?></p>-->
            </dd>
          <!--<dt class="col-sm-2- text-right">Telephone</dt> <dd class="col-sm-10-"><?php echo $inf['phone'];?></dd>
          <dt class="col-sm-2- text-right">Instagram</dt> <dd class="col-sm-10-">#InspiringVillas </dd>-->
        </dl>
    </div>
    
    <div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">SERVICE HOURS</div>
        <p class="top15"><?php echo $villa_form['services'];?></p>
    </div>
    
    <?php 
		$os_status_vi = ($villa_form['onsite_status']==1)?'block':'none';
	?> 
    <div class="col-md-12 nopad top15" style="display:<?php echo $os_status_vi;?>">
        <div class="vf_title vt_undl">ONSITE CONTACT</div>
        <?php 
			$os_status = ($villa_form['onsite_status']==1)?$villa_form['onsite_con']:'-';
		?> 
        <p class="top15"><?php echo $os_status;?></p>
    </div>
    
    <form id="v_form_4">
        <div class="col-md-12 nopad top15">
        	<?php $arrival = json_decode($villa_form['arrival'],true);?>
        	<div class="vf_title vt_undl">ARRIVAL AND DEPARTURE TIMES</div>
            <p class="top15">Please provide your flight information in tables below for our team to be ready to check your party in.</p>
            <div class="row nomar">
            <div class="col-md-6 text-center">Check-in time: <?php echo $arrival['check_in'];?></div>	
            <div class="col-md-6 text-center">Check-out time: <?php echo $arrival['check_out'];?></div>	
            </div>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">AIRPORT TRANSFER</div>
             <?php
			$aptf = $arrival['transfer'];
			//echo $arrival['transfer'].'---<br>';
			foreach($aptf as $aptf_val)
			{
				echo '<p class="top15 vf_title_sub">- '.$aptf_val.'</p>';
			}
			?>
        </div>
        
    </form>
    
    <div class="col-md-12 nopad top15">
        
        <div class="grids">
        
        	<div class="col-md-12 r_arrival">
            
						 <div class="alert alert-success col-md-12 arrival" role="alert">
                            <h2><strong>Arrival</strong> <span class="badge badge-info"><?php echo $xx;?></span></h2>
                            <dl class="row">
                                <dt class="col-sm-4">Sign Name</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Date</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Airport/Hotel</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Flight number</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Time</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">No. of Adults/Kids</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Transfer Arrangement Yes or No</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Contact number and Special Request</dt>
                                <dd class="col-sm-8">-</dd>
                            </dl>
                        </div>
            </div>
            
            
            <div class="col-md-12 r_departure">
                            <div class="alert alert-warning col-md-12 departure" role="alert">
                            
                                <h2><strong>Departure</strong> <span class="badge badge-warning"><?php echo $yy;?></span></h2>
                                <dl class="row">
                                <dt class="col-sm-4">Sign Name</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Date</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Airport/Hotel</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Flight number</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Time</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">No. of Adults/Kids</dt>
                                <dd class="col-sm-8">-</dd>
                                <dt class="col-sm-4">Transfer Arrangement Yes or No</dt>
                                <dd class="col-sm-8">-</dd>
                                <!--<dt class="col-sm-4">Contact number and Special Request</dt>
                                <dd class="col-sm-8"><?php echo $at['tx_Contact_d'];?></dd>-->
                            </dl>
                                
                            </div>
            </div>
        </div>
        
        
        	<?php /*?><table id="tb_4" width="100%%" border="1" class="table table-striped">
             <thead>
                <tr>
                  <th>Transfers</th>
                  <th>Date</th>
                  <th>Airport/Hotel</th>
                  <th>Flight number</th>
                  <th>Time</th>
                  <th>No. of Adults/Kids</th>
                  <th>Transfer Arrangement<br>Yes or No</th>
                  <!--<th>#</th>-->
                </tr>
             </thead>
             <tbody>
             <?php 
			 $air = json_decode($villa_form['airport_transfer'],true);
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
                      <?php /*?><td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td><?php *-/?>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table><?php */?>
            <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
            <!--<p><strong>Special Request:</strong> <?php $spcrq = json_decode($form['special_request']); echo ($spcrq!='')?$spcrq:'-'?></p>-->
        </div>
    
    
    
    <!--<form id="v_form_5">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">5) TELEPHONE NUMBER</div>
            <p class="top15">The mobile number you will have arriving the villa in Phuket</p>
            
            <div class="col-md-12 nopad "><input type="tel" name="tx_phone" id="tx_phone" readonly style="width:100%" value="<?php echo $villa_form['phone'];?>"></div>
            <br><p><br>
            	<!--<button type="button" class="btn btn-primary " onClick="save_phone()"> Save</button>	--*>
            	<span class="icon">
                    <i class="fa fa-check cok cok5" aria-hidden="true"></i> <span class="tok tok5"></span>
                    <i class="fa fa-check cno cno5" aria-hidden="true"></i> <span class="tno tno5"></span>
                </span></div>
            </p>
        </div>
        
    </form>-->
    
    <script>
    function save_phone()
	{
		if($("#tx_phone").val()=='')
		{
			alert_text("#tx_phone");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_phone.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_5").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok5").fadeIn(300);
						$(".cno5,.tno5").hide();
					}
					else
					{
						$(".cno5,.tno5").fadeIn(300);
						$(".tno5").html(res.msg);
						$(".cok5").hide();
					}
				}
			});
		}
	}
    </script>
    
    <form id="v_form_6">
    <input type="hidden" name="txtID" id="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">GUEST REGISTRATION</div>
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
			 $gue = json_decode($villa_form['guest'],true);
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
           <!-- <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>-->
           
        </div>
        
    </form>
    
    <form id="v_form_7a">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">FOOD AND BEVERAGES</div>
            
            <div class="col-md-12 nopad top15">

				<div class="vf_title_sub">
					<div class="col-md-2 nopad ">Menu Link</div>
                   <?php $dis_pl = ($villa_form['tx_food_link']!='')?'':'disabled';?>
                    <div class="col-md-8 nopad "><a  href="<?php echo $villa_form['tx_food_link'];?>" target="_blank" ><button type="button" <?php echo $dis_pl;?> class="btn btn-info"><i class="fa fa-cutlery" aria-hidden="true"></i>
 View</button>	</a></div>
					
				</div>
				<p class="top15 vf_title_sub"></p>
			</div>
            
            
            <?php /*?><div class="vf_title_sub box_food top15">
                <?php 
				$ar_food = json_decode($villa_form['food'],true);
				if(count($ar_food)>0)
				{
					foreach($ar_food as $food)
					{
						echo '<div>- '.$food['tx_food'].'</div>';
					}
				}
				?>
            </div><?php */?><br>
            <!--<p class="top15">Food and beverage requests are required at least 72 hours prior to your arrival. The items will be purchased at cost plus a 20% procurement charge.</p>-->
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
            
            <div class="col-md-12 nopad ">
                <div class="nopad vf_title_sub col-md-12 dinn">
                	<?php
					$din = json_decode($villa_form['dinner'],true);
					$a=0;
					foreach($din as $dinner)
					{
						$a++;
						echo '<div class="row nomarlr top10">';
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
            <!--<p class="top15 vf_title_sub"></p><br><br><br>-->
        </div>
        
    </form>
    
    <?php $a_comp =  json_decode($villa_form['complimentary'],true);?>
    <div class="col-md-12 nopad top15 <?php echo ($a_comp['display']=='on')?'':'hidden';?>"><br>
        <div class="vf_title_sub vt_undl">Complimentary Food & Beverages</div>
    </div>
    <div class="vf_title_sub <?php echo ($a_comp['display']=='on')?'':'hidden';?>">
    	<div class="col-md-12 nopad top20">	<?php $cfb =  $a_comp['complimentary']; echo ($cfb!='')?$cfb:'-';?></div>
    </div>
    <br>
    
    <?php $breakfast = json_decode($villa_form['breakfast'],true);?>
    <form id="v_form_7b">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">B. FIRST BREAKFAST</div>
                <p class="top15 vf_title_sub">
                <a href="<?php echo $breakfast['link'];?>" target="_blank"><button type="button" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Link</button></a>
                <a href="<?php echo $breakfast['filename'];?>" target="_blank"><button type="button" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i> File/Photo</button></a></p>
                <p class="top15 vf_title_sub"></p>
        </div>
        
            <div class="vf_title_sub">
            
            	<div class="b_food">
                	<?php 
					if(count($breakfast['food'])>0)
					{
						foreach($breakfast['food'] as $b_food)
						{
							echo '- '.$b_food.'<br>';
						}
					}
					?>
                </div>
            <?php /*?><div class="col-md-12 nopad top20"><?php echo ($breakfast['breakfast']!='')?$breakfast['breakfast']:'-';?><!--<textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" style="width:100%" readonly><?php echo $villa_form['breakfast'];?></textarea>--></div><?php */?>
            <p>
            <span class="icon">
            	<i class="fa fa-check cok cok7b" aria-hidden="true"></i> <span class="tok tok7b"></span>
                <i class="fa fa-check cno cno7b" aria-hidden="true"></i> <span class="tno tno7b"></span>
            </span>
            	</p>
            </div>
        </div>
    </form>
    
    
    <?php $f7c = json_decode($villa_form['provisioning'],true); ?>
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
                            <?php $show_wll = ($f7c['wine_list_link']!='')?'block':'none';?>
                            <tr>
                                <td>Wine List Choices
                                <a href="<?php echo $f7c['wine_list_link'];?>" target="_blank" style="display:<?php echo $show_wll;?>">
                                <button type="button" class="btn btn-info pull-left" ><i class="fa fa-glass" aria-hidden="true"></i> View Lists</button>
                                </a>
                                </td>
                                <td>
                                 <?php 
									foreach($f7c['wine_list'] as $wine)
									{
										$wl = $dbc->GetRecord("wine_list","*","id = '".$wine."'");	
										if(in_array($wl['id'],$f7c_vfm['wine_list']))
										{
											?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
                                            </label>
                                        </div>
                                        <?php
										}
										else
										{
											?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
                                            </label>
                                        </div>
                                        <?php
										}
									}
								?>
                                
                                </td>
                            </tr>
                            <!--<tr>
                                <td>Wine List</td>
                                <td><?php echo $f7c['wine'];?></td>
                            </tr>-->
                        </tbody>
                    </table>
                    File Wine List : <a href="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'#';?>" target="_blank"> <?php echo ($f7c['filename']!='')?$f7c['filename']:'';?></a>
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
        
           <?php /*?> <div class="vf_title_sub">
            <div class="col-md-12 nopad "><?php echo ($villa_form['dietary']!='')?$villa_form['dietary']:'-';?><!--<textarea name="tx_special" id="tx_special" cols="30" rows="5" style="width:100%" readonly><?php echo $villa_form['dietary'];?></textarea>--></div>
            <p>
            	<span class="icon">
                    <i class="fa fa-check cok cok7d" aria-hidden="true"></i> <span class="tok tok7d"></span>
                    <i class="fa fa-check cno cno7d" aria-hidden="true"></i> <span class="tno tno7d"></span>
                </span>
            </p>
            </div><?php */?>
            
        </div>
    </form>
    
    
    <form id="v_form_8">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15"><br>
        	
        	<div class="vf_title vt_undl">PAYMENT ON ARRIVAL</div>
            <p class="top15">Any expense made at the villa is only payable in cash</p>
        </div>
        
        <?php $deposit =  json_decode($villa_form['deposit'],true);?>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">A. SECURITY DEPOSIT </div>
            <p class="top15 vf_title_sub">The refundable security deposit <?php echo ($deposit['deposit']!='')?$deposit['deposit']:'-';?><!--<input class="" type="text" name="tx_deposit" id="tx_deposit" readonly placeholder="of US$1500 " value="<?php echo $villa_form['deposit'];?>">--> <!--<button type="button" class="btn btn-primary " onClick="save_deposit();"> Save</button>-->
<!--            <span class="icon">
                    <i class="fa fa-check cok cok8" aria-hidden="true"></i> <span class="tok tok8"></span>
                    <i class="fa fa-check cno cno8" aria-hidden="true"></i> <span class="tno tno8"></span>
                </span>
-->                 in any major currency will be collected cash upon arrival or credit card authorization.<br>
            Damage security deposit <?php echo $deposit['damage_deposit'];?></p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">B. PAYMENT ON ARRIVAL</div>
            <p class="top15 vf_title_sub"><?php echo ($villa_form['payment_on_arrival']!='')?$villa_form['payment_on_arrival']:'-';?></p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">C. REIMBURSEMENT</div>
            <p class="top15 vf_title_sub">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers.  </p>
        </div>
    </form>
    
    
    <?php $f9 = json_decode($villa_form['service'],true);?>
    <form id="v_form_9">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	
        	<div class="vf_title vt_undl">CONCEIRGE SERVICES</div>
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
                        <td style="width:30%;">Yacht Charters</td>
                        <td><?php echo ($f9['Yacht']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Yacht'];?></td>
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
            <div class="col-md-12 nopad ">Comment : <?php echo ($villa_form['Comment']!='')?$villa_form['Comment']:'-';?><!--<textarea name="tx_Comment" id="tx_Comment" cols="30" rows="5" style="width:100%" placeholder="Comment" readonly><?php echo $f9['Comment'];?></textarea>--></div>
        </div>
        <p>
        <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
        </p>
    </form>
    
    
    <div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">GRATUITIES</div>
        <p class="top15">Gratuities are not mandatory but a customary gesture to award the staff for their kind hospitality and flexibility. The method of payment is cash for tips on-site.</p>
        <p class="top15">I look forward to receiving the above information and welcoming you to Talay Naiharn Villa. Please do not hesitate to contact us if you have questions or requests.</p>
    </div>
    
    <div class="col-md-12 nopad top30">
        <p class="top15">Kind regards,</p>
        <p class="top15"><strong>Your Inspiring Villas Team!</strong></p>
    </div>
    
    
    
    
    </div><!--end row-->
</div>

<br><br><br>
















