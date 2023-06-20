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
/*.mg-sec-left-title,
.mg-widget-title {
  font-family: "Playfair Display", serif;
  color: #16262e;
  font-size: 25px;
   text-transform: inherit !important\; 
  font-weight: 400;
  margin: 0 0 35px;
  padding-bottom: 15px;
  position: relative;
}*/
.mg-sec-left-title:after, .mg-widget-title:after {
    content: '';
    display: block;
    width: 80px;
    height: 1px;
    background-color: #d3a267;
    position: absolute;
    bottom: 0;
    left: 0;
    margin-top: -15px;
    top: 43px;
}
.mg-room-fecilities
{
	padding: 5px 15px 5px 15px;
}
.btn-main:hover {
  background-color: #ff8d4b;
  border-color: #ff8d4b;
  color: #fff;
}
.btn-dark-main {
  color: #FFF;
  background-color: #f05b46;
  border-color: #16262e;
  width: 100%;
}
.btn-dark-main:hover {
  background-color: #f78474;
  border-color: #e7b315;
  color: #fff;
}
 ul li
{
	font-family:pr;
	list-style:none;
}
ul li img.chk
{
	margin-left: -29px;
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
//$sql_cover = $dbc->Query("select * from cover where page='forrent' AND status > 0");
$sql_cover = $dbc->Query("select * from properties where id='".$_REQUEST['id']."' AND status > 0");
$cover = $dbc->Fetch($sql_cover);
//$cover = $dbc->GetRecord("cover","*","page='forrent' AND status > 0");
$photo_cov = json_decode($cover['cover'],true);
if(count($photo_cov) <='0')
{
	$photo_cover = "../../../../files/cover.jpg";
}
else
{
	$photo_cover = json_decode($cover['cover'],true);
}
?>

<div class="mg-page-titles web"><!--parallax-->
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
//$room = $dbc->GetRecord("properties","*","id=".$id);//.$_REQUEST['id']);
$sql_room = $dbc->Query("select * from properties where id=".$id);//.$_REQUEST['id']);
$room = $dbc->Fetch($sql_room);//.$_REQUEST['id']);
function tag($id)
{
	global $dbc;
	if($id !='')
	{
		//$tags = $dbc->GetRecord("tags","*","id=".$id);
		$sqltags = $dbc->Query("select * from tags where id=".$id);
		$tags = $dbc->GetRecord("tags","*","id=".$id);
	}
	else
	{
		$tags['name'] = '';
	}
	return '<button class="btn_tag">'.$tags['name'].'</button>';
}

?>
<style>
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
     background-position: 50% !important; 
   /* color: #fff;
    text-align: center;
    height: 600px;*/
    /* background: red; */
}

.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background: rgba(0, 0, 0, 0.59);
}
.mg-single-room-txt {
  padding: 0px 0px 0px 0px;
}
button.btn {
    font-family: fontProxima Nova88279 !important;
    border-radius: 100%;
    height: 45px;
    width: 45px;
    margin-right: -2px;
    padding: 0px;
}
.mg-sec-left-title, .mg-widget-title {
    font-family: "Playfair Display", serif;
    color: #16262e;
    font-size: 20px;
    /* text-transform: uppercase; */
    font-weight: 400;
    /* margin: 0 0 35px; */
    padding-bottom: 15px;
    position: relative;
    font-weight: bold;
}
</style>
<div class="mg-page-title mobi"></div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="libs/js/jquery-3.1.1.min.js"></script>
<style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
.box
{
	top:0px;
}
</style>



<script>
$(document).ready(function() {
    $('#checkin,#checkout,#checkin_mo,#checkout_mo')
        .datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });


});
</script>                        
                                      

<!-- Large modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lgs">Large modal</button>-->

<div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document"  data-scroll-scope="force" >
    <div class="modal-content cont">
      <?php include "libs/pages/slide_photo.php";?>
    </div>
  </div>
</div>

<div class="bgphotos "  ></div>
<div class="backphoto "  data-scroll-scope="force">
	
</div>

<div class="mg-single-room-price">
			<div class="mg-srp-inner"><font size="-1">From</font><br>$<?php echo $room['price'];?><span>/Night</span></div>
		</div>
		<div class="mg-single-room">
			<div class="container">
				<div class="row">
                <div class="col-md-12">
                    
                    </div>
					<div class="col-md-7">
                    	<h2 style="margin-bottom:-5px;"><?php echo $room['name'];?></h2>
                        <?php echo base64_decode($room['brief'],true);?><br>
						<div class="mg-gallery-container">
							<ul class="mg-gallery" id="mg-gallery" >
                            <?php 
							$slide = json_decode($room['photo'],true);
							foreach($slide as $img)
							{
								echo '<li data-toggle="modal" data-target=".bs-example-modal-lgs"><img src="'.$img['img'].'" alt="Partner Logo" width="100%">'.tag($room['tag']).'</li>';
							}
							?>
                            
                            </ul>
                            <!--<div class="col-md-12 nopad"><button class="btview pull-right" data-toggle="modal" data-target=".bs-example-modal-lgs">View</button></div>-->
						</div>
					</div>
                    
					<div class="col-md-5 mg-room-fecilities padl50">
                    <div class="mg-single-room-txt    web" id="style-3" style="margin-top:0px; ">
                            <div class="col12 enbox box">
                                <h2 class="mg-sec-left-titles enti"><center>Enquire Now</center></h2>
                                    <form id="form_contact" class="clearfix">
                                        <input type="hidden" name="txtID" value="<?php echo $room['id'];?>">
                                        <div class="mg-contact-form-input col-md-6 nopad" style="padding-right:5px;">
                                            <label for="full-name"><!--Check In--></label>
                                            <input type="text" class="form-control ip" id="checkin" name="checkin" placeholder="Check In*">
                                            <button class="butides"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="mg-contact-form-input col-md-6 nopad" style="padding-left:5px;"><!-- -->
                                            <label for="full-name"><!--Check Out--></label>
                                            <input type="text" class="form-control ip required" id="checkout" name="checkout" placeholder="Check Out*">
                                            <button class="butides r"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                        </div>
                                        
                                        <div class="mg-contact-form-input col6 nopad" style="padding-right:5px;"> 
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" name="cbbGuest" id="cbbGuest" placeholder="No. of Adults*">
                                        </div>
                                        <div class="mg-contact-form-input col6 nopad" style="padding-left:5px;"><!--col-md-6 nopad-->
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" name="cbbChildren" id="cbbChildren" placeholder="No. of Children* ( < 12 yrs old )">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" id="full_name" name="full_name" placeholder="Full Name*">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="email">E-mail</label>-->
                                            <input type="text" class="form-control ip" id="txemail" name="txemail" placeholder="E-mail*">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="subject">Phone</label>-->
                                            <input type="text" class="form-control ip" id="txsubject" name="txsubject" placeholder="Phone Number (optional)">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="subject">Message</label>-->
                                            <textarea class="form-control ip" id="txmessage" name="txmessage" rows="5" placeholder="Message (optional)"></textarea>
                                        </div>
                                        <input type="button" onClick="prop_contact()" class="btn btn-dark-main " style="font-family:pr;" value="Send">
                                    </form>
                                    <br>
                                    
                                   
                                            
                                    <div class="footbox"></div>
                                    
                            </div>
                            <br>
                             <div class="sp"><center>Speak to our villa expert: +66 84 677 1551</center></div><br>
                                <div class="butto">
                            	SHARE : 
                                    <a><button class="btn btn-main btt" onClick="visitto('tb');" data-toggle="tooltip"  data-placement="bottom" title="Price">$</button></a>
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
                                <br>
                                <div class="whychoose">
                                	<img src="../../files/Why Choose Us Box.png" width="100%">
                                </div>
                            </div>
                    
                   		
						<?php /*?><div class="row">
                        	<div class="col-md-12 f16">
                            <h2 class="mg-sec-left-title"><?php echo $room['name'];?></h2>
                            <?php echo base64_decode($room['brief'],true);?><br>
                            <strong>Price Range : </strong><?php echo ($room['price_range']!='')?$room['price_range']:'-';?>
                            </div>
                        	<br><br>
						</div><?php */?>
                        
						<!--<br>-->
						<!--<h2 class="mg-sec-left-title">Room Facilities</h2>-->
						<?php /*?><div class="row">
							
								<?php 
								$room_fac = $dbc->Query("select * from property_icon where property = '".$id."' ");
								$count_fac = $dbc->GetCount("property_icon"," property = '".$id."'");
								//echo $count_fac;
								$total_fac = intval($count_fac/2);
								//echo $total_fac;
								$c=0;
								while($r_fac = $dbc->Fetch($room_fac))
								{
									$c++;
									if($c<=6)
									{
										//$icon = $dbc->GetRecord("icons","*","id=".$r_fac['icon']);
										$sqlicon = $dbc->Query("select * from icons where id=".$r_fac['icon']);
										$icon = $dbc->Fetch($sqlicon);
										//echo json_decode($icon['icon'],true);
										//echo round($total_fac);
										echo '<div class="col-xs-12 col-md-6">';
											echo '<ul>';
												echo '<li><img src="'.json_decode($icon['icon'],true).'" class="micon"> '.$icon['name'].'  </li>';
											echo '</ul>';
										echo '</div>';
									}
								}
								?>
						</div><?php */?>
                        
                       <?php /*?> <div class="butto">
                        
                        <a><button class="btn btn-main btt" onClick="visitto('tb');" data-toggle="tooltip"  data-placement="bottom" title="Price">$</button></a>
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
                        
                        </div><?php */?>
					</div>
				</div>
                
               
                
				<div class="row">
					<div class="col-md-7">
                    	
                        
						<div class="mg-single-room-txt">
							<h2 class="mg-sec-left-title" style="    padding-bottom: 0px;"> Overview Description </h2>
                            	<p class="f16"><?php echo base64_decode($room['detail']);?></p>
						</div>
                        
                        <div class="col-md-12 mg-room-fecilities ">
                            <h2 class="mg-sec-left-title l15">Featured Facilities </h2>
                            <div class="row bggray" >
                            <div class="col-md-12 nopad ">
                            <?php 
								$a=0;
								foreach(json_decode($room['features']) as $fea)
								{
									//$icon_fea = $dbc->GetRecord("icons","*","id=".$fea);
									$sqlicon_fea = $dbc->Query("select * from icons where id=".$fea);
									$icon_fea = $dbc->Fetch($sqlicon_fea);
									echo '<div class="col-xs-12 col-md-4">';
										echo '<ul class="bedr">';
											echo '<li><img src="'.json_decode($icon_fea['icon'],true).'" class="micon"> '.$icon_fea['name'].'  </li>';
										echo '</ul>';
									echo '</div>';
									$a++;
									if(($a%3)==0)
									{
										echo '</div><div class="col-md-12 nopad">';
									}
									
								}
							?>
                            </div>  
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                        	<br>
                        </div>
                        
                        <div class="col-md-12 mg-room-fecilities ">
                            <h2 class="mg-sec-left-title l15">Bedroom Facilities</h2>
                            <div class="row bggray">
                            <div class="col-md-12 nopad">
                            <?php 
								$b=0;
								foreach(json_decode($room['bedfac']) as $bedr)
								{
									//$icon_bed = $dbc->GetRecord("icons","*","id=".$bedr);
									$sqlicon_bed = $dbc->Query("select * from icons where id=".$bedr);
									$icon_bed = $dbc->Fetch($sqlicon_bed);
									echo '<div class="col-xs-12 col-md-4">';
										echo '<ul class="bedr">';
											echo '<li><img src="'.json_decode($icon_bed['icon'],true).'" class="micon"> '.$icon_bed['name'].'  </li>';
										echo '</ul>';
									echo '</div>';
									$b++;
									if(($b%3)==0)
									{
										echo '</div><div class="col-md-12 nopad">';
									}
								}
							?>
                               
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<br>
                        </div>
                       <!-- <div class="col-md-12">
                        	<br><br>
                        </div>-->
                        <div class="col-md-12 mg-room-fecilities ">
                            <h2 class="mg-sec-left-title l15">Appliances</h2>
                            <div class="row bggray">
                               <div class="col-md-12 nopad">
                            	<?php 
								$c=0;
									foreach(json_decode($room['appliances']) as $appl)
									{
										//$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
										$sqlicon_app = $dbc->Query("select * from icons where id=".$appl);
										$icon_app = $dbc->Fetch($sqlicon_app);
										echo '<div class="col-xs-12 col-md-4">';
											echo '<ul class="bedr">';
												echo '<li><img src="'.json_decode($icon_app['icon'],true).'" class="micon"> '.$icon_app['name'].'  </li>';
											echo '</ul>';
										echo '</div>';
										$c++;
									if(($c%3)==0)
									{
										echo '</div><div class="col-md-12 nopad">';
									}
								}
							?>
                               
                            </div>
                            </div>
                        </div>
                        
                        <?php 
						if(count(json_decode($room['address_map'],true))<=0)
						{
						}
						else
						{
							?>
                            <div class="col-md-12">
                                <br>
                            </div>
                            <div class="col-md-12 mg-room-fecilities ">
                                <h2 class="mg-sec-left-title l15">Address Map</h2>
                                <div class="row">
                                    <?php 
                                        foreach(json_decode($room['address_map']) as $appl)
                                        {
                                            //$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
                                            $sqlicon_app = $dbc->Query("select * from icons where id=".$appl);
                                            $icon_app = $dbc->Fetch($sqlicon_app);
                                            echo '<div class="col-xs-12 col-md-6">';
                                                echo '<ul class="bedr">';
                                                    echo '<li> '.$icon_app['name'].'  </li>';
                                                echo '</ul>';
                                            echo '</div>';
                                            
                                        }
                                    ?>
                                </div>
                                </div>
                            <?php
						}
						?>
                            
                        
                        
					</div>
                    <div class="col-md-5 padl50"><!--<br><br>-->
                    	<!--<h2 class="mg-sec-left-title">Our Services</h2>
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
                            </div>-->
						<!--<div class="col-md-12">	-->
                            
                        <!--</div>-->
                        
                        
                        
                        
					</div>
				</div>
                
                
                
                
                <div class="row">
					
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                            
                             <?php 
							 	$opt = array();
								$aa=0;
                                    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                                    {
                                        //$prop = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
										$sqlprop = $dbc->Query("select * from pricing where property=".$_REQUEST['id']);
										$prop = $dbc->Fetch($sqlprop);
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
											if($valu['val9']!='')
											{
												//echo "8";
												if($aa==0)
												{
													array_push($opt,"9");
												}
											}
											if($valu['val10']!='')
											{
												//echo "8";
												if($aa==0)
												{
													array_push($opt,"10");
												}
											}
											
											
											$aa++;
										}
									}
									
									/*echo '<pre>';
									print_r ($opt);
									echo '</pre>';*/
							?>
                            
                            
                            
                            
                            
                            
                            <div class="col-md-7 nopad">
                            <div class="mg-contact-form-input ">
                                <!--<label for="full-name">Full Name</label>-->
                                
                                <?php /*?><select name="cbbPrice" id="cbbPrice" class="form-control ">
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
                                </select><?php */?>
                                
                                <!--<br>-->
                                <?php
								function months($data)
								{
									$y = substr($data,0,4);
									$m = substr($data,5,2);
									$d = substr($data,8,2);
									switch($m)
									{
										case'01':  $month = 'Jan';break;
										case'02':  $month = 'Feb';break;
										case'03':  $month = 'Mar';break;
										case'04':  $month = 'Apr';break;
										case'05':  $month = 'May';break;
										case'06':  $month = 'Jun';break;
										case'07':  $month = 'Jul';break;
										case'08':  $month = 'Aug';break;
										case'09':  $month = 'Sep';break;
										case'10':  $month = 'Oct';break;
										case'11':  $month = 'Nov';break;
										case'12':  $month = 'Dec';break;
									}
									return  $d.'-'.$month .'-'.$y;
								}
								if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
								{
									$pri = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
								}
									?>
                                <style>
                                .rate > .mg-sec-left-title:after,.rate > .mg-widget-title:after {
									content: '';
									display: block;
									width: 49px;
									height: 1px;
									background-color: #d3a267;
									position: absolute;
									bottom: 0;
									left: 0;
									margin-top: -15px;
									top: 43px;
								}
								.table-striped>tbody>tr:nth-of-type(odd) {
									background-color: #ffffff;
								}
								.table-striped>tbody>tr{
									background-color: #eee;
								}
                                </style>
                                 <div class="rate"><h2 class="mg-sec-left-title" style="    padding-bottom: 05px;">Rental  Rate</h2></div>
                                 
                                 
                                 
                                
                            </div>
                                <div class="table-responsive">
                                
                                <?php
									$ii=0;
									$va = 0;
									//print_r($opt);
                                    foreach($opt as $op)
                                    {
										if($ii==0)
										{
											 $va = $op;
											 echo '<button class="tabbut acct" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'" class="first">'.$op.' Bedroom</option>
										}
										else
										{
											 echo '<button class="tabbut" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'">'.$op.' Bedroom</option>
										}
                                       $ii++;
                                    }
                                    ?>
                                    <table id="tb" class="tb table table-bordered table-striped" width="100%" border="1">
                                        <thead>
                                            <tr>
                                                <th>Period Dates</th>
                                                <th class="text-center" align="center">Min Night Stay</th>
                                                <th class="t1 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t2 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t3 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t4 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t5 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t6 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t7 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t8 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t9 tbp text-center" align="center"> Price Per Night (USD)</th>
                                                <th class="t10 tbp text-center" align="center"> Price Per Night (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                                        {
                                            //$properties = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
											$sqlproperties = $dbc->Query("select * from pricing where property=".$_REQUEST['id']);
											$properties = $dbc->Fetch($sqlproperties);
                                            $data = json_decode($properties['val'],true);
                                            foreach($data as $valu)
                                            {
                                                
                                                echo '<tr>
                                                    <td>'.months($valu['date1']).' - '.months($valu['date2']).'</td>';
                                                   echo '<td class="text-center">'.$valu['night'].'</td>';
                                                    echo '<td class="t1 tbp text-center">';echo ($valu['val1']!='')?$valu['val1']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t2 tbp text-center">';echo ($valu['val2']!='')?$valu['val2']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t3 tbp text-center">';echo ($valu['val3']!='')?$valu['val3']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t4 tbp text-center">';echo ($valu['val4']!='')?$valu['val4']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t5 tbp text-center">';echo ($valu['val5']!='')?$valu['val5']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t6 tbp text-center">';echo ($valu['val6']!='')?$valu['val6']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t7 tbp text-center">';echo ($valu['val7']!='')?$valu['val7']:' 0 ';echo ' ++ </td>';
                                                    echo '<td class="t8 tbp text-center">';echo ($valu['val8']!='')?$valu['val8']:' 0 ';echo ' ++ </td>';
													echo '<td class="t9 tbp text-center">';echo ($valu['val9']!='')?$valu['val9']:' 0 ';echo ' ++ </td>';
													echo '<td class="t10 tbp text-center">';echo ($valu['val10']!='')?$valu['val10']:' 0 ';echo ' ++ </td>';
                                                    
                                                echo '</tr>';
                                            }
                                        }
                                        
                                        ?>
                                        </tbody>
                                    </table>
                                    
                                    <span style="font-family:pr;"><strong>Note:</strong> </span><br>
                                    <?php 
                                        if( $pri['tax']!='')
                                        {
                                            //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
											echo '<span style="font-family:pt;">- Rate subject to '.$pri['tax'].'% service charge, taxes, etc.</span><br>';
                                        }
                                        
                                        if( $pri['deposite']!='')
                                        {
                                            //echo ' Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in';
											echo '<span style="font-family:pt;">- Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in</span>';
                                        }
                                    ?>
                               		
                               		
                                    
                                	
									<?php
                                    
                                    //-- discount
                                     if($pri['early_percent']!='' && $pri['early_day']!='' || $pri['last_percent']!='' )
                                     {
                                         echo '<div class="col-md-12 mg-room-fecilities ">';
                                            echo '<h2 class="mg-sec-left-title l15">Discount</h2>';
                                            echo '<div class="rows ">';
                                               echo '<div class="col-md-12 ">';
                                                     echo '<ul  class="bedr">';
                                                    if($pri['early_percent']!='' && $pri['early_day']!='')
                                                    {
                                                        echo '<li><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$pri['early_percent'].' discount when booking '.$pri['early_day'].' days in advance.</li>';
                                                    }
                                                        
                                                    if($pri['last_percent']!='' || $pri['last_date']!='0000-00-00')
                                                    {
                                                        echo '<li><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$pri['last_percent'].' discount when checking in before '.months($pri['last_date']).'</li>';
                                                    }
                                                        
                                                    echo '</ul>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                     }
                                     //-- discount
								 
								 
								 
								 
								 
									 //-- promotion
									if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='' ||
									$pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='' && $pri['pr_to']!='' ||
									$pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='' &&
									$pri['ps_to']!='' ||  $pri['psp_offer']!='' && $pri['psp_fron']!='' && $pri['psp_to']!=''  )
									{  
										echo '<div class="col-md-12 mg-room-fecilities ">';
											echo '<h2 class="mg-sec-left-title l15">Promotion</h2>';
											echo '<div class="rows ">';
											   echo '<div class="col-md-12 ">';
													echo '<ul class="bedr">';
														if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='')
														{
															echo '<li><img src="../../files/check.png" width="20" class="chk"> Get/Enjoy/Receive '.$pri['p_discount'].' % discount for min '.$pri['p_night'].' nights booking for travel period between '.months($pri['p_from']).' to '.months($pri['p_to']).'.</li>';
														}
															
														if($pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='0000-00-00' && $pri['pr_to']!='0000-00-00')
														{
															echo '<li><img src="../../files/check.png" width="20" class="chk"> Get/Enjoy/Receive '.$pri['pr_discount'].' % discount and FREE '.months($pri['pr_free']).' , for booking stay between '.months($pri['pr_from']).' to '.months($pri['pr_to']).'.</li>';
														}
														
														if($pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='0000-00-00' && $pri['ps_to']!='0000-00-00')
														{
															echo '<li><img src="../../files/check.png" width="20" class="chk">  Stay/book '.$pri['ps_book'].' nights and pay '.$pri['ps_pay'].' nights. This promotion is applicable to '.$pri['ps_applicetion'].' villa occupancy booking travelling between '.months($pri['ps_from']).' to '.months($pri['ps_to']).'.</li>';
														}
															
														if($pri['psp_offer']!=''  && $pri['psp_fron']!='0000-00-00' && $pri['psp_to']!='0000-00-00')
														{
															echo '<li><img src="../../files/check.png" width="20" class="chk"> Special offer FREE '.$pri['psp_offer'].' for booking stay between '.months($pri['psp_fron']).' to '.months($pri['psp_to']).'.</li>';
														}
														
														echo '</ul>';
														echo 'Remark: Availability and conditions apply, please inquire with reservation. Promotion is only valid to new reservation after the start of the promotion. Not valid with any other discount and promotions combined.';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
									//-- promotion
									 ?>
                                   
                                </div>
                            </div>
                            
                            <div class="mg-single-room-txt box enbox mobi" id="style-3" style="margin-top:-10px; ">
                                <h2 class="mg-sec-left-titles enti"><center>Enquire Now</center></h2>
                                    <form id="form_contact_mobi" class="clearfix">
                                        <input type="hidden" name="txtID" value="<?php echo $room['id'];?>"><br>
                                        <div class="mg-contact-form-input col-sm-12 nopad" >
                                           <!-- <label for="full-name">Check In</label>-->
                                            <input type="text" class="form-control ip iip" id="checkin_mo" name="checkin" placeholder="Check In*">
                                            <button class="buti"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                        </div>

                                        <div class="mg-contact-form-input col-sm-12 nopad" ><!-- -->
                                           <!-- <label for="full-name">Check Out</label>-->
                                            <input type="text" class="form-control ip" id="checkout_mo" name="checkout" placeholder="Check Out*">
                                            <button class="buti"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                        </div>
                                        
                                        <div class="mg-contact-form-input col-sm-12 nopad" > 
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" name="cbbGuest" id="cbbGuest_mo" placeholder="No. of Adults*">
                                        </div>
                                        <div class="mg-contact-form-input col-sm-12 nopad" ><!--col-md-6 nopad-->
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" name="cbbChildren" id="cbbChildren_mo" placeholder="No. of Children* ( < 12 yrs old )">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="full-name">Full Name</label>-->
                                            <input type="text" class="form-control ip" id="full_name_mo" name="full_name" placeholder="Full Name*">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="email">E-mail</label>-->
                                            <input type="text" class="form-control ip" id="txemail_mo" name="txemail" placeholder="E-mail*">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="subject">Phone</label>-->
                                            <input type="text" class="form-control ip" id="txsubject_mo" name="txsubject"  placeholder="Phone Number (optional)">
                                        </div>
                                        <div class="mg-contact-form-input">
                                            <!--<label for="subject">Message</label>-->
                                            <textarea class="form-control ip" id="txmessage_mo" name="txmessage" rows="5" placeholder="Message (optional)"></textarea>
                                        </div>
                                        <input type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right" value="Send">
                                    </form>
                                    <br>
                                    
                                    <div class="footbox"></div>
                            </div>
                            <div class="sp2 mobi"><center>Speak to our villa expert: +66 84 677 1551</center></div>
                            
                            
                            <div class="col-md-7 nopad">
                            
                            <div class="col-md-12 mg-room-fecilities ">
                                <h2 class="mg-sec-left-title l15">Bedroom Configuration</h2>
                                <div class="row bggray">
                                   <div class="col-md-12 ">
                                    	 <ul class="bedr">
                                          <?php 
											$bed = json_decode($room['bed'],true);
											if($bed!='')
											{
												foreach($bed as $val)
												{
													echo '<li><strong>'.$val['title'].'</strong> - '.$val['detail'].'</li>';
												}
											}
											?>
                                          </ul>
                                	</div>
                                </div>
                            </div>
                        	
                            <?php
							$vdo = base64_decode($room['vdo'],true);
							if($vdo!='')
							{
								?>
                                <div class="col-md-12 nopad mg-room-fecilities ">
                                	<h2 class="mg-sec-left-title">Video</h2>
                                    <div class="row">
                                    	<iframe src="https://player.vimeo.com/video/<?php echo base64_decode($room['vdo'],true);?>?color=ffffff&title=0&byline=0&portrait=0" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    	
                                    </div>
                                </div>
                                <?php
							}
							?>
                                
                                
                                
                                <style>
									.swiper-container {
										width: 100%;
										height: 100%;
										padding: 15px 0px 15px 0px;
									}
									.swiper-slide {
										/*text-align: center;*/
										font-size: 18px;
										/*background: #fff;
										 Center slide text vertically */
										display: -webkit-box;
										display: -ms-flexbox;
										display: -webkit-flex;
										display: flex;
										-webkit-box-pack: center;
										-ms-flex-pack: center;
										-webkit-justify-content: center;
										justify-content: center;
										-webkit-box-align: center;
										-ms-flex-align: center;
										-webkit-align-items: center;
										align-items: center;
										font-size:14px;
									}
									.swiper-container-horizontal>.swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction {
										bottom: -5px;
										left: 0;
										width: 100%;
									}
									</style>
                                    <link rel="stylesheet" href="libs/css/swiper.css">
                                    
                                    
                                    <div class="col-md-12 mg-room-fecilities ">
                                        <h2 class="mg-sec-left-title l15">Villas Reviews</h2>
                                        <div class="row bggray">
                                           <div class="col-md-12 ">
                                                 <!-- Swiper -->
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">
                                                        <?php
														function dateType2($data)
														{
															$y = substr($data,0,4);
															$m = substr($data,5,2);
															$d = substr($data,8,2);
															switch($m)
															{
																case'01':  $month = 'Jan';break;
																case'02':  $month = 'Feb';break;
																case'03':  $month = 'Mar';break;
																case'04':  $month = 'Apr';break;
																case'05':  $month = 'May';break;
																case'06':  $month = 'Jun';break;
																case'07':  $month = 'Jul';break;
																case'08':  $month = 'Aug';break;
																case'09':  $month = 'Sep';break;
																case'10':  $month = 'Oct';break;
																case'11':  $month = 'Nov';break;
																case'12':  $month = 'Dec';break;
															}
															return  $month .'  '.$y;
														}
														
														$sql_rate = $dbc->Query("select * from rating where property = '".$room['id']."'");
														while($rate = $dbc->Fetch($sql_rate))
														{
															 echo '<div class="swiper-slide text-left">';
                                                                echo '<i class="fa fa-quote-left" aria-hidden="true" style="color: #f05b46;"></i> ';
                                                                    echo '&nbsp;&nbsp;&nbsp;';
																	echo '<div class="col-md-12">'.base64_decode($rate['text'],true);
																	echo '<br>';
																	for($a=0;$a<$rate['rate'];$a++)
																	{
																		echo '<i class="fa fa-star" aria-hidden="true" style="color: #f05b46;"></i>';
																	}
																	echo '&nbsp;&nbsp;'.$rate['name'].'&nbsp;'.dateType2($rate['created']);
																	echo '</div>';
                                                                echo '&nbsp;&nbsp;&nbsp;<i class="fa fa-quote-right" aria-hidden="true" style="color: #f05b46;"></i>';
                                                            echo '</div>';
														}
														
														?>
                                                           
                                                            
                                                        </div>
                                                        <!-- Add Pagination -->
                                                        <div class="swiper-pagination"></div>
                                                         
                                                    </div><button class="pull-right" style="outline:none;color: #f05b46;background: none; border: none;" data-toggle="modal" data-target=".modalreview" onClick="shoe_rate('<?php echo $_REQUEST['id'];?>')">VIEWALL</button>
                                                
                                                    <!-- Swiper JS -->
                                                    <script src="libs/js/swiper.js"></script>
                                                
                                                    <!-- Initialize Swiper -->
                                                    <script>
                                                    var swiper = new Swiper('.swiper-container', {
                                                        pagination: '.swiper-pagination',
                                                        paginationClickable: true
                                                    });
                                                    </script>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                               
                            <div class="col-md-5 nopad">                  
                            </div>


                            </div>
                        </div>
                    </div>   
                </div>
			</div>
		</div>
        
        
        
        
        
<div class="col-md-12">
   
    <!-- Large modal -->
    
    <div class="modal fade modalreview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content" style="    border-radius: 0px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Course Reviews</h4>
                </div>
                <div class="modal-body" style="background:#eee;">
                    <div class="show_rate row" style="padding: 10px 50px;"></div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>-->
            </div>
        </div>
    </div>
</div>      
<script>
function shoe_rate(id)
{
	$.ajax({
		url:"libs/actions/action-load-rate.php",
		type:"POST",
		dataType:"html",
		data:{id:id},
		success: function(res){
			$(".show_rate").html(res);
		}
	});
}
</script>
<style>
	#map {
		height: 400px;
		width: 100%;
		margin-bottom: -90px;
		margin-top: 50px;
	}
</style>
<script>
      function initMap() {
        var uluru = {lat:<?php echo $room['latitude'];?>, lng: <?php echo $room['longtitude'];?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru,
		  scrollwheel: false,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
                    
<div class="container-fluid">
    <!--<h2 class="mg-sec-left-title">Google Map</h2>-->
    <div class="row">
        <div id="map"></div>
    </div>
</div>

        <div class="b" style="margin: 70px 0px 90px;"></div>
        

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
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php */?>
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="email" class="form-control" id="txemail_p" name="txemail_p" placeholder="E-mail">
        </div>
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

<?php //echo '------'.$va;?>
<script src="libs/js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(e) {
	$('#input-4').rating({displayOnly: true, step: 0.5});
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
	show_price_first('<?php echo $va;?>',this);
});

function show_price_first(vals,me)
{
	$(me).addClass('acct');
	$(".tbp").hide();
	$(".t"+vals).show();
}
function show_price(vals,me)
{
	$(".tabbut").removeClass('acct');
	$(me).addClass('acct');
	$(".tbp").hide();
	$(".t"+vals).show();
}
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
				data:$("#form_contact_mobi").serialize(),
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

function prop_contact_mobi()
{

	if($("#form_contact_mobi #full_name_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #full_name_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #txemail_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #txemail_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #txsubject_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #txsubject_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #txmessage_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #txmessage_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #cbbGuest_mo").val()=='0')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #cbbGuest_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #cbbChildren_mo").val()=='0')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #cbbChildren_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #checkin_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #checkin_mo").focus();
		return false;
	}
	else if($("#form_contact_mobi #checkout_mo").val()=='')
	{
		alert("Please fill your data");
		$("#form_contact_mobi #checkout_mo").focus();
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!$("#form_contact_mobi #txemail_mo").val().match(Email))
		{
		   alert('Email format is not valid');
		   $("#form_contact_mobi #txemail_mo").focus();
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
      appId      : '1684480814898909',
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
			  link: 'http://www.inspiringvillas.com/?page=propertydetail&id='+idp,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'http://www.inspiringvillas.com/'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=1684480814898909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>      



<script>
$(document).ready(function(e) {
    
var tig=false;
$(function () {
	var boxcon = $(".whychoose").offset().top;
	var boxwidth = $(".box").width();
	var footer = $(".mg-footer").offset().top;//หาความสูงของ footer จาก top
	
	$(window).scroll(function () {
		
		
		
		wheight = $(this).height();
		foohight = ($('.mg-footer').height()/2);
		slideH = $('.box').height();
		foo = $(".foo").offset().top;
		footheight = $(".mg-footer").height();
		
		if($(this).width()>=992)
		{	
			$(boxcon).addClass('scrollbar');
			if($(this).scrollTop() > boxcon && $(this).scrollTop() < (foo-footheight))
			{
				//------$(".box").addClass('boxcon');
				$(".box").css({"position":"fixed ","overflow-y":"hidden","width":"23%","width":boxwidth+"px"},300);//
			}
			else if($(this).scrollTop() < boxcon && $(this).scrollTop() < (foo-footheight))
			{
				//------$(".box").removeClass('boxcon');
				$(".box").css({ "position":"relative ","z-index":"100","height":"auto","overflow":"hidden","width":"auto"});//,"width":"23%"
			}
			
			var footbox = $(".footbox").offset()
			
			if($(this).scrollTop() > (foo-wheight)-250)//if($(this).scrollTop() >= (foo-wheight) )
			{// console.log($(".box").offset().top);
				boxtop = $(".box").offset().top;
				$(".box").css({"z-index":"-1",});
				$(".box").css({"top":(((foohight-slideH)+400)-150)+"px"});//,"width":"23%"
				//-----$(".box").animate({height:"300px",position:"relative"},1000);,"height":((footer-foo)+slideH)+"px""position":"relative",
				
				//------console.log(boxtop);
				//"overflow-y":"scroll",//,"height":(foohight)+"px"
				//-----$(".box").animate({height:(foohight)+"px","overflow-y":"scroll"},100);
				//-----setTimeout(function(){
					
				//-----},100);
			}
			else
			{
				$(".box").css({"z-index":"100","overflow":"","top":"0px"});//,"width":"23%"
				//-----$(".box").animate({height:"300px"},100);//"position":"fixed",
				
			}	
		}
		
		
	//console.log($(".mg-footer").offset().top);
		
		//console.log($(this).scrollTop()+'+---+'+foo+'+---+'+(foo-wheight)+'+---+'+$(".box").offset().top);
		
	});
	
	
	
	
	/*if($(this).scrollTop() > (ftop-($('.side_menu').height()+foohight)))//+332
	{
		$(".side_menu").css({"position":"absolute","background":"#FFF","top":"100%","margin-top":"-"+slideH+"px"});
	}
	else
	{
		$(".side_menu").css({"position":"fixed","background":"#FFF","top":"","margin-top":""});
	}
	console.log((ftop-(502+342)));*/
});
});
</script>
