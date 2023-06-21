<style>
input[type=date].form-control, input[type=time].form-control, input[type=datetime-local].form-control, input[type=month].form-control {
     line-height: normal; 
}
.form-control {
    border-radius: 1px;
    margin-bottom: 0px; 
    border-color: #ced4d7;
    padding: 8px 12px;
    height: auto;
    box-shadow: none;
    color: #4b565b;
}
</style>

<style>
							
/*
 *  STYLE 3
 */

#style-3::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar-thumb
{
	background-color: #112845;
}
.scrollbar
{
	margin-left: 15px;
	float: left;
	height: 300px;
	/*width: 95%;*/
	background:none;
	/*overflow-y: scroll;*/
	margin-bottom: 25px;
}
</style>

<?php 
$cover = $dbc->GetRecord("cover","*","page='forrent' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
?>

<div class="mg-page-titles "><!--parallax-->
    <div class="container-fluid nopad">
            <img src="<?php echo $photo_cover;?>" alt="" width="100%">
        <div class="row">
            <!--<div class="col-md-12">
                <h2>For Rent</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>
<?php 
$id = $_REQUEST['id'];
$room = $dbc->GetRecord("properties","*","id=".$id);//.$_REQUEST['id']);
function tag($id)
{
	global $dbc;
	if($id !='')
	{
		$tags = $dbc->GetRecord("tags","*","id=".$id);
	}
	else
	{
		$tags['name'] = '';
	}
	return '<button class="btn_tag">'.$tags['name'].'</button>';
}

?>
<div class="mg-single-room-price">
			<div class="mg-srp-inner">$<?php echo $room['price'];?><span>/Night</span></div>
		</div>
		<div class="mg-single-room">
			<div class="container">
				<div class="row">
                <div class="col-md-12">
                    
                    </div>
					<div class="col-md-7">
						<div class="mg-gallery-container">
							<ul class="mg-gallery" id="mg-gallery">
                            <?php 
							$slide = json_decode($room['photo'],true);
							foreach($slide as $img)
							{
								echo '<li><img src="'.$img.'" alt="Partner Logo">'.tag($room['tag']).'</li>';
							}
							?>
							</ul>
						</div>
					</div>
                    
					<div class="col-md-5 mg-room-fecilities">
                   		
						<div class="row">
                        	<div class="col-md-12 f16">
                            <h2 class="mg-sec-left-title"><?php echo $room['name'];?></h2>
                            <?php echo base64_decode($room['brief'],true);?><br>
                            <?php echo base64_decode($room['short_det'],true);?>
                            </div>
                        	<br><br>
						</div>
                        
						<br>
						<h2 class="mg-sec-left-title">Room Facilities</h2>
						<div class="row">
							
								<?php 
								$room_fac = $dbc->Query("select * from property_icon where property = '".$id."' ");
								$count_fac = $dbc->GetCount("property_icon","property = '".$id."'");
								$total_fac = ($count_fac/2);
								//echo $total_fac;
								while($r_fac = $dbc->Fetch($room_fac))
								{
									$icon = $dbc->GetRecord("icons","*","id=".$r_fac['icon']);
									//echo json_decode($icon['icon'],true);
									//echo round($total_fac);
									echo '<div class="col-xs-12 col-md-6">';
										echo '<ul>';
											echo '<li><img src="'.json_decode($icon['icon'],true).'" class="micon"> '.$icon['name'].'  </li>';
										echo '</ul>';
									echo '</div>';
									
								}
								?>
						</div>
                        
                        <a><button class="btn btn-main btt" onClick="visitto('tb');" data-toggle="tooltip"  data-placement="bottom" title="Price">Price</button></a>
                        <a><button class="btn btn-main fb btt" data-toggle="tooltip"  data-placement="bottom" title="Share" onClick="onShare('<?php echo $room['id'];?>','<?php echo $room['name'];?>','<?php echo base64_decode($room['short_det'],true);?>','<?php echo $slide[0];?>');"><i class="fa fa-facebook" aria-hidden="true"></i></button></a>
                         <?php 
						$file = json_decode($room['file'],true);
						if($file !='')
						{
							$link = $file;
							echo '<a href="'.$link.'"><button class="btn btn-main pdf btt" data-toggle="tooltip" data-placement="bottom" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button></a>';
						}
						else
						{
							$link = '';
						}
						?>
                        
                        <a><button class="btn btn-main visit btt" onClick="popemail()" data-toggle="tooltip" data-placement="bottom" title="Send Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                        <?php 
						if($room['link'] !='')
						{
							?>
                            <a href="<?php echo $room['link'];?>" target="_blank"><button class="btn btn-main email btt" onClick="visitto('tb');" data-toggle="tooltip" data-placement="bottom" title="Tripadvisor"><!--<i class="fa fa-user-plus" aria-hidden="true"></i>--><img src="../../upload/trip.png" width="25" alt=""></button></a>
                            <?php
						}
						?>
                        
                        
					</div>
                   
				</div>
                
                
				<div class="row">
					<div class="col-md-8">
                        
						<div class="mg-single-room-txt">
							<h2 class="mg-sec-left-title">Room Description</h2>
                            	<p class="f16"><?php echo base64_decode($room['detail']);?></p>
						</div>
                        
                        <div class="col-md-12 mg-room-fecilities">
                            <h2 class="mg-sec-left-title">FEATURES</h2>
                            <div class="row">
                            <?php 
								foreach(json_decode($room['features']) as $fea)
								{
									$icon_fea = $dbc->GetRecord("icons","*","id=".$fea);
									echo '<div class="col-xs-12 col-md-6">';
										echo '<ul>';
											echo '<li><img src="'.json_decode($icon_fea['icon'],true).'" class="micon"> '.$icon_fea['name'].'  </li>';
										echo '</ul>';
									echo '</div>';
									
								}
							?>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<br><br>
                        </div>
                        <div class="col-md-12 mg-room-fecilities">
                            <h2 class="mg-sec-left-title">APPLIANCES</h2>
                            <div class="row">
                                <?php 
									foreach(json_decode($room['appliances']) as $appl)
									{
										$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
										echo '<div class="col-xs-12 col-md-6">';
											echo '<ul>';
												echo '<li><img src="'.json_decode($icon_app['icon'],true).'" class="micon"> '.$icon_app['name'].'  </li>';
											echo '</ul>';
										echo '</div>';
										
									}
								?>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<br><br>
                        </div>
                        <div class="col-md-12 mg-room-fecilities">
                            <h2 class="mg-sec-left-title">ADDRESS MAP</h2>
                            <div class="row">
                                <?php 
									foreach(json_decode($room['address_map']) as $appl)
									{
										$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
										echo '<div class="col-xs-12 col-md-6">';
											echo '<ul>';
												echo '<li> '.$icon_app['name'].'  </li>';
											echo '</ul>';
										echo '</div>';
										
									}
								?>
                            </div>
                        </div>
                        
					</div>
                    <div class="col-md-4"><br><br>
                    	<h2 class="mg-sec-left-title">OUR SERVICES</h2>
                            <div class="mg-feature">
                                <div class="mg-feature-icon-title">
                                    <i class="fa fa-check"></i>
                                    <h3 style="margin-top: -2px;">PICKED BY PROFESSIONAL</h3>
                                    <p class="padl60">Carefully Hand-Picked & Inspected</p>
                                </div>
                            </div>
                            <div class="mg-feature">
                                <div class="mg-feature-icon-title">
                                    <i class="fa fa-users"></i>
                                    <h3 style="margin-top: -2px;">FULL SERVICED VILLAS</h3>
                                    <p class="padl60">Dedicated with Chef, Staff, Concierge</p>
                                </div>
                            </div>
                            <div class="mg-feature">
                                <div class="mg-feature-icon-title">
                                    <i class="fa fa-trophy"></i>
                                    <h3 style="margin-top: -2px;">PRICE GUARANTEED</h3>
                                    <p class="padl60">Best Valued Price</p>
                                </div>
                            </div>
                            <div class="mg-feature">
                                <div class="mg-feature-icon-title">
                                    <i class="fa fa-heart"></i>
                                    <h3 style="margin-top: -2px;">SERVICED WITH LOVE</h3>
                                    <p class="padl60">24/7 Experienced Customer Service</p>
                                </div>
                            </div>
							
						<div class="mg-single-room-txt box scrollbar" id="style-3" style="margin-top:-50px;">
							<h2 class="mg-sec-left-title">SEND INQUIRY</h2>
                                <form id="form_contact" class="clearfix">
                                	<input type="hidden" name="txtID" value="<?php echo $room['id'];?>">
                                    <div class="mg-contact-form-input col-md-6 nopad">
                                        <label for="full-name">Check In</label>
                                        <input type="date" class="form-control" id="checkin" name="checkin">
                                    </div>
                                    <div class="mg-contact-form-input col-md-6 nopad">
                                        <label for="full-name">Check Out</label>
                                        <input type="date" class="form-control" id="checkout" name="checkout">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="full-name">Full Name</label>-->
                                        <input type="text" class="form-control" name="cbbGuest" id="cbbGuest" placeholder="Guest">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="full-name">Full Name</label>-->
                                        <input type="text" class="form-control" name="cbbChildren" id="cbbChildren" placeholder="Children Not more than 12 years old">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="full-name">Full Name</label>-->
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="email">E-mail</label>-->
                                        <input type="text" class="form-control" id="txemail" name="txemail" placeholder="E-mail">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="subject">Phone</label>-->
                                        <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
                                    </div>
                                    <div class="mg-contact-form-input">
                                        <!--<label for="subject">Message</label>-->
                                        <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
                                    </div>
                                    <input type="button" onClick="prop_contact()" class="btn btn-dark-main pull-right" value="Send">
                                </form>
                                <div class="footbox"></div>
						</div>
                        
                        
                        
                        
					</div>
				</div>
                
                <script>
                function prop_contact()
				{
					if($("#full_name").val()=='')
					{
						alert("Please fill your data");
						$("#full_name").focus();
						return false;
					}
					else if($("#txemail").val()=='')
					{
						alert("Please fill your data");
						$("#txemail").focus();
						return false;
					}
					else if($("#txsubject").val()=='')
					{
						alert("Please fill your data");
						$("#txsubject").focus();
						return false;
					}
					else if($("#txmessage").val()=='')
					{
						alert("Please fill your data");
						$("#txmessage").focus();
						return false;
					}
					else if($("#cbbGuest").val()=='0')
					{
						alert("Please fill your data");
						$("#cbbGuest").focus();
						return false;
					}
					else if($("#cbbChildren").val()=='0')
					{
						alert("Please fill your data");
						$("#cbbChildren").focus();
						return false;
					}
					else if($("#checkin").val()=='')
					{
						alert("Please fill your data");
						$("#checkin").focus();
						return false;
					}
					else if($("#checkout").val()=='')
					{
						alert("Please fill your data");
						$("#checkout").focus();
						return false;
					}
					else
					{
						var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
						if(!document.getElementById("txemail").value.match(Email))
						{
						   alert('Email format is not valid');
						   document.getElementById("txemail").focus();
						   return false;
						}
						else
						{
							$.ajax({
								url:"libs/actions/action-property-contact.php",
								type:"POST",
								dataType:"json"	,
								data:$("#form_contact").serialize(),
								success: function(res){
									if(res.status==true)
									{
										alert(res.msg);
										window.location.reload();
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
                </script>
                
                
                <div class="row">
					<div class="col-md-8">
                       
                        <div class="col-md-12">
                            <br><br><br>
                        </div> 
                    </div>
                    <div class="col-md-4">
                    	<div class="col-md-12">
                        </div>
                    </div>
                    
                    
                    
                    
<style>
   #map {
	height: 400px;
	width: 100%;
   }
</style>
<script>
      function initMap() {
        var uluru = {lat:<?php echo $room['latitude'];?>, lng: <?php echo $room['longtitude'];?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: uluru,
		  scrollwheel: false,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
                    
                  <div class="col-md-8">
                        <h2 class="mg-sec-left-title">GOOGLE MAP</h2>
                        <div class="row">
                            <div id="map"></div>

                        </div>
                        
                        
                        
                        
                       
  
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                        <br><br><br>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                            
                             <?php 
							 	$opt = array();
								$aa=0;
                                    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                                    {
                                        $prop = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
                                        $data = json_decode($prop['val'],true);
                                        foreach($data as $valu)
                                        {
											if($valu['val1']!='')
											{
												//echo "1";
												if($aa==0)
												{
													array_push($opt,"1");
												}
											}
											if($valu['val2']!='')
											{
												//echo "2";
												if($aa==0)
												{
													array_push($opt,"2");
												}
											}
											if($valu['val3']!='')
											{
												//echo "3";
												if($aa==0)
												{
													array_push($opt,"3");
												}
											}
											if($valu['val4']!='')
											{
												//echo "4";
												if($aa==0)
												{
													array_push($opt,"4");
												}
											}
											if($valu['val5']!='')
											{
												//echo "5";
												if($aa==0)
												{
													array_push($opt,"5");
												}
											}
											if($valu['val6']!='')
											{
												//echo "6";
												if($aa==0)
												{
													array_push($opt,"6");
												}
											}
											if($valu['val7']!='')
											{
												//echo "7";
												if($aa==0)
												{
													array_push($opt,"7");
												}
											}
											if($valu['val8']!='')
											{
												//echo "8";
												if($aa==0)
												{
													array_push($opt,"8");
												}
											}
											
											
											$aa++;
										}
									}
									
							?>
                            
                            
                            
                            
                            
                            
                            <div class="col-md-5 nopad">
                            <div class="mg-contact-form-input ">
                                
                                <select name="cbbPrice" id="cbbPrice" class="form-control ">
									<?php
									$ii=0;
                                    foreach($opt as $op)
                                    {
										if($ii==0)
										{
											 echo '<option value="'.$op.'" class="first">'.$op.' Bedroom</option>';
										}
										else
										{
											 echo '<option value="'.$op.'">'.$op.' Bedroom</option>';
										}
                                       
                                    }
                                    ?>
                                </select>
                                <br>
                                <?php
								if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
								{
									$pri = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
								}
									?>
                                Rate:
                                Currency: USD - Rate subject to <?php echo $pri['tax'];?>% service charge, taxes, etc
                                Refundable security deposit of $<?php echo number_format($pri['deposite'],2);?> USD is required in any currency upon check-in
                            </div>
                                <div class="table-responsive">
                                    <table id="tb" class="tb table table-bordered" width="100%" border="1">
                                        <thead>
                                            <tr>
                                                <th>Season Dates</th>
                                                <th>Nights</th>
                                                <th class="t1 tbp">1 Room</th>
                                                <th class="t2 tbp">2 Room</th>
                                                <th class="t3 tbp">3 Room</th>
                                                <th class="t4 tbp">4 Room</th>
                                                <th class="t5 tbp">5 Room</th>
                                                <th class="t6 tbp">6 Room</th>
                                                <th class="t7 tbp">7 Room</th>
                                                <th class="t8 tbp">8 Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                                        {
                                            $properties = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
                                            $data = json_decode($properties['val'],true);
                                            foreach($data as $valu)
                                            {
                                                
                                                echo '<tr>
                                                    <td>'.$valu['date1'].' - '.$valu['date2'].'</td>';
                                                   echo '<td>'.$valu['night'].'</td>';
                                                    echo '<td class="t1 tbp"> USD ';echo ($valu['val1']!='')?$valu['val1']:' 0 '.'</td>';
                                                    echo '<td class="t2 tbp"> USD ';echo ($valu['val2']!='')?$valu['val2']:' 0 '.'</td>';
                                                    echo '<td class="t3 tbp"> USD ';echo ($valu['val3']!='')?$valu['val3']:' 0 '.'</td>';
                                                    echo '<td class="t4 tbp"> USD ';echo ($valu['val4']!='')?$valu['val4']:' 0 '.'</td>';
                                                    echo '<td class="t5 tbp"> USD ';echo ($valu['val5']!='')?$valu['val5']:' 0 '.'</td>';
                                                    echo '<td class="t6 tbp"> USD ';echo ($valu['val6']!='')?$valu['val6']:' 0 '.'</td>';
                                                    echo '<td class="t7 tbp"> USD ';echo ($valu['val7']!='')?$valu['val7']:' 0 '.'</td>';
                                                    echo '<td class="t8 tbp"> USD ';echo ($valu['val8']!='')?$valu['val8']:' 0 '.'</td>';
                                                    
                                                echo '</tr>';
                                            }
                                        }
                                        
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>   
                    
                </div>
                

				
			</div>
		</div>
        


<!-- Modal -->
<div class="modal fade" id="myModal_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_sendblog">
      	<input type="hidden" class="form-control" id="tx_id" name="tx_id" value="<?php echo $room['id'];?>">
        <input type="hidden" class="form-control" id="tx_name" name="tx_name" value="<?php echo $room['name'];?>">
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="email" class="form-control" id="txemail_p" name="txemail_p" placeholder="E-mail">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail_p()">Send</button>
      </div>
    </div>
  </div>
</div>
<script src="libs/js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(e) {
	$(".tbp").hide();
	$("#cbbPrice").change();
	var tb = $(".first").val();
	$(".t"+tb).show();
	
    $("#cbbPrice").change(function(e) {
        var vals = $(this).val();
		$(".tbp").hide();
		$(".t"+vals).show();
		//alert(vals);
    });
});

function popemail()
{
	$("#myModal_email").modal('show');
}
function sendemail_p()
{
	if($("#txemail_p").val()=='')
	{
		alert("Please fill your data");
		$("#txemail_p").focus();
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("txemail_p").value.match(Email))
		{
		   alert('Email format is not valid');
		   document.getElementById("txemail_p").focus();
		   return false;
		}
		else
		{
			$.ajax({
				url:"libs/actions/action-send-email-prop.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_sendblog").serialize(),
				success: function(res){
					if(res.status==true)
					{
						alert(res.msg);
						window.location.reload();
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
</script>

<script>
function visitto(posi)
{
        $('html,body').animate({ 
			scrollTop: $("#"+posi+"").offset().top-200
		}, 1000);
}

$(document).ready(function(e) {
	 $('.btt').tooltip();
});

</script>


<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> 
<script>
function onShare(idp,title,desc,image)
{
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '154995321670128',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  		FB.ui({
 			  method: 'feed',
			  name: title,
			  link: 'http://inspiringvillas.creativeyour.com/?page=propertydetail&id='+idp,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'http://inspiringvillas.creativeyour.com/'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=154995321670128";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>      



<script>
$(document).ready(function(e) {
    
var tig=false;
$(function () {
	var boxcon = $(".box").offset().top;
	var footer = $(".mg-footer").offset().top;//หาความสูงของ footer จาก top
	
	$(window).scroll(function () {
		
		
		
		wheight = $(this).height();
		foohight = ($('.mg-footer').height()/2);
		slideH = $('.box').height();
		foo = $(".foo").offset().top;
		footheight = $(".mg-footer").height();
		
		if($(this).width()>=992)
		{
			if($(this).scrollTop() > boxcon && $(this).scrollTop() < (foo-footheight))
			{
				$(".box").css({"position":"fixed ","overflow-y":"hidden","margin-top":"0px"},300);
			}
			else if($(this).scrollTop() < boxcon && $(this).scrollTop() < (foo-footheight))
			{
				$(".box").css({ "position":"relative ","z-index":"100","height":"auto","overflow":"hidden"});
			}
			
				
		}
		
		var footbox = $(".footbox").offset()
		
		if($(this).scrollTop() > (foo-wheight))//if($(this).scrollTop() >= (foo-wheight) )
		{
			boxtop = $(".box").offset().top;
			$(".box").css({"overflow-y":"scroll","height":(foohight-20)+"px"},300);//,"height":(foohight)+"px"
		}
		else
		{
			$(".box").css({"z-index":"100","overflow":""});
		}
	
		
		
	});
	
	
	
	
});
});
</script>
