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
            <div class="col-md-6 nopad"><button type="button" class="btn btn-success btn_back btn-sm btn-block" onClick="view_form()"><i class="fa fa-search" aria-hidden="true"></i> Preview</button></div>
            <div class="col-md-6 nopad"><button class="btn btn-danger btn-sm btn-block"><?php echo $vil_name[0].'Template';?></button></div>
            
        </div>
    </div>
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaformadmin-<?php echo str_replace(" ","",$vil_name[0]).'-'.$_REQUEST['id'];?>.html';
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
    
    <form id="v_form_11">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">  
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">BOOKING DETAILS  </div>
            <?php 
			$inf = json_decode($villa_form['informations'],true);
			$booking = json_decode(base64_decode($inf['booking']),true);?>
            <dl class="rows top15 dl-horizontal">
              <dt class="col-sm-2- text-right">Villa Name</dt> <dd class="col-sm-10-"><strong><?php echo $vil_name[0];?></strong></dd>
              <dt class="col-sm-2- text-right">Address</dt> <dd class="col-sm-10-"><textarea name="tx_in_address" id="tx_in_address" style="width:100%;" placeholder="24/27, Soi Naya, Tambon Rawai, Amphoe Mueang Phuket, Chang Wat Phuket 83100"><?php echo $inf['address'];?></textarea></dd>
              <dt class="col-sm-2- text-right">Location</dt> <dd class="col-sm-10-"><input type="text" name="tx_in_location" id="tx_in_location" placeholder="Naiharn Beach, Phuket"  style="width:100%;" value="<?php echo $inf['location'];?>"></dd>
			  <dt class="col-sm-2- text-right">Google Map</dt> <dd class="col-sm-10-"><input type="text" name="tx_in_map" id="tx_in_map" placeholder="Link"  style="width:100%;" value="<?php echo $inf['map'];?>"></dd>
              <!--<dt class="col-sm-2- text-right">Telephone</dt> <dd class="col-sm-10-"><input type="text" name="tx_in_phone" id="tx_in_phone" placeholder="+66 (0) 84 677 1551"  style="width:100%;" value="<?php echo $inf['phone'];?>"></dd>
              <dt class="col-sm-2- text-right">Instagram</dt> <dd class="col-sm-10-">#InspiringVillas </dd>-->
              <dt class="col-sm-2- text-right"></dt> <br>
              
              <dt class="col-sm-2- text-right">Booking Details</dt> <dd class="col-sm-10-">
                  <textarea name="tx_bd" id="tx_bd" cols="30" rows="7" style="width:100%"><?php echo $booking['booking_details'];?></textarea>
              </dd>
              <dt class="col-sm-2- text-right">Booking Inclusions</dt> 
              <dd class="col-sm-10 nopad">
              		<button type="button" class="btn btn-primary" onClick="add_inclu();"><i class="fa fa-plus" aria-hidden="true"></i></button>
              		<div class="box_inclu">
                    <?php
					$inc = json_decode(base64_decode($inf['inclusions']),true);
					if(count($inc)>0)
					{
						foreach($inc as $inclus)
						{
							echo '<div class="inclu_inp top10">';
								echo '<div class="col-md-10 nopad"><input type="text" name="tx_inclusions[]" style="width:100%" value="'.$inclus.'"></div>';
								echo '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
							echo '</div>';
						}
					}
					?>
                    </div>
                   
                  
                  <!--<textarea name="tx_bi" id="tx_bi" cols="30" rows="7" style="width:100%"><?php echo $booking['booking_inclusions'];?></textarea>-->
              </dd> <br><br>
              <dt class="col-sm-2- text-right">Additional Charges</dt> 
              <dd class="col-sm-10 nopad">
                  <textarea name="tx_ac" id="tx_ac" cols="30" rows="7" style="width:100%"><?php echo $booking['additional_charges'];?></textarea>
              </dd>
              

              <dt class="col-sm-2- text-right">Note</dt> 
              <dd class="col-sm-10 nopad">
              		<button type="button" class="btn btn-primary" onClick="add_notes();"><i class="fa fa-plus" aria-hidden="true"></i></button>
              		<div class="box_notes">
                    <?php
					$notes = json_decode(base64_decode($inf['note']),true);
					if(count($notes)>0)
					{
						foreach($notes as $notess)
						{
							echo '<div class="inclu_inp top10">';
								echo '<div class="col-md-10 nopad"><input type="text" name="tx_notes[]" style="width:100%" value="'.$notess.'"></div>';
								echo '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
							echo '</div>';
						}
					}
					?>
                    </div>
                   
                  
                  <!--<textarea name="tx_bi" id="tx_bi" cols="30" rows="7" style="width:100%"><?php echo $booking['booking_inclusions'];?></textarea>-->
              </dd>
              
              <dd class="col-sm-10 nopad"> <br>
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
	function add_notes()
	{
		var z='';
		z+= '<div class="inclu_inp top10">';
			z+= '<div class="col-md-10 nopad"><input type="text" name="tx_notes[]" style="width:100%"></div>';
			z+= '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
		z+= '</div>';
		$(".box_notes").append(z);
	}
	
	function add_inclu()
	{
		var z='';
		z+= '<div class="inclu_inp top10">';
			z+= '<div class="col-md-10 nopad"><input type="text" name="tx_inclusions[]" style="width:100%"></div>';
			z+= '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
		z+= '</div>';
		$(".box_inclu").append(z);
	}
	
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
		/*else if($("#tx_in_phone").val()=='')
		{
			alert_text("#tx_in_phone");
		}*/
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
    
    
    <form id="v_form_2">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">     
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">SERVICE HOURS</div>
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
    <input type="hidden" id="txtID_os" name="txtID" value="<?php echo $form_id;?>">     
    <?php 
		$os_status = ($villa_form['onsite_status']==1)?'Show':'Hide';
		$os_status_2 = ($villa_form['onsite_status']==1)?'':'checked';
	?> 
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">ONSITE CONTACT <button class="btn_status btn btn-info btn-xs" type="button"><?php echo $os_status;?></button></div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="chk_nsct" name="chk_nsct" <?php echo $os_status_2;?> onClick="change_os_status(this)">
              <label class="custom-control-label" for="customCheck1">Hide</label>
            </div>            
            <p class="top15"><input type="text" name="tx_onsite" id="tx_onsite" placeholder="Villa Manager:	Ms. Kaew +66 97 002 9208"  style="width:100%;" value="<?php echo $villa_form['onsite_con'];?>"></p>
            
            	<button type="button" class="btn btn-primary " onClick="save_onsite();"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok03" aria-hidden="true"></i> <span class="tok tok03"></span>
                    <i class="fa fa-check cno cno03" aria-hidden="true"></i> <span class="tno tno03"></span>
                </span>
        </div>
    </form>
    <script>
	function change_os_status(me)
	{
		var x=0;
		if($('#chk_nsct').is(':checked'))
		{
			x=0;
		}
		else
		{
			x=1;
		}
		$.ajax({
			url:"libs/action_form/save_onsite_status.php",
			type:"POST",
			dataType:"json",
			data:{me:x,txtID:$("#txtID_os").val()},
			success: function(res){
				if(res.val==1)
				{
					$(".btn_status").text('Show');
				}
				else
				{
					$(".btn_status").text('Hide');
				}
			}
		});
	}
	
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
    
    
    <form id="v_form_41">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<?php $arrival = json_decode($villa_form['arrival'],true);?>
        	<div class="vf_title vt_undl">ARRIVAL AND DEPARTURE TIMES 
            	
            </div>
            <p class="top15">Please provide your flight information in tables below for our team to be ready to check your party in.</p>
            <div class="row nomar">
            <div class="col-md-6 text-center">Check-in time: <input type="text" name="tx_air_check_in" id="tx_air_check_in" placeholder="15:00 onwards" value="<?php echo $arrival['check_in'];?>"></div>	
            <div class="col-md-6 text-center">Check-out time: <input type="text" name="tx_air_check_out" id="tx_air_check_out" placeholder="12:00 noon" value="<?php echo $arrival['check_out'];?>"></div>	
            </div>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">AIRPORT TRANSFER</div> 
            <p class="top15 vf_title_sub">
            
            <button type="button" class="btn btn-primary" onClick="add_aptf_box()"><i class="fa fa-plus" aria-hidden="true"></i></button>
            
            <div class="aptf_row">
             <?php
			$aptf = $arrival['transfer'];
			//echo $arrival['transfer'].'---<br>';
			foreach($aptf as $aptf_val)
			{
				echo '<div class="row">';
					echo '<div class="col-xs-1">';
						echo '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
					echo '</div>';
					echo '<div class="col-xs-11">';
						echo '<input type="text" name="tx_air_transfer[]" id="tx_air_transfer" style="width:100%;" value="'.$aptf_val.'" >';
					echo '</div>';
				echo '</div>';
			}
			?>
            </div>
            </p>
        </div>
        <button type="button" class="btn btn-primary " onClick="save_airrival();"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok41" aria-hidden="true"></i> <span class="tok tok41"></span>
                    <i class="fa fa-check cno cno41" aria-hidden="true"></i> <span class="tno tno41"></span>
                </span>
    </form>
    <script>
	function add_aptf_box()
	{
		var x='';
		x+='<div class="row">';
			x+='<div class="col-xs-1">';
				x+='<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
			x+='</div>';
			x+='<div class="col-xs-11">';
				x+='<input type="text" name="tx_air_transfer[]" id="tx_air_transfer" style="width:100%;" >';
			x+='</div>';
		x+='</div>';
		$(".aptf_row").append(x);
	}
	
    function save_airrival()
	{
		if($("#tx_air_check_in").val()=='')
		{
			alert_text("#tx_air_check_in");
		}
		else if($("#tx_air_check_out").val()=='')
		{
			alert_text("#tx_air_check_out");
		}
		else if($("#tx_air_transfer").val()=='')
		{
			alert_text("#tx_air_transfer");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_arrival.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_41").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok41").fadeIn(300);
						$(".cno41,.tno41").hide();
					}
					else
					{
						$(".cno41,.tno41").fadeIn(300);
						$(".tno41").html(res.msg);
						$(".cok41").hide();
					}
				}
			});
		}
	}
    </script>
    
    
    
    
    
    <br><br>
    <form id="v_form_4">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">    
        <div class="col-md-12 nopad top15">
        <div class="">
        <!--<button type="button" class="btn btn-primary " onClick="save_airport();"> Save</button> -->
        <span class="icon">
            <i class="fa fa-check cok cok4" aria-hidden="true"></i> <span class="tok tok4"></span>
            <i class="fa fa-check cno cno4" aria-hidden="true"></i> <span class="tno tno4"></span>
        </span>
        
        
        
        <div class="grids">
        
        	<div class="col-md-12 r_arrival">
            
            <div class=""></div>
						 <div class="alert alert-success col-md-12 arrival" role="alert">
                        
                            <h2>
                            
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
            </div>
            
            
            <div class="col-md-12 r_departure">
                
                <div class=""></div>
                            <div class="alert alert-warning col-md-12 departure" role="alert">
                            
                                <h2> Transfers Departure <span class="badge badge-warning"><?php echo $yy;?></span></h2>
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
            </div>
        </div>
        
       <!-- <button type="button" class="btn btn-success " onClick="add_table_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>--></div>
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
                  <th>#</th>
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
						echo '<td  style="width: 140px;"><div class="col-md-12 nopad">HKT Arrival</div><div class="col-md-12 nopad top20">HKT Departure</div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_date_a" id="tx_date_a" value="'.$at['tx_date_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_date_d" id="tx_date_d" value="'.$at['tx_date_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a" value="'.$at['tx_airline_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d" value="'.$at['tx_airline_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a" value="'.$at['tx_flight_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d" value="'.$at['tx_flight_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a" value="'.$at['tx_time_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d" value="'.$at['tx_time_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a" value="'.$at['tx_pass_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d" value="'.$at['tx_pass_d'].'"></div></td>';
						echo '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a" value="'.$at['tx_transfer_a'].'"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d" value="'.$at['tx_transfer_d'].'"></div></td>';
						echo '<td  valign="middle"></td>';//<button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>
					echo '</tr>';
				 }
			 }
			 else
			 {
				 ?>
                    <tr>
                      <td style="width: 140px;"><div class="col-md-12 nopad">HKT Arrival</div><div class="col-md-12 nopad top20">HKT Departure</div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_date_a" id="tx_date_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_date_d" id="tx_date_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d"></div></td>
                      <td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d"></div></td>
                      <td  valign="middle"><!--<button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>--></td>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table><?php */?>
            <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
            <!--<p><strong>Special Request:</strong> <?php $spcrq = json_decode($form['special_request']); echo ($spcrq!='')?$spcrq:'-'?></p>-->
        </div>
    </form>
    
    <script>
	function save_airport()
	{
		var data = {
			txtID : $("#txtID").val(),
			val : []
		};
		
		$("#tb_4 tbody tr").each(function(index, element) {
			data.val.push({
					tx_date_a : $(this).find("input[name=tx_date_a]").val(),
					tx_date_d : $(this).find("input[name=tx_date_d]").val(),
					tx_airline_a : $(this).find("input[name=tx_airline_a]").val(),
					tx_airline_d : $(this).find("input[name=tx_airline_d]").val(),
					tx_flight_a : $(this).find("input[name=tx_flight_a]").val(),
					tx_flight_d : $(this).find("input[name=tx_flight_d]").val(),
					tx_time_a : $(this).find("input[name=tx_time_a]").val(),
					tx_time_d : $(this).find("input[name=tx_time_d]").val(),
					tx_pass_a : $(this).find("input[name=tx_pass_a]").val(),
					tx_pass_d : $(this).find("input[name=tx_pass_d]").val(),
					tx_transfer_a : $(this).find("input[name=tx_transfer_a]").val(),
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
			  s+= '<td  style="width: 140px;"><div class="col-md-12 nopad">HKT Arrival</div><div class="col-md-12 nopad top20">HKT Departure</div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_date_a" id="tx_date_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_date_d" id="tx_date_d"></div></td>';
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
    
    <!--<form id="v_form_5">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">5) TELEPHONE NUMBER</div>
            <p class="top15">The mobile number you will have arriving the villa in Phuket</p>
            
            <div class="col-md-12 nopad "><input type="tel" name="tx_phone" id="tx_phone" style="width:100%" value="<?php echo $villa_form['phone'];?>"></div>
            <br><p><br>
            	<button type="button" class="btn btn-primary " onClick="save_phone()"> Save</button>	
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
        <!--<button type="button" class="btn btn-primary " onClick="save_guest();"> Save</button> -->
        <span class="icon">
            <i class="fa fa-check cok cok6" aria-hidden="true"></i> <span class="tok tok6"></span>
            <i class="fa fa-check cno cno6" aria-hidden="true"></i> <span class="tno tno6"></span>
        </span>
        <!--<button type="button" class="btn btn-success " onClick="add_guest()"><i class="fa fa-plus" aria-hidden="true"></i></button>--></div>
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
				 foreach($gue as $guest)
				 {
					echo '<tr>';
						echo '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
						echo '<td><input class="inp" type="text" name="tx_first" id="tx_first" value="'.$guest['tx_first'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_passport" id="tx_passport" value="'.$guest['tx_passport'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_city" id="tx_city" value="'.$guest['tx_city'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_date" id="tx_date" value="'.$guest['tx_date'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_nationality" id="tx_nationality" value="'.$guest['tx_nationality'].'"></td>';
						echo '<td><input class="inp" type="text" name="tx_room" id="tx_room" value="'.$guest['tx_room'].'"></td>';
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
                        <td><input class="inp" type="text" name="tx_date" id="tx_date"></td>
                        <td><input class="inp" type="text" name="tx_nationality" id="tx_nationality"></td>
                        <td><input class="inp" type="text" name="tx_room" id="tx_room"></td>
                    </tr>
				 <?php
			 }
			 ?>
                
              </tbody>
            </table>
            <!--<p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>-->
            <!--<strong>Bed Configurations </strong><br><?php echo ($form['bed_configuration']!='')?$form['bed_configuration']:'-';?>-->
        </div>
        
    </form>
    <input class="inp1" type="hidden" value="1">
    <script>
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
			  z+= '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
			  z+= '<td><input class="inp" type="text" name="tx_first" id="tx_first"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_passport" id="tx_passport"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_city" id="tx_city"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_date" id="tx_date"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_nationality" id="tx_nationality"></td>';
			  z+= '<td><input class="inp" type="text" name="tx_room" id="tx_room"></td>';
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
    <input type="hidden" class="tt7" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title vt_undl">FOOD AND BEVERAGES</div>
            
			<div class="col-md-12 nopad top15">

				<div class="vf_title_sub">
					<div class="col-md-2 nopad ">Menu Link</div>
                    <div class="col-md-8 nopad "><input type="text" name="tx_food_link" id="tx_food_link" style="width:100%" value="<?php echo $villa_form['tx_food_link'];?>"> </div>
					<p>
						&nbsp;<button type="button" class="btn btn-primary " onClick="save_menu_link();"> Save</button>
						<span class="icon">
							<i class="fa fa-check cok cok7_ml" aria-hidden="true"></i> <span class="tok tok7_ml"></span>
							<i class="fa fa-check cno cno7_ml" aria-hidden="true"></i> <span class="tno tno7_ml"></span>
						</span>
					</p>
				</div>
				<p class="top15 vf_title_sub"></p>
			</div>
		
			<div class="col-md-12 nopad top15">
				<!--<div class="vf_title_sub vt_undl">Link</div>-->
				<!--<p class="top15 vf_title_sub">Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for more than 6 guests are 8 dishes including appetizers and desserts. </p>-->
			</div>
		
            <?php /*?><button type="button" class="btn btn-primary " onClick="save_food();"> Save</button> 
            <button type="button" class="btn btn-success " onClick="add_food();"><i class="fa fa-plus" aria-hidden="true"></i></button>
            <span class="icon">
            	<i class="fa fa-check cok cok7a_1" aria-hidden="true"></i> <span class="tok tok7a_1"></span>
                <i class="fa fa-check cno cno7a_1" aria-hidden="true"></i> <span class="tno tno7a_1"></span>
            </span>
            
            <div class="vf_title_sub box_food top15">
                <?php 
				$ar_food = json_decode($villa_form['food'],true);
				if(count($ar_food)>0)
				{
					foreach($ar_food as $food)
					{
						echo '<div class="col-md-12 top15">';
							echo '<div class="col-md-1"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> </div>';
							echo '<div class="col-md-11"><input type="text" name="tx_food" style="width:100%;" value="'.$food['tx_food'].'"></div>';
						echo '</div>';
					}
				}
				?>
            </div><?php */?>
            
            <!--<p class="top15">Food and beverage requests are required at least 72 hours prior to your arrival. The items will be purchased at cost plus a 20% procurement charge.</p>-->
        </div>
        <br>
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">A. FIRST DINNER</div>
            <p class="top15 vf_title_sub">Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for more than 6 guests are 8 dishes including appetizers and desserts. </p>
        </div>
        
        <div class="col-md-12 nopad top15">
        
            <div class="vf_title_sub">
            <button type="button" class="btn btn-primary " onClick="save_dinner();"> Save</button> 
            <button type="button" class="btn btn-success " onClick="add_dinner();"><i class="fa fa-plus" aria-hidden="true"></i></button>
            <span class="icon">
            	<i class="fa fa-check cok cok7a" aria-hidden="true"></i> <span class="tok tok7a"></span>
                <i class="fa fa-check cno cno7a" aria-hidden="true"></i> <span class="tno tno7a"></span>
            </span>
            
            </div>
            
            <div class="col-md-12 nopad top15">
                <div class="nopad vf_title_sub col-md-12 dinn">
                	<?php
					$din = json_decode($villa_form['dinner'],true);
					foreach($din as $dinner)
					{
						echo '<div class="row nomarlr top10">';
							echo '<div class="col-md-8 nopad"><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner" value="'.$dinner.'"></div>';
							echo '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
						echo '</div>';
					}
					?>
                	<!--<div class="col-md-12 nopad top10">
                    
                        <div class="col-md-8 nopad"><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner"></div>
                        <div class="col-md-4"></div>
                    </div>-->
                </div>
            </div>
            <p class="top15 vf_title_sub"></p>
        </div>
        
    </form>
    <script>
	function save_menu_link()
	{
		$.ajax({
			url:"libs/action_form/save_menu_link.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7a").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7_ml").fadeIn(300);
					$(".cno7_ml,.tno7_ml").hide();
				}
				else
				{
					$(".cno7_ml,.tno7_ml").fadeIn(300);
					$(".tno7_ml").html(res.msg);
					$(".cok7_ml").hide();
				}
			}
		});
	}
	
	function add_food()
	{
		var x='';
			x+='<div class="col-md-12 top15">';
                    x+='<div class="col-md-1"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> </div>';
                    x+='<div class="col-md-11"><input type="text" name="tx_food" style="width:100%;"></div>';
                x+='</div>';
		$(".box_food").append(x);
	}
	
	function save_food()
	{
		var data = {
			txtID : $(".tt7").val(),
			val : []
		};
		
		$(".box_food").children().each(function(index, element) {
			data.val.push({
				tx_food : $(this).find("input[name=tx_food]").val(),
			});
		});
		
		$.ajax({
			url:"libs/action_form/save_food.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok7a_1").fadeIn(300);
					$(".cno7a_1,.tno7a_1").hide();
				}
				else
				{
					$(".cno7a_1,.tno7a_1").fadeIn(300);
					$(".tno7a_1").html(res.msg);
					$(".cok7a_1").hide();
				}
			}
		});
	}
	
    function save_dinner()
	{
		$.ajax({
			url:"libs/action_form/save_dinner.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7a").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7a").fadeIn(300);
					$(".cno7a,.tno7a").hide();
				}
				else
				{
					$(".cno7a,.tno7a").fadeIn(300);
					$(".tno7a").html(res.msg);
					$(".cok7a").hide();
				}
			}
		});
	}
    
    
    function add_dinner()
	{
		var x='';
		x+= '<div class="row nomarlr top10">';
			x+= '<div class="col-md-8 nopad"><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner"></div>';
			x+= '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
		x+= '</div>';
		$(".dinn").append(x);
	}
    </script>
    
    
    <?php $a_comp =  json_decode($villa_form['complimentary'],true);?>
    <form id="v_form_7a_11">
    <input type="hidden" class="tt7" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">Complimentary Food & Beverages </div>
            <div class="vf_title_sub "><input type="checkbox" id="chk_a_comp" name="chk_a_comp" <?php echo ($a_comp['display']=='on')?'checked':'';?>> Show</div>
        </div>
        
        <div class="col-md-12 nopad top15">
        
            <div class="vf_title_sub">
                <div class="col-md-12 nopad "><textarea name="tx_Complimentary" id="tx_Complimentary" cols="30" rows="5" style="width:100%"><?php echo $a_comp['complimentary'];?></textarea></div>
                <p>
                    <button type="button" class="btn btn-primary " onClick="save_Complimentary();"> Save</button>
                    <span class="icon">
                        <i class="fa fa-check cok cok7a_11" aria-hidden="true"></i> <span class="tok tok7a_11"></span>
                        <i class="fa fa-check cno cno7a_11" aria-hidden="true"></i> <span class="tno tno7a_11"></span>
                    </span>
            	</p>
            </div>
            <p class="top15 vf_title_sub"></p>
        </div>
        
    </form>
    <script>
    function save_Complimentary()
	{
		$.ajax({
			url:"libs/action_form/save_complimentary.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7a_11").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7a_11").fadeIn(300);
					$(".cno7a_11,.tno7a_11").hide();
				}
				else
				{
					$(".cno7a_11,.tno7a_11").fadeIn(300);
					$(".tno7a_11").html(res.msg);
					$(".cok7a_11").hide();
				}
			}
		});
	}
    </script>
    
    
    <?php $breakfast = json_decode($villa_form['breakfast'],true);?>
    <form id="v_form_7b">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">B. FIRST BREAKFAST</div>
                
                
                
                <p class="top15 vf_title_sub top20 col-md-12 nopad"><button type="button" class="btn btn-success " onClick="add_food();"><i class="fa fa-plus" aria-hidden="true"></i></button></p>
                
        	</div>
        
            <div class="vf_title_sub">
            	<div class="b_food">
                	<?php 
					if(count($breakfast['food'])>0)
					{
						foreach($breakfast['food'] as $b_food)
						{
							echo '<div class="b_sub_food top10">';
								echo '<div class="col-md-8 nopad top10"> <input type="text" name="tx_b_food[]" value="'.$b_food.'" style="width:100%"></div>';
								echo '<div class="col-md-2 top10"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
							echo '</div>';
						}
					}
					?>
                </div>
                
                <!--<div class="col-md-12 nopad top10">
                	<textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" style="width:100%"><?php echo $breakfast['breakfast'];?></textarea>
                </div>-->
            	
                
                <div class="vf_title_sub">
                    <div class="col-md-12 nopad top15">
                        <div class="col-md-2 nopad">Breakfast Link</div>
                        <div class="col-md-10"><input type="text" id="tx_b_link" name="tx_b_link" style="width:100%" value="<?php echo $breakfast['link'];?>"></div>
                    </div>
                    <div class="col-md-12 nopad top15">    
                        <div class="col-md-2 nopad">Breakfast File</div>
                        <div class="col-md-2"><button type="button" class="btn btn-info pull-left" onClick="choose_file('b_file');">Upload</button></div>
                        <div class="col-md-8">
                        	<div class="col-md-12">
                                <p><span class="tx_b_filename" color="#ff0000" style="display:inline-block;"> <?php echo ($breakfast['filename']!='')?$breakfast['filename']:'Choose File';?></span>
                                <i class="fa fa-times b_trem" aria-hidden="true" onClick="remove_file_upload('b_trem','tx_b_path','tx_b_filename');" style="float: left;color:#FF0004; cursor:pointer;<?php echo ($breakfast['filename']!='')?'display:block;':'display:none;';?>"></i></p>
                                <?php $file_status = ($breakfast['filename']!='')?1:0;?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input validate hidden" id="b_file" name="b_file" placeholder="img" onchange="showFile(this,'tx_b_path','tx_b_filename');">
                                    <!--<label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>-->
                                    <input type="hidden" class="tx_b_path" id="tx_b_path" name="tx_b_path" value="<?php echo ($breakfast['filename']!='')?$breakfast['filename']:'';?>">
                                    <!--<input type="hidden" class="tx_tpath" id="tx_file_path" name="tx_file_path" value="<?php echo ($breakfast['file_path']!='')?$breakfast['file_path']:'';?>">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 nopad top10">
                    <p>
                        <button type="button" class="btn btn-primary " onClick="save_BREAKFAST('<?php echo $file_status;?>');"> Save</button>
                        <span class="icon">
                            <i class="fa fa-check cok cok7b" aria-hidden="true"></i> <span class="tok tok7b"></span>
                            <i class="fa fa-check cno cno7b" aria-hidden="true"></i> <span class="tno tno7b"></span>
                        </span>
                    </p>
                </div>
                
            </div>
        </div>
    </form>
    
    <script>
	function remove_file_upload(button,path,filename)
	{
		$("."+path).val('');
		$("."+filename).html('');
		$("."+button).hide();
	}
	
	function choose_file(button)
	{
		$("#"+button).click();
	}
	function showFile(input,path,filename) 
	{
		let fileName = input.files[0].name;
		if ($.trim(fileName)) {
			$('label[for="img"]').text(fileName);
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					var img = '<img src="' + e.target.result + '" width="100%" />';
					
					//$('#preview-img').html(img);
					$("#"+path).val(fileName);
					$("."+filename).html(fileName);
				};
				reader.readAsDataURL(input.files[0]);
			}
		} else {
			$('label[for="img"]').text('Choose file');
		}
	};
					
	function add_food()
	{
		var z = '';
		z += '<div class="b_sub_food top10">';
			z += '<div class="col-md-8 nopad top10"> <input type="text" name="tx_b_food[]" style="width:100%"></div>';
			z += '<div class="col-md-2 top10"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
		z += '</div>';
		$(".b_food").append(z);
	}
	
	function save_file_uploaded(form,path,filename,button)
	{
		var sta = true;
		var formData = new FormData($(form)[0]);
		$.ajax({
			url: "libs/action_form/save_file_upload.php",
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			data: formData,
			beforeSend: function () {
			},
			success: function (response) {
				//window.location.reload();
				$("."+filename).html(response.file_name);
				$("#"+path).val(response.file_path);
				if(response.success==true)
				{
					$("."+button).show();
					sta = true;
				}
				else
				{
					sta = false;
				}
			} 
		});
		return sta;
		
		
	}
	
    function save_BREAKFAST(file_status)
	{
		/*if($("#tx_BREAKFAST").val()=='')
		{
			alert_text("#tx_BREAKFAST");
		}
		else
		{*/
			if($("#tx_b_path").val()!='')
			{
				if(file_status==1)
				{
					$.ajax({
						url:"libs/action_form/save_breakfast.php",
						type:"POST",
						dataType:"json",
						data:$("#v_form_7b").serialize(),
						success: function(res){
							if(res.status==true)
							{
								$(".cok7b").fadeIn(300);
								$(".cno7b,.tno7b").hide();
							}
							else
							{
								$(".cno7b,.tno7b").fadeIn(300);
								$(".tno7b").html(res.msg);
								$(".cok7b").hide();
							}
						}
					});
				}
				else
				{
					var result = save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem');
					//alert(result);
					//console.log(save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem'));
					if(result==true)
					{
						setTimeout(function(){
							$.ajax({
								url:"libs/action_form/save_breakfast.php",
								type:"POST",
								dataType:"json",
								data:$("#v_form_7b").serialize(),
								success: function(res){
									if(res.status==true)
									{
										$(".cok7b").fadeIn(300);
										$(".cno7b,.tno7b").hide();
									}
									else
									{
										$(".cno7b,.tno7b").fadeIn(300);
										$(".tno7b").html(res.msg);
										$(".cok7b").hide();
									}
								}
							});
						},500);
					}
				}
				
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_breakfast.php",
					type:"POST",
					dataType:"json",
					data:$("#v_form_7b").serialize(),
					success: function(res){
						if(res.status==true)
						{
							$(".cok7b").fadeIn(300);
							$(".cno7b,.tno7b").hide();
						}
						else
						{
							$(".cno7b,.tno7b").fadeIn(300);
							$(".tno7b").html(res.msg);
							$(".cok7b").hide();
						}
					}
				});
			}
			
		/*}*/
	}
    </script>
    
    <?php $f7c = json_decode($villa_form['provisioning'],true); ?>
    <!--<form id="form_add_yacth_cover" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="fn.app.yacth_cover.yacth_cover.add(this);return false;">-->
    <form id="v_form_7c" role="form" enctype="multipart/form-data">
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
                                <td><input class="inp" type="text" name="tx_Provisioning" id="tx_Provisioning" value="<?php echo ($f7c['wine']=='')?'Please select and attach back the provisional list with your requirements.':$f7c['provisioning'];?>"></td>
                            </tr>
                            <tr>
                                <td>Wine List Choices</td>
                                <td>
                                <?php $wine = $dbc->Query("select * from wine_list where status > 0 order by name asc");
									while($wl = $dbc->Fetch($wine))
									{
										if(in_array($wl['id'],$f7c['wine_list']))
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
                            <tr>
                                <td>Wine List Link</td>
                                <td><input class="inp" type="text" name="tx_Wine_link" id="tx_Wine_link" value="<?php echo $f7c['wine_list_link'];?>"></td>
                            </tr>
                            <tr>
                                <td>Wine List File <button type="button" class="btn btn-info pull-right" onClick="choose_photo();">Upload</button></td>
                                <td>
                                    <div class="col-md-12">
                                        <p><span class="tx_filename" color="#ff0000" style="display:inline-block;"> <?php echo ($f7c['filename']!='')?$f7c['filename']:'Choose File';?></span>
                                        <i class="fa fa-times btrem" aria-hidden="true" onClick="remove_file();" style="float: left;color:#FF0004; cursor:pointer;<?php echo ($f7c['filename']!='')?'display:block;':'display:none;';?>"></i></p>
                                        
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input validate hidden" id="img" name="img" placeholder="img" onchange="showImg(this);">
                                            <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                                            <input type="hidden" class="tx_tpath" id="tx_file_name" name="tx_file_name" value="<?php echo ($f7c['filename']!='')?$f7c['filename']:'';?>">
                                            <input type="hidden" class="tx_tpath" id="tx_file_path" name="tx_file_path" value="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'';?>">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!--<tr>
                                <td>Wine List</td>
                                <td><input class="inp" type="text" name="tx_Wine" id="tx_Wine" value="<?php echo $f7c['wine'];?>"></td>
                            </tr>-->
                        </tbody>
                    </table>
                    
                    
                    
                    <?php $file_status = ($f7c['filename']!='')?1:0;?>
                    <!--upload file-->
                    
                    
                    
                   <?php /*?> <div class="form-group row"><br>
                        <!--<div class="col-sm-6" id="preview-img">
                        <?php echo $image; ?>
                        </div>-->
                    </div><?php */?>
                    <script>
					function remove_file()
					{
						$(".tx_tpath").val('');
						$(".tx_filename").html('');
						$(".btrem").hide();
					}
					
                    function choose_photo()
					{
						$("#img").click();
					}
					function showImg(input) 
					{
						let fileName = input.files[0].name;
						if ($.trim(fileName)) {
							$('label[for="img"]').text(fileName);
							if (input.files && input.files[0]) {
								let reader = new FileReader();
								reader.onload = function (e) {
									var img = '<img src="' + e.target.result + '" width="100%" />';
									
									//$('#preview-img').html(img);
									$("#tx_file_name,#tx_file_path").val(fileName);
									$(".tx_filename").html(fileName);
								};
								reader.readAsDataURL(input.files[0]);
							}
						} else {
							$('label[for="img"]').text('Choose file');
						}
					};
					
                    </script>
                    <!--upload file-->

                </div>
                <p><button type="button" class="btn btn-primary " onClick="save_Provisioning('<?php echo $file_status;?>');"> Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                    <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                </span>
                </p>
            </div>
        </div>
    </form>
    
    <script>
	function save_file_upload(form)
	{
		var formData = new FormData($(form)[0]);
		$.ajax({
			url: "libs/action_form/save_file.php",
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			data: formData,
			beforeSend: function () {
			},
			success: function (response) {
				//window.location.reload();
				$(".tx_filename").html(response.file_name);
				$("#tx_file_name").val(response.file_name);
				$("#tx_file_path").val(response.file_path);
				if(response.file_path!=null)
				{
					$(".btrem").show();
				}
			} 
		});
	}
	
    function save_Provisioning(file_status)
	{
		/*if($("#tx_Provisioning").val()=='')
		{
			alert_text("#tx_Provisioning");
		}
		else if($("#tx_Wine").val()=='')
		{
			alert_text("#tx_Wine");
		}
		else
		{*/
			//save_file_upload($("#v_form_7c")[0]);
			if($("#tx_file_name").val()!='' && $("#tx_file_path").val()!=''  )
			{
				if(file_status==1)
				{
					$.ajax({
							url:"libs/action_form/save_provisioning.php",
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
				else
				{
					var formData = new FormData($("#v_form_7c")[0]);
					$.ajax({
						url: "libs/action_form/save_file.php",
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						dataType: 'json',
						data: formData,
						beforeSend: function () {
						},
						success: function (response) {
							//window.location.reload();
							$(".tx_filename").html(response.file_name);
							$("#tx_file_name").val(response.file_name);
							$("#tx_file_path").val(response.file_path);
							if(response.file_path!=null)
							{
								$(".btrem").show();
							}
							
							$.ajax({
								url:"libs/action_form/save_provisioning.php",
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
					});
				}
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_provisioning.php",
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
			
			
			
		/*}*/
	}
    </script>
    
    <form id="v_form_7d">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    	<div class="col-md-12 nopad top15">
        	
            <div class="col-md-12 nopad top15">
                <div class="vf_title_sub vt_undl">D. SPECIAL DIETARY</div>
                <p class="top15 vf_title_sub">Please advise of any special dietary requirements i.e. vegetarian, vegan, food allergies, low sodium, etc.</p>
        </div>
        
            <!--<div class="vf_title_sub">
            <div class="col-md-12 nopad "><textarea name="tx_special" id="tx_special" cols="30" rows="5" style="width:100%"><?php echo $villa_form['dietary'];?></textarea></div>
            <p><button type="button" class="btn btn-primary " onClick="save_special();"> Save</button>	
            	<span class="icon">
                    <i class="fa fa-check cok cok7d" aria-hidden="true"></i> <span class="tok tok7d"></span>
                    <i class="fa fa-check cno cno7d" aria-hidden="true"></i> <span class="tno tno7d"></span>
                </span>
            </p>
            </div>-->
        </div>
    </form>
    
    <script>
    function save_special()
	{
		if($("#tx_special").val()=='')
		{
			alert_text("#tx_special");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_special.php",
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
	}
    </script>
    
    <form id="v_form_8">
    <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        <div class="col-md-12 nopad top15">
        	
        	<div class="vf_title vt_undl">PAYMENT ON ARRIVAL</div>
            <p class="top15">Any expense made at the villa is only payable in cash</p>
        </div>
        
        <?php $deposit =  json_decode($villa_form['deposit'],true);?>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">A. SECURITY DEPOSIT </div>
            <p class="top15 vf_title_sub">
            The refundable security deposit <input class="" type="text" name="tx_deposit" id="tx_deposit" placeholder="of US$1500 " value="<?php echo $deposit['deposit'];?>"> in any major currency will be collected cash upon arrival or credit card authorization.<br>
            Damage security deposit 
            <input class="" type="text" name="tx_damage_deposit" id="tx_damage_deposit" style="width:100%;" placeholder="USD 1,000 or THB 30,000 upon check in via cash or bank transfer." value="<?php echo $deposit['damage_deposit'];?>"> </p>
            
            <p class="top15 vf_title_sub">     
            <button type="button" class="btn btn-primary " onClick="save_deposit();"> Save</button>
            <span class="icon">
                    <i class="fa fa-check cok cok8" aria-hidden="true"></i> <span class="tok tok8"></span>
                    <i class="fa fa-check cno cno8" aria-hidden="true"></i> <span class="tno tno8"></span>
            </span>
            </p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">B. PAYMENT ON ARRIVAL</div>
            <p class="top15 vf_title_sub"><input class="" type="text" name="tx_payment_on_arrival" id="tx_payment_on_arrival" placeholder="of US$1500 " value="<?php echo $villa_form['payment_on_arrival'];?>"> <button type="button" class="btn btn-primary " onClick="save_pmoarv();"> Save</button>
            <span class="icon">
                    <i class="fa fa-check cok cok8_payment_on_arrival" aria-hidden="true"></i> <span class="tok tok8_payment_on_arrival"></span>
                    <i class="fa fa-check cno cno8_payment_on_arrival" aria-hidden="true"></i> <span class="tno tno8_payment_on_arrival"></span>
            </span></p>
        </div>
        
        <div class="col-md-12 nopad top15">
        	<div class="vf_title_sub vt_undl">C. REIMBURSEMENT</div>
            <p class="top15 vf_title_sub">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers.  </p>
        </div>
    </form>
    
    <script>
	function save_pmoarv()
	{
		if($("#tx_payment_on_arrival").val()=='')
		{
			alert_text("#tx_payment_on_arrival");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_payment_on_arrival.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_8").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok8_payment_on_arrival").fadeIn(300);
						$(".cno8_payment_on_arrival,.tno8_payment_on_arrival").hide();
					}
					else
					{
						$(".cno8_payment_on_arrival,.tno8_payment_on_arrival").fadeIn(300);
						$(".tno8_payment_on_arrival").html(res.msg);
						$(".cok8_payment_on_arrival").hide();
					}
				}
			});
		}
	}
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
                        <td><input class="inp" type="text" name="tx_tour" id="tx_tour" value="<?php echo ($f9['Tours']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Tours'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Yacht Charters</td>
                        <td><input class="inp" type="text" name="tx_Yacht" id="tx_Yacht" value="<?php echo ($f9['Yacht']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Yacht'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Restaurant Reservation</td>
                        <td><input class="inp" type="text" name="tx_Restaurant" id="tx_Restaurant" value="<?php echo $f9['Restaurant'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Massage & Spa</td>
                        <td><input class="inp" type="text" name="tx_Massage" id="tx_Massage" value="<?php echo $f9['Massage'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Special Occasion</td>
                        <td><input class="inp" type="text" name="tx_Occasion" id="tx_Occasion" value="<?php echo ($f9['Occasion']=='')?'Birthday, Anniversary, Wedding, Proposal, Honeymoon, others…':$f9['Occasion'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Other Arrangements</td>
                        <td><input class="inp" type="text" name="tx_Arrangements" id="tx_Arrangements" value="<?php echo($f9['Arrangements']=='')?'Baby equipment required, extra bed, ':$f9['Arrangements'];?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%;">Dietary</td>
                        <td><input class="inp" type="text" name="tx_Dietary" id="tx_Dietary" value="<?php echo ($f9['Dietary']=='')?'Vegan, vegetarian, gluten free, kosher, Muslim, allergies:':$f9['Dietary'];?>"></td>
                    </tr>
                </tbody>
            </table>
            <!--<div class="col-md-12 nopad "><textarea name="tx_Comment" id="tx_Comment" cols="30" rows="5" style="width:100%" placeholder="Comment"><?php echo $f9['Comment'];?></textarea></div>-->
        </div>
        <p><button type="button" class="btn btn-primary " onClick="save_service();"> Save</button>	
        <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
        </p>
    </form>
    
    <script>
    function save_service()
	{
		if($("#tx_tour").val()=='')
		{
			alert_text("#tx_tour");
		}
		/*else if($("#tx_Restaurant").val()=='')
		{
			alert_text("#tx_Restaurant");
		}
		else if($("#tx_Massage").val()=='')
		{
			alert_text("#tx_Massage");
		}*/
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
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_service.php",
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
    
    <div class="col-md-12 nopad top15">
        <div class="vf_title vt_undl">GRATUITIES</div>
        <p class="top15">Gratuities are not mandatory but a customary gesture to award the staff for their kind hospitality and flexibility. The method of payment is cash for tips on-site.</p>
        <p class="top15">I look forward to receiving the above information and welcoming you to Talay Naiharn Villa. Please do not hesitate to contact us if you have questions or requests.</p>
    </div>
    
    <div class="col-md-12 nopad top30">
        <p class="top15">Kind regards,</p>
        <p class="top15"><strong>Your Inspiring Villas Team!</strong></p>
    </div>
    
    
    
    </div><!--end row--><br><br><br>
</div>


















