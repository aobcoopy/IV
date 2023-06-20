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
</style>
<div class=" mg-room-fecilities padl50 ">
    <div class="mg-single-room-txt  cenb  web992" id="style-3" style="margin-top:0px; ">
        <div id="enbox"  class="enbox_xy">
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
                        <input type="text" class="form-control ip required" id="checkout" name="checkout" placeholder="Check Out*">
                        <button  type="button" class="butides r calenout"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    
                    <div class="mg-contact-form-input col6 nopad" style="padding-right:2px;"> 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest" id="cbbGuest" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input col6 nopad" style="padding-left:2px;"><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbChildren" id="cbbChildren" placeholder="No. Children (3-12 yrs)">
                    </div>
                    <div class="mg-contact-form-input col-md-12 nopad">
                    	<div class="ipsc2">	
                        <!--<label for="full-name">Full Name</label>-->
                        <select class="form-control ips" id="no_bed" name="no_bed"  placeholder="No. Bedroom*">
                        	<option value="0">No. Bedroom*</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="10+">10+</option>
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
                        <!--<label for="subject">Phone</label>-->
                        <input type="text" class="form-control ip" id="txsubject" name="txsubject" placeholder="Phone - WhatsApp - it’s quicker!">
                    </div>
                    <div class="mg-contact-form-input">
                        <!--<label for="subject">Message</label>-->
                        <textarea class="form-control ip" id="txmessage" name="txmessage" rows="3" placeholder="Message "></textarea>
                    </div>
                    <!-- <a onClick="goog_report_conversion('<?php echo $link;?>')"  >     ,goog_report_conversion('<?php echo $link;?>')-->
                    <div id="ajaxLoader1" style="display: none;"><img src="<?php echo $url_link;?>libs/images/AjaxLoader.gif" style="width: 32px; height: 32px; display: block; margin: 0 auto;"></div>
                    <button type="button" onClick="prop_contact();" class="btn btn-dark-main baa " style="font-family:pr;" >SEND</button>
                    
                    
                    
                    
                    <!--</a>-->
                   <!-- <input type="button" onClick="prop_contact()" class="btn btn-dark-main " style="font-family:pr;" value="Send">-->
                </form>

                <span class="textalert"></span>
                <div class="footbox"></div>
                
                <div class="adsv top10">
                	<?php /*?><div class="text_pri_enbox text-center f16res"><strong>Price Range  $<?php echo $room['pmin'];?> - $<?php echo $room['pmax'];?> <span class="hidden-xs hidden-sm">/ season</strong></div><?php */?>
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
                <center>
                    Speak to a villa expert<br>
                    Call Thailand <a href="tel:+66846771551">+66 84 677 1551</a><br>
                    Hongkong <a href="tel:+85281986765">+852 8198 6765</a><br>
                    Sydney <a href="tel:+61270047651">+612 7004 7651</a><br>
                    USA <a href="tel:+13477964362">+1 347 796 4362</a><br>
                    UK <a href="tel:+442032875367">+44 20 3287 5367</a>
                </center>
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
        <?php /*?><div class="butto">
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
        </div><?php */?>
        <br>
        <div class="whychoose sp" style="margin-top: 10px;">
           <!-- <img src="<?php echo $url_link;?>files/Why Choose Us Box.png" width="100%">-->
        </div>
        <div class="bottomwhy"></div>
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

<script language="JavaScript">
<!--

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
				url:"<?php echo $url_link;?>libs/actions/action-property-contact.php",
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









