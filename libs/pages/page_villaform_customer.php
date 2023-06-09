<meta name="robots" content="noindex">
<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;
$dear_show = 0;
$bg = '#E5E5E5';
if(isset($_SESSION['auth']['user_id']))
{
	$bg = '#fff4e4';
	$dear_show = 1;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	?>
    <div class="container-fluid nopad top50" style="position:fixed; width:100%; z-index:10;">
        <div class="col-12 nopad text-center">
            <!--<button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>-->
            <?php /*?><div class="col-md-6 nopad"><button type="button" class="btn btn-primary btn_back btn-sm btn-block" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></div><?php */?>
            <div class="col-md-12 nopad"><button class="btn btn-warning btn-md btn-block">Edit Form Customer Name <?php echo $form['cus_name'];?></button></div>
            
        </div>
    </div>
    <!--<div class="container top50"><br><br>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
            <input type="text" class="tx_my_link" value="<?php echo $actual_link;?>">
            <button type="button" class="btn btn-success " onClick="copylink()"><i class="fa  fa-clipboard" aria-hidden="true"></i> Copy Link</button>
        </div>
    </div>-->
    
    <!--<button type="button" class="btn btn-success btn_back" onClick="view_form()"><i class="fa fa-search" aria-hidden="true"></i> View</button>-->
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaform-<?php echo $_REQUEST['id'];?>.html';
	}
	
	function copylink()
	{
		$(".tx_my_link").select();
		document.execCommand("copy");
	}
	</script>
	<?php
}
else
{
	$dear_show = 0;
	$bg = '#E5E5E5';
}
?>


<style>
.form-control {
    border-radius: 1px;
    margin-bottom: 20px;
    border-color: #ced4d7;
    padding: 5px 8px !important;
    height: auto;
    box-shadow: none;
    color: #4b565b;
}
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
	background: <?php echo $bg;?>;
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
	
	if($dbc->HasRecord("villa_form_mapping","links = '".$id."'"))
	{
		$form = $dbc->GetRecord("villa_form_mapping","*","links = '".$id."'");
		$form_id = $form['id'];
		
		$villa_form = $dbc->GetRecord("villa_form","*","id = '".$form['villaform_id']."'");
			
		$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
		$vil_name = explode("|",$data['name']);
		
		
		
	}
	else
	{
		$villa_form = '';
		$data = '';
		$vil_name = '';
		$form = '';
		$form_id = '';
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

<!--<div class="container back_form">
<form id="v_form_0">
<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    <div class="col-md-12 nopad ">
        <div class="vf_titlea">
            <strong>Customer :</strong> <?php echo $form['cus_name'];?> / 
            <strong>Travel date :</strong>  <?php echo $form['arrive'];?> - <?php echo $form['arrive_to'];?>
           
        </div>
    </div>
    
</form>
</div>-->
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
</script>
    

<div class="container back_form">
	<div class="col-12 nopad">
    	<img src="../../upload/v_form1.png" width="100%">
    </div>
	<div class="rows">
    
    
    <form id="v_form_1">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	<div class="vf_title">Dear 
            <?php if($dear_show == 1)
			{
				?><input type="text" name="tx_dear" id="tx_dear" value="<?php echo $form['dear_name'];?>">,<button type="button" class="btn btn-primary " onClick="save_dear();"> Save</button><?php
			}
			else
			{
				?><?php echo $form['dear_name'];?>,<?php
			}
			?>
            
        	
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
            <dt class="col-sm-2- text-right">Location</dt> <dd class="col-sm-10-"><?php echo $inf['location'];?></dd>
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
            	<!--<p style="white-space:pre-warp"><?php echo nl2br($booking['booking_inclusions']);?></p>-->
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
				?>
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
    <div class="col-md-12 nopad top15 " style="display:<?php echo $os_status_vi;?>">
        <div class="vf_title vt_undl">ONSITE CONTACT</div>
        <?php 
			$os_status = ($villa_form['onsite_status']==1)?$villa_form['onsite_con']:'-';
		?> 
        <p class="top15"><?php echo $os_status;?></p>
    </div>
    
    <!--<div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">ONSITE CONTACT</div>
         <?php 
			$os_status = ($villa_form['onsite_status']==1)?$villa_form['onsite_con']:'-';
		?> 
        <p class="top15"><?php echo $os_status;?></p>
    </div>-->
    
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

<?php /*?>    <form id="v_form_11">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">  
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">1) BOOKING DETAILS  </div>
            <?php $inf = json_decode($villa_form['informations'],true);?>
            <dl class="rows top15 dl-horizontal">
              <dt class="col-sm-2- text-right">Villa Name</dt> <dd class="col-sm-10-"><strong><?php echo $vil_name[0];?></strong></dd>
              <dt class="col-sm-2- text-right">Address</dt> <dd class="col-sm-10-"><textarea name="tx_in_address" id="tx_in_address" style="width:100%;" placeholder="24/27, Soi Naya, Tambon Rawai, Amphoe Mueang Phuket, Chang Wat Phuket 83100"><?php echo $inf['address'];?></textarea></dd>
              <dt class="col-sm-2- text-right">Location</dt> <dd class="col-sm-10-"><input type="text" name="tx_in_location" id="tx_in_location" placeholder="Naiharn Beach, Phuket"  style="width:100%;" value="<?php echo $inf['location'];?>"></dd>
              <dt class="col-sm-2- text-right">Telephone</dt> <dd class="col-sm-10-"><input type="text" name="tx_in_phone" id="tx_in_phone" placeholder="+66 (0) 84 677 1551"  style="width:100%;" value="<?php echo $inf['phone'];?>"></dd>
              <dt class="col-sm-2- text-right">Instagram</dt> <dd class="col-sm-10-">#InspiringVillas </dd>
              <dt class="col-sm-2- text-right"></dt> 
              
              <dd class="col-sm-10-">
              	<button type="button" class="btn btn-primary " onClick="save_information();"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok01" aria-hidden="true"></i> <span class="tok tok01"></span>
                    <i class="fa fa-check cno cno01" aria-hidden="true"></i> <span class="tno tno01"></span>
                </span>
              </dd>
            </dl>
        </div>
     </form>     
     <script>
    function save_information()
	{
		if($("#tx_in_address").val()=='')
		{
			alert_text("#tx_in_address");
		}
		else if($("#tx_in_location").val()=='')
		{
			alert_text("#tx_in_location");
		}
		else if($("#tx_in_phone").val()=='')
		{
			alert_text("#tx_in_phone");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_information.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_11").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok01").fadeIn(300);
						$(".cno01,.tno01").hide();
					}
					else
					{
						$(".cno01,.tno01").fadeIn(300);
						$(".tno01").html(res.msg);
						$(".cok01").hide();
					}
				}
			});
		}
	}
    </script>
<?php */?>    
    
<?php /*?>    <form id="v_form_2">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">     
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">2) SERVICE HOURS</div>
            <p class="top15"><input type="text" name="tx_ser_hour" id="tx_ser_hour" placeholder="The service hours at the villa are from 07:00 – 22:00."  style="width:100%;" value="<?php echo $villa_form['services'];?>"></p>
                <button type="button" class="btn btn-primary " onClick="save_services();"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok02" aria-hidden="true"></i> <span class="tok tok02"></span>
                    <i class="fa fa-check cno cno02" aria-hidden="true"></i> <span class="tno tno02"></span>
                </span>
        </div>
    </form>
    <script>
    function save_services()
	{
		if($("#tx_in_address").val()=='')
		{
			alert_text("#tx_in_address");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_services.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_2").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok02").fadeIn(300);
						$(".cno02,.tno02").hide();
					}
					else
					{
						$(".cno02,.tno02").fadeIn(300);
						$(".tno02").html(res.msg);
						$(".cok02").hide();
					}
				}
			});
		}
	}
    </script>
    
    <form id="v_form_3">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">      
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">3) ONSITE CONTACT</div>
            <p class="top15"><input type="text" name="tx_onsite" id="tx_onsite" placeholder="Villa Manager:	Ms. Kaew +66 97 002 9208"  style="width:100%;" value="<?php echo $villa_form['onsite_con'];?>"></p>
            	<button type="button" class="btn btn-primary " onClick="save_onsite();"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok03" aria-hidden="true"></i> <span class="tok tok03"></span>
                    <i class="fa fa-check cno cno03" aria-hidden="true"></i> <span class="tno tno03"></span>
                </span>
        </div>
    </form>
    <script>
    function save_onsite()
	{
		if($("#tx_onsite").val()=='')
		{
			alert_text("#tx_onsite");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_onsite.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_3").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok03").fadeIn(300);
						$(".cno03,.tno03").hide();
					}
					else
					{
						$(".cno03,.tno03").fadeIn(300);
						$(".tno03").html(res.msg);
						$(".cok03").hide();
					}
				}
			});
		}
	}
    </script>
<?php */?>    
    
    
    
    
    
    
    <br><br>
    <form id="v_form_4">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">    
        <div class="col-md-12 nopad top15">
        
        
        <div class="grids">
        
        	<div class="col-md-12 r_arrival">
            <div class=""><button type="button" class="btn btn-success " onClick="add_arrival_4();"><i class="fa fa-plus" aria-hidden="true"></i> Arrival</button></div>
            
                <?php 
				 $air = json_decode($form['airport_transfer'],true);
				 if(count($air['arrival'])>0)
				 {
					 $xx=0;
					 foreach($air['arrival'] as $at)
					 {
						 $xx++;
						 ?>
						 <div class="alert alert-success col-md-12 arrival" role="alert">
                        
                            <h2>
                            <button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> 
                            Transfers Arrival <span class="badge badge-info"><?php echo $xx;?></span>
                            </h2>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sign Name">Sign Name</label>
                                    <input type="text" class="form-control" id="tx_sname_a" name="tx_sname_a" value="<?php echo $at['tx_sname_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Sign Name">Date</label>
                                    <input type="date" class="form-control" id="tx_date_a" name="tx_date_a" value="<?php echo $at['tx_date_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sign Name">Airport/Hotel</label>
                                    <input type="text" class="form-control" id="tx_airline_a" name="tx_airline_a" value="<?php echo $at['tx_airline_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Sign Name">Flight number</label>
                                    <input type="text" class="form-control" id="tx_flight_a" name="tx_flight_a" value="<?php echo $at['tx_flight_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Sign Name">Time</label>
                                    <input type="text" class="form-control" id="tx_time_a" name="tx_time_a" value="<?php echo $at['tx_time_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Sign Name">No. of Adults/Kids</label>
                                    <input type="text" class="form-control" id="tx_pass_a" name="tx_pass_a" value="<?php echo $at['tx_pass_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sign Name">Transfer Arrangement Yes or No</label>
                                    <input type="text" class="form-control" id="tx_transfer_a" name="tx_transfer_a" value="<?php echo $at['tx_transfer_a'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sign Name">Contact number and Special Request </label>
                                    <input type="text" class="form-control inp" id="tx_Contact_a" name="tx_Contact_a" value="<?php echo $at['tx_Contact_a'];?>">
                                </div>
                            </div>
                            
                        </div>
					<?php
					 }
				}
				 ?>
            </div>
            
            
            <div class="col-md-12 r_departure">
                
                <div class=""><button type="button" class="btn btn-success " onClick="add_dpt_4();"><i class="fa fa-plus" aria-hidden="true"></i> Departure</button></div>
                <?php
				 if(count($air['departure'])>0)
				 {
					 $yy=0;
					 foreach($air['departure'] as $at)
					 {
						 $yy++;
						 ?>
                            <div class="alert alert-warning col-md-12 departure" role="alert">
                            
                                <h2><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> Transfers Departure <span class="badge badge-warning"><?php echo $yy;?></span></h2>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Sign Name">Sign Name</label>
                                        <input type="text" class="form-control" id="tx_sname_d" name="tx_sname_d" value="<?php echo $at['tx_sname_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Sign Name">Date</label>
                                        <input type="date" class="form-control" id="tx_date_d" name="tx_date_d" value="<?php echo $at['tx_date_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Sign Name">Airport/Hotel</label>
                                        <input type="text" class="form-control" id="tx_airline_d" name="tx_airline_d" value="<?php echo $at['tx_airline_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Sign Name">Flight number</label>
                                        <input type="text" class="form-control" id="tx_flight_d" name="tx_flight_d" value="<?php echo $at['tx_flight_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Sign Name">Time</label>
                                        <input type="text" class="form-control" id="tx_time_d" name="tx_time_d" value="<?php echo $at['tx_time_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Sign Name">No. of Adults/Kids</label>
                                        <input type="text" class="form-control" id="tx_pass_d" name="tx_pass_d" value="<?php echo $at['tx_pass_d'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Sign Name">Transfer Arrangement Yes or No</label>
                                        <input type="text" class="form-control" id="tx_transfer_d" name="tx_transfer_d" value="<?php echo $at['tx_transfer_d'];?>">
                                    </div>
                                </div>
                                
                            </div>
                     <?php
					 }
				 }
				 ?>
            </div>
        </div>
        <?php $a_xx = ($xx<=0)?1:$xx; $a_yy = ($yy<=0)?1:$yy;?>
        <input type="hidden" class="txarv" value="<?php echo $a_xx;?>">
        <input type="hidden" class="txdpt" value="<?php echo $a_yy;?>">
        
        
        <div class="">
        <button type="button" class="btn btn-primary " onClick="save_airport();"> Save</button> 
        <span class="icon">
            <i class="fa fa-check cok cok4" aria-hidden="true"></i> <span class="tok tok4"></span>
            <i class="fa fa-check cno cno4" aria-hidden="true"></i> <span class="tno tno4"></span>
        </span>
        <!--<button type="button" class="btn btn-success " onClick="add_table_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
        <!--<button type="button" class="btn btn-success " onClick="add_arrival_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
        </div>
        
        
        	<!--<table id="tb_4" width="100%%" border="1" class="table table-striped">
             <thead>
                <tr>
                  <th>Transfers</th>
                  <th>Sign Name</th>
                  <th>Date</th>
                  <th>Airport/Hotel</th>
                  <th>Flight number</th>
                  <th>Time</th>
                  <th>No. of Adults/Kids</th>
                  <th>Transfer Arrangement<br>Yes or No</th>
                  <th>#</th>
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
						echo '<td  style="width: 140px;"><div class="col-md-12 nopad">Arrival</div><div class="col-md-12 nopad top20">Departure</div></td>';
						echo '<td >
						<div class="col-md-12 nopad"><input class="inp" type="text" name="tx_sname" id="tx_sname" value="'.$at['tx_sname'].'"></div>
						<div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_date_d" id="tx_date_d" value="'.$at['tx_sname'].'" placeholder="Contact number and Special Reques"></div>
						</td>';
						
						echo '<td >
						<div class="col-md-12 nopad"><input class="inp" type="date" name="tx_date_a" id="tx_date_a" value="'.$at['tx_date_a'].'"></div>
						<div class="col-md-12 nopad top10"><input class="inp" type="date" name="tx_date_d" id="tx_date_d" value="'.$at['tx_date_d'].'"></div>
						</td>';
						
						
						
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a" value="'.$at['tx_airline_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d" value="'.$at['tx_airline_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a" value="'.$at['tx_flight_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d" value="'.$at['tx_flight_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a" value="'.$at['tx_time_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d" value="'.$at['tx_time_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a" value="'.$at['tx_pass_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d" value="'.$at['tx_pass_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a" value="'.$at['tx_transfer_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d" value="'.$at['tx_transfer_d'].'"></div></td>';
						echo '<td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
					echo '</tr>';
				 }
			 }
			 else
			 {
				 ?>
                    <tr>
                      <td style="width: 140px;"><div class="col-md-12 nopad">Arrival</div><div class="col-md-12 nopad top20">Departure</div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="date" name="tx_date_a" id="tx_date_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="date" name="tx_date_d" id="tx_date_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_sname" id="tx_sname"></div><div class="col-md-12 nopad top10"><input class="inp" type="date" name="tx_date_d" id="tx_date_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d"></div></td>
                      <td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table>-->
            <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
            <p>
                <strong>Special Request </strong><br><textarea name="tx_spcrq" id="tx_spcrq" cols="30" rows="5" style="width:100%;"><?php echo json_decode($form['special_request']);?></textarea>
                <button type="button" class="btn btn-primary " onClick="save_special_request();"> Save</button> 
                <span class="icon">
                    <i class="fa fa-check cok cok4_1" aria-hidden="true"></i> <span class="tok tok4_1"></span>
                    <i class="fa fa-check cno cno4_1" aria-hidden="true"></i> <span class="tno tno4_1"></span>
                </span>
            </p>
        </div>
    </form>
    
    <script>
	function add_arrival_4()
	{
		var vnext = parseInt($(".txarv").val())+1;
		$(".txarv").val(vnext);
		var s='';
				s+= '<div class="alert alert-success col-md-12 arrival" role="alert">';
                
                    s+= '<h2><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> Transfers Arrival <span class="badge badge-info">'+vnext+'</span></h2>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Sign Name</label>';
                            s+= '<input type="text" class="form-control" id="tx_sname_a" name="tx_sname_a">';
                        s+= '</div>';
                    s+=  '</div>';
                    s+=  '<div class="col-md-2">';
                        s+=  '<div class="form-group">';
                            s+=  '<label for="Sign Name">Date</label>';
                            s+= '<input type="date" class="form-control" id="tx_date_a" name="tx_date_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Airport/Hotel</label>';
                            s+= '<input type="text" class="form-control" id="tx_airline_a" name="tx_airline_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Flight number</label>';
                            s+= '<input type="text" class="form-control" id="tx_flight_a" name="tx_flight_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Time</label>';
                            s+= '<input type="text" class="form-control" id="tx_time_a" name="tx_time_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">No. of Adults/Kids</label>';
                           s+= '<input type="text" class="form-control" id="tx_pass_a" name="tx_pass_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Transfer Arrangement Yes or No</label>';
                            s+= '<input type="text" class="form-control" id="tx_transfer_a" name="tx_transfer_a">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Contact number and Special Request </label>';
                            s+= '<input type="text" class="form-control inp" id="tx_transfer_a" name="tx_transfer_a">';
                        s+= '</div>';
                    s+= '</div>';
                    
                s+= '</div>';
		$(".r_arrival").append(s);
	}
	
	function add_dpt_4()
	{
		var vnext = parseInt($(".txdpt").val())+1;
		$(".txdpt").val(vnext);
		var s='';
				s+= '<div class="alert alert-warning col-md-12 departure" role="alert">';
                
                    s+= '<h2><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> Transfers Departure <span class="badge badge-info">'+vnext+'</span></h2>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Sign Name</label>';
                            s+= '<input type="text" class="form-control" id="tx_sname_d" name="tx_sname_d">';
                        s+= '</div>';
                    s+=  '</div>';
                    s+=  '<div class="col-md-2">';
                        s+=  '<div class="form-group">';
                            s+=  '<label for="Sign Name">Date</label>';
                            s+= '<input type="date" class="form-control" id="tx_date_d" name="tx_date_d">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Airport/Hotel</label>';
                            s+= '<input type="text" class="form-control" id="tx_airline_d" name="tx_airline_d">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Flight number</label>';
                            s+= '<input type="text" class="form-control" id="tx_flight_d" name="tx_flight_d">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Time</label>';
                            s+= '<input type="text" class="form-control" id="tx_time_d" name="tx_time_d">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">No. of Adults/Kids</label>';
                           s+= '<input type="text" class="form-control" id="tx_pass_d" name="tx_pass_d">';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Transfer Arrangement Yes or No</label>';
                            s+= '<input type="text" class="form-control" id="tx_transfer_d" name="tx_transfer_d">';
                        s+= '</div>';
                    s+= '</div>';
                    /*s+= '<div class="col-md-4">';
                        s+= '<div class="form-group">';
                            s+= '<label for="Sign Name">Contact number and Special Request </label>';
                            s+= '<input type="text" class="form-control inp" id="tx_transfer_d" name="tx_transfer_d">';
                        s+= '</div>';
                    s+= '</div>';*/
                    
                s+= '</div>';
		$(".r_departure").append(s);
	}
	
	function save_special_request()
	{
		var data = {
			txtID : $("#txtID").val(),
			tx_spcrq : $("#tx_spcrq").val(),
		};
					
		$.ajax({
			url:"libs/action_form/save_special_request.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok4_1").fadeIn(300);
					$(".cno4_1,.tno4_1").hide();
				}
				else
				{
					$(".cno4_1,.tno4_1").fadeIn(300);
					$(".tno4_1").html(res.msg);
					$(".cok4_1").hide();
				}
			}
		});
	}
	
	function save_airport()
	{
		var data = {
			txtID : $("#txtID").val(),
			arrival : [],
			departure : []
		};
		
		$(".r_arrival ").children('.arrival').each(function(index, element) {
			data.arrival.push({
					tx_sname_a : $(this).find("input[name=tx_sname_a]").val(),
					tx_date_a : $(this).find("input[name=tx_date_a]").val(),
					tx_airline_a : $(this).find("input[name=tx_airline_a]").val(),
					tx_flight_a : $(this).find("input[name=tx_flight_a]").val(),
					tx_time_a : $(this).find("input[name=tx_time_a]").val(),
					tx_pass_a : $(this).find("input[name=tx_pass_a]").val(),
					tx_transfer_a : $(this).find("input[name=tx_transfer_a]").val(),
					tx_Contact_a : $(this).find("input[name=tx_Contact_a]").val(),
				});
		});
		
		$(".r_departure").children('.departure').each(function(index, element) {
			data.departure.push({
					tx_sname_d : $(this).find("input[name=tx_sname_d]").val(),
					tx_date_d : $(this).find("input[name=tx_date_d]").val(),
					tx_airline_d : $(this).find("input[name=tx_airline_d]").val(),
					tx_flight_d : $(this).find("input[name=tx_flight_d]").val(),
					tx_time_d : $(this).find("input[name=tx_time_d]").val(),
					tx_pass_d : $(this).find("input[name=tx_pass_d]").val(),
					tx_transfer_d : $(this).find("input[name=tx_transfer_d]").val(),
				});
		});
					
		$.ajax({
			url:"libs/action_form/save_airport.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok4").fadeIn(300);
					$(".cno4,.tno4").hide();
				}
				else
				{
					$(".cno4,.tno4").fadeIn(300);
					$(".tno4").html(res.msg);
					$(".cok4").hide();
				}
			}
		});
	}
	
    function add_table_4()
	{
		var s='';
			s+= '<tr>';
			  s+= '<td  style="width: 140px;"><div class="col-md-12 nopad">Arrival</div><div class="col-md-12 nopad top20">Departure</div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="date" name="tx_date_a" id="tx_date_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="date" name="tx_date_d" id="tx_date_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d"></div></td>';
			  s+= '<td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
			s+= '</tr>';
		$("#tb_4").children('tbody').append(s);
	}
    </script>
    
    
    <?php /*?><form id="v_form_5">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">5) TELEPHONE NUMBER</div>
            <p class="top15">The mobile number you will have arriving the villa in Phuket</p>
            
            <div class="col-md-12 nopad "><input type="tel" name="tx_phone" id="tx_phone" readonly style="width:100%" value="<?php echo $villa_form['phone'];?>"></div>
            <br><p><br>
            	<!--<button type="button" class="btn btn-primary " onClick="save_phone()"> Save</button>	-->
            	<span class="icon">
                    <i class="fa fa-check cok cok5" aria-hidden="true"></i> <span class="tok tok5"></span>
                    <i class="fa fa-check cno cno5" aria-hidden="true"></i> <span class="tno tno5"></span>
                </span></div>
            </p>
        </div>
        
    </form><?php */?>
    
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
        <button type="button" class="btn btn-primary " onClick="save_guest();"> Save</button> 
        <span class="icon">
            <i class="fa fa-check cok cok6" aria-hidden="true"></i> <span class="tok tok6"></span>
            <i class="fa fa-check cno cno6" aria-hidden="true"></i> <span class="tno tno6"></span>
        </span>
        <button type="button" class="btn btn-success " onClick="add_guest()"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
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
                  <th>#</th>
                </tr>
             </thead>
             <tbody>
             <?php 
			 $gue = json_decode($form['guest'],true);
			 if(count($gue)>0)
			 {
				 $a=0;
				 foreach($gue as $guest)
				 {
					 $a++;
					echo '<tr>';
						echo '<td>'.$a.'</td>';
						echo '<td><input class="inp" type="text" name="tx_first" id="tx_first" value="'.$guest['tx_first'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_passport" id="tx_passport" value="'.$guest['tx_passport'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_city" id="tx_city" value="'.$guest['tx_city'].'"></td>';
						echo '<td><input class="inp" type="date" name="tx_date" id="tx_date" value="'.$guest['tx_date'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_nationality" id="tx_nationality" value="'.$guest['tx_nationality'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_room" id="tx_room" value="'.$guest['tx_room'].'"></td>';
						echo '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
					echo '</tr>';
				 }
			 }
			 else
			 {
				 ?>
                    <tr>
                        <td>1</td>
                        <td><input class="inp" type="text" name="tx_first" id="tx_first"></td>
                        <td><input class="inp" type="text" name="tx_passport" id="tx_passport"></td>
                        <td><input class="inp" type="text" name="tx_city" id="tx_city"></td>
                        <td><input class="inp" type="date" name="tx_date" id="tx_date"></td>
                        <td><input class="inp" type="text" name="tx_nationality" id="tx_nationality"></td>
                        <td><input class="inp" type="text" name="tx_room" id="tx_room"></td>
                        <td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table>
            <p>
                <strong>Bed Configurations </strong><br><textarea name="tx_bconf" id="tx_bconf" cols="30" rows="5" style="width:100%;"><?php echo $form['bed_configuration'];?></textarea>
                <button type="button" class="btn btn-primary " onClick="save_tx_bconf();"> Save</button> 
                <span class="icon">
                    <i class="fa fa-check cok cok6_1" aria-hidden="true"></i> <span class="tok tok6_1"></span>
                    <i class="fa fa-check cno cno6_1" aria-hidden="true"></i> <span class="tno tno6_1"></span>
                </span>
            </p>
            <!--<p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>-->
        </div>
        
    </form>
    <?php $aaa = ($a!=0)?$a:1;?>
    <input class="inp1" type="hidden" value="<?php echo $aaa;?>">
    <script>
	function save_tx_bconf()
	{
		var data = {
			txtID : $("#txtID").val(),
			tx_bconf : $("#tx_bconf").val(),
		};
					
		$.ajax({
			url:"libs/action_form/save_bed_configuration.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok6_1").fadeIn(300);
					$(".cno6_1,.tno6_1").hide();
				}
				else
				{
					$(".cno6_1,.tno6_1").fadeIn(300);
					$(".tno6_1").html(res.msg);
					$(".cok6_1").hide();
				}
			}
		});
	}
	
	function save_guest()
	{
		var data = {
			txtID : $("#txtID").val(),
			val : []
		};
		
		$("#tb_guest tbody tr").each(function(index, element) {
			data.val.push({
					tx_first : $(this).find("input[name=tx_first]").val(),
					tx_passport : $(this).find("input[name=tx_passport]").val(),
					tx_city : $(this).find("input[name=tx_city]").val(),
					tx_date : $(this).find("input[name=tx_date]").val(),
					tx_nationality : $(this).find("input[name=tx_nationality]").val(),
					tx_room : $(this).find("input[name=tx_room]").val(),
				});
		});
					
		$.ajax({
			url:"libs/action_form/save_guest.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok6").fadeIn(300);
					$(".cno6,.tno6").hide();
				}
				else
				{
					$(".cno6,.tno6").fadeIn(300);
					$(".tno6").html(res.msg);
					$(".cok6").hide();
				}
			}
		});
	}
	
    function add_guest()
	{
		var no = parseInt($(".inp1").val());
		var next = no+1;
		var z = '';
			z+= '<tr>';
			  z+= '<td>'+next+'</td>';
			  z+= '<td><input class="inp" type="text" name="tx_first" id="tx_first"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_passport" id="tx_passport"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_city" id="tx_city"></td>';
			  z+= '<td><input class="inp" type="date" name="tx_date" id="tx_date"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_nationality" id="tx_nationality"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_room" id="tx_room"></td>';
			  z+= '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
			z+= '</tr>';
			
		$("#tb_guest").children("tbody").append(z);	
		$(".inp1").val(next);
	}
	function delme(me)
	{
		var no = parseInt($(".inp1").val());
		var next = no-1;
		$(me).parent().parent().remove();
		$(".inp1").val(next);
	}
    </script>
    
    
        <form id="v_form_7a">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">FOOD AND BEVERAGES</div><br>
            
            <div class="col-md-12 nopad top15">

				<div class="vf_title_sub">
					<div class="col-md-2 nopad ">Menu Link</div>
                    <?php $dis_pl = ($villa_form['tx_food_link']!='')?'':'disabled';?>
                    <div class="col-md-8 nopad "><a  href="<?php echo $villa_form['tx_food_link'];?>" target="_blank" ><button type="button" <?php echo $dis_pl;?> class="btn btn-info"><i class="fa fa-cutlery" aria-hidden="true"></i>
 View</button>	</a></div>
					
				</div>
				<p class="top15 vf_title_sub"></p>
			</div>
            
            <?php /*?><div class="vf_title_sub box_food">
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
            <p class="top15 vf_title_sub"></p><br><br><br>
        </div>
        <?php $a_comp =  json_decode($villa_form['complimentary'],true);?>
        <div class="col-md-12 nopad top15 <?php echo ($a_comp['display']=='on')?'':'hidden';?>">
        	<div class="vf_title_sub vt_undl">Complimentary Food & Beverages
            </div>
            <div class="vf_title_sub top15">- <?php echo $a_comp['complimentary'];?>
            </div>
        </div>
    </form>
    
    <?php 
	$breakfast = json_decode($villa_form['breakfast'],true);
	$breakfast_customer = json_decode($form['breakfast'],true); 
	$sprq = base64_decode($breakfast_customer['spacial_request']);
	$ar_bfood = array();
	foreach($breakfast_customer['food'] as $bf)
	{
		//$exp = explode("|",$bf);
		array_push($ar_bfood,$bf['name']);
	}
	//$ar_bfood = $breakfast_customer['food'];
	?>
    <form id="v_form_7b">
    <input type="hidden" id="tx_b_food_id" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">B. FIRST BREAKFAST</div>
                <p class="top15 vf_title_sub">
                <a href="<?php echo $breakfast['link'];?>" target="_blank" class="<?php echo ($breakfast['link']=='')?'hidden':'';?>"><button type="button" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Link</button></a>
                <a href="<?php echo $breakfast['filename'];?>" target="_blank" class="<?php echo ($breakfast['filename']=='')?'hidden':'';?>"><button type="button" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i> File/Photo</button></a></p>
        </div>
            <div class="vf_title_sub">
            	<div class="b_food">
                	<div class="col-md-6">	
                        <div class="alert alert-warning  col-md-12" role="alert">
                        <strong>Select from lists</strong>
                            <?php
							
                            if(count($breakfast['food'])>0)
                            {
                                $a=0;
                                foreach($breakfast['food'] as $b_food)
                                {
                                    if(in_array($b_food,$ar_bfood))
                                    {
                                        ?>
                                        <div class="col-md-12 top20">
                                            <div class="col-md-6 b_food_list">
                                                <input type="checkbox" class="chk_b_food" name="chk_b_food" checked onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="col-md-12 top20">
                                            <div class="col-md-6 b_food_list">
                                                <input type="checkbox" class="chk_b_food" name="chk_b_food"  onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="alert alert-success col-md-12" role="alert">
                            My lists
                            <div class="box_b_food">
                                <?php 
                                if(count($breakfast_customer['food'])>0)
                                {
                                    foreach($breakfast_customer['food'] as $list_b_food)
                                    {
                                        //echo $list_b_food['name'].$list_b_food['amount'];
                                        echo '<div class="col-md-12 sbbox top10">';
                                            echo '<div class="col-md-4 text-right">';
                                                echo $list_b_food['name'];
                                            echo '</div>';
                                            echo '<div class="col-md-8">';
                                                echo '<input type="hidden" class="chk_b_food '.$list_b_food['name'].'" name="chk_name_b_food" value="'.$list_b_food['name'].'" readonly>';
                                                echo '<input type="number" class="tx_b_food '.$list_b_food['name'].'" min="0" name="tx_amount_b_food" placeholder="Amount" value="'.$list_b_food['amount'].'" >';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
					
                </div>
                
            <div class="col-md-12 nopad top20">
                Special Request
                <textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" style="width:100%"><?php echo ($sprq!='')?$sprq:'-';?></textarea>
            </div>
            <p>
            <div class="col-md-12 nopad top20">
            	<button type="button" class="btn btn-primary " onClick="save_first_breakfast();" >Save</button>
            	<span class="icon">
            	<i class="fa fa-check cok cok7b_food" aria-hidden="true"></i> <span class="tok tok7b_food"></span>
                <i class="fa fa-check cno cno7b_food" aria-hidden="true"></i> <span class="tno tno7b_food"></span>
            </span>
            </div>
            
            	</p>
            </div>
        </div>
    </form>
    
    <script>
	function save_first_breakfast()
	{
		var sele = 0;
		var datas = {
			txtID : $("#tx_b_food_id").val(),
			tx_BREAKFAST : $("#tx_BREAKFAST").val(),
			b_food : []
		};
		
		$(".box_b_food .sbbox").each(function(index, element) {
			if($(this).find("input[name=tx_amount_b_food]").val()!='')
			{
				sele = 1;
				datas.b_food.push({
					name : $(this).find("input[name=chk_name_b_food]").val(),
					amount : $(this).find("input[name=tx_amount_b_food]").val(),
				});
			}
			else
			{
				alert("Please fill your Amount!");
				return false;
			}
        });
		
		//console.log(datas);
		/*if(sele==0)
		{
			alert("Please fill your data!");
		}
		else
		{*/
			$.ajax({
				url:"libs/action_form/save_breakfast_food_customer.php",
				type:"POST",
				dataType:"json",
				data:datas,
				success: function(res){
					if(res.status==true)
					{
						$(".cok7b_food").fadeIn(300);
						$(".cno7b_food,.tno7b_food").hide();
					}
					else
					{
						$(".cno7b_food,.tno7b_food").fadeIn(300);
						$(".tno7b_food").html(res.msg);
						$(".cok7b_food").hide();
					}
				}
			});
		/*}*/
		
	}
	
    function choose_b_food(me)
	{
		var z = '';
		if($(me).is(':checked'))
		{
			//$(me).parent().find('.tx_b_food').removeAttr('disabled');
			z += '<div class="col-md-12 sbbox top10">';
				z += '<div class="col-md-4 text-right">';
					z += $(me).val();
				z += '</div>';
				z += '<div class="col-md-8">';
					z += '<input type="hidden" class="chk_b_food '+$(me).val()+'" name="chk_name_b_food" value="'+$(me).val()+'" readonly>';
					z += '<input type="number" class="tx_b_food '+$(me).val()+'" name="tx_amount_b_food"  min="0" placeholder="Amount" >';
				z += '</div>';
			z += '</div>';
		}
		else
		{
			var posi = $(me).val();
			$('.'+posi).parent().parent().remove();
			//$(me).parent().find('.tx_b_food').val('');
		}
		$(".box_b_food").append(z);
	}
    </script>
    
    <?php $f7c = json_decode($villa_form['provisioning'],true);
	$f7c_vfm = json_decode($form['provisioning'],true); ?>
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
                                <td><?php echo ($f7c['wine']=='')?'Please select and attach back the provisional list with your requirements.':$f7c['provisioning'];?> &nbsp;<button type="button" class="btn btn-info" onClick="select_item('<?php echo $form_id;?>');"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Select items</button></td>
                            </tr>
                            <?php $show_wll = ($f7c['wine_list_link']!='')?'block':'none';?>
                            <tr>
                                <td>Wine List 
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
                    
                    <div class="col-md-12 nopad">
                    	Complimentary Food & Beverages
                    	<textarea name="tx_c_conf" id="tx_c_conf" cols="30" rows="5" style="width:100%;"><?php echo $f7c_vfm['complimentary'];?></textarea>
                    </div>
                    <div class="col-md-12 nopad">
                    	Special Request
                    	<textarea name="tx_c_Special" id="tx_c_Special" cols="30" rows="5" style="width:100%;"><?php echo $f7c_vfm['special'];?></textarea>
                    </div>
                    
                    
                </div>
                
                <p>
                <button type="button" class="btn btn-primary " onClick="save_wine_list();" >Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                    <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                </span>
                </p>
                <div class="col-md-12">File Wine List : <a href="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'#';?>" target="_blank"> <?php echo ($f7c['filename']!='')?$f7c['filename']:'';?></a></div>
            </div>
        </div>
    </form>
    
    <script>
	function save_wine_list()
	{
		$.ajax({
			url:"libs/action_form/save_wine_list.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7c").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7c").fadeIn(300);
					$(".cno7c,.tno7c").hide();
				}
				else
				{
					$(".cno7c,.tno7c").fadeIn(300);
					$(".tno7c").html(res.msg);
					$(".cok7c").hide();
				}
			}
		});
	}
	
    function select_item(fid)
	{
		window.open('/product-lists-'+fid+'-<?php echo str_replace(" ","",$vil_name[0]);?>-<?php echo str_replace(" ","",$form['cus_name']);?>.html','_blank');
	}
    </script>
    
    <form id="v_form_7d">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">D. SPECIAL DIETARY</div>
                <p class="top15 vf_title_sub">Please advise of any special dietary requirements i.e. vegetarian, vegan, food allergies, low sodium, etc.</p>
        </div>
        <?php $d_dietary = base64_decode($form['dietary']);?>
            <div class="vf_title_sub"><?php //echo ($villa_form['dietary']!='')?$villa_form['dietary']:'-';?>
            <div class="col-md-12 nopad "><textarea name="tx_special" id="tx_special" cols="30" rows="5" style="width:100%" ><?php echo ($d_dietary!='')?$d_dietary:'';?></textarea></div>
            <p><button type="button" class="btn btn-primary " onClick="save_cus_special();"> Save</button>	
            	<span class="icon">
                    <i class="fa fa-check cok cok7d" aria-hidden="true"></i> <span class="tok tok7d"></span>
                    <i class="fa fa-check cno cno7d" aria-hidden="true"></i> <span class="tno tno7d"></span>
                </span>
            </p>
            </div>
        </div>
    </form>
    <script>
    function save_cus_special()
	{
		$.ajax({
			url:"libs/action_form/save_special_cus.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7d").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7d").fadeIn(300);
					$(".cno7d,.tno7d").hide();
				}
				else
				{
					$(".cno7d,.tno7d").fadeIn(300);
					$(".tno7d").html(res.msg);
					$(".cok7d").hide();
				}
			}
		});
	}
    </script>
  
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
    
    <script>
    function save_deposit()
	{
		if($("#tx_deposit").val()=='')
		{
			alert_text("#tx_deposit");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_deposit.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_8").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok8").fadeIn(300);
						$(".cno8,.tno8").hide();
					}
					else
					{
						$(".cno8,.tno8").fadeIn(300);
						$(".tno8").html(res.msg);
						$(".cok8").hide();
					}
				}
			});
		}
	}
    </script>
    
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
            <?php $f9_cus = json_decode($form['service'],true);?>
            <div class="col-md-12 nopad ">
            <!--Comment <?php echo ($f9['Comment']!='')?$f9['Comment']:'-';?>-->
            <textarea name="tx_Comment" id="tx_Comment" cols="30" rows="5" style="width:100%" placeholder="Comment" ><?php echo $f9_cus['Comment'];?></textarea>
            </div>
        </div>
        <p><button type="button" class="btn btn-primary " onClick="save_service();"> Save</button>	
        <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
        </p>
    </form>
    <br>
    
    <div class="col-md-12 nopad top15"><br>
        <div class="vf_title vt_undl">GRATUITIES</div>
        <p class="top15">Gratuities are not mandatory but a customary gesture to award the staff for their kind hospitality and flexibility. The method of payment is cash for tips on-site.</p>
        <p class="top15">I look forward to receiving the above information and welcoming you to Talay Naiharn Villa. Please do not hesitate to contact us if you have questions or requests.</p>
    </div>
    
    <div class="col-md-12 nopad top30">
        <p class="top15">Kind regards,</p>
        <p class="top15"><strong>Your Inspiring Villas Team!</strong></p>
    </div>
    
    <script>
    function save_service()
	{
		if($("#tx_Comment").val()=='')
		{
			alert_text("#tx_Comment");
		}
		/*else if($("#tx_Restaurant").val()=='')
		{
			alert_text("#tx_Restaurant");
		}
		else if($("#tx_Massage").val()=='')
		{
			alert_text("#tx_Massage");
		}*-/
		else if($("#tx_Occasion").val()=='')
		{
			alert_text("#tx_Occasion");
		}
		else if($("#tx_Arrangements").val()=='')
		{
			alert_text("#tx_Arrangements");
		}
		else if($("#tx_Dietary").val()=='')
		{
			alert_text("#tx_Dietary");
		}*/
		else
		{
			$.ajax({
				url:"libs/action_form/save_service_cus.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_9").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok9").fadeIn(300);
						$(".cno9,.tno9").hide();
					}
					else
					{
						$(".cno9,.tno9").fadeIn(300);
						$(".tno9").html(res.msg);
						$(".cok9").hide();
					}
				}
			});
		}
	}
    </script>
    
    
    
    </div><!--end row--><br><br><br>
</div>


















