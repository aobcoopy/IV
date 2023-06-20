<?php $day = date("Y-m-d");?>
<?php $dayNext = expdate($day,'1');?>
<div class="bgw mobi hid "></div>
<div class="over mobi">
<div class="enq mobi hid mobi">

	<div class="enq_in ">
        <?php /*?><div class="col-md-12 webs">
            <img src="../../upload/slogo.png" width="100" style="margin-bottom:15px;">
            <button class="xclose" onClick="hide_question()" style="color:#000;">X</button>
        </div><?php */?>
        <div class="col-md-12 q_top mobi">
            <img src="../../upload/poplog.png" width="60" class="center-block" style="margin-bottom:15px;">
            <button class="xclose" onClick="clo();">X</button>
        </div>
        <div class="col-md-12 nopad inq1 mobi">
            <div class="col-md-12 q_name text-center mobi top10"><?php echo $room['name'];?></div>
            <form id="form_contact_mobi" class="clearfix">
                <input type="hidden" name="txtID" value="<?php echo $room['id'];?>"><br>
                <div class="mg-contact-form-input col-sm-12 nopad" >
                   <!-- <label for="full-name">Check In</label>-->
                    <!--<!--<input type="date" class="form-control ip iip" id="checkin_mo" name="checkin_mo" placeholder="Check In*" style="width:100%;">-->
                    <input type="date" class="form-control ip iip input-min-width-95p" id="checkin_mo" name="checkin_mo" placeholder="Check In*" onClick="calendar_opt()" value="<?php echo $day;?>">
                    <button type="button" class="buti cin" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
    
                <div class="mg-contact-form-input col-sm-12 nopad" ><!-- -->
                   <!-- <label for="full-name">Check Out</label>-->
                    <input type="date" class="form-control ip input-min-width-95p" id="checkout_mo" name="checkout_mo" placeholder="Check Out*" onClick="calendar_opt()" value="<?php echo date("Y-m-d",$dayNext);?>">
                    <!--<input type="date" class="form-control ip" id="checkout_mo" name="checkout_mo" placeholder="Check Out*">-->
                    <button type="button" class="buti cout" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
                    <div class="mg-contact-form-input  col-xs-6 col-sm-6 nopad" > 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest_mo" id="cbbGuest_mo" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input   col-xs-6  col-sm-6 nopad" ><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbChildren_mo" id="cbbChildren_mo" placeholder="No. Children (3-12 yrs)">
                    </div>
                
                <div class="mg-contact-form-input col-xs-12 col-sm-12 nopad ipsc" >
                    <!--<label for="full-name">Full Name</label>-->
                    <select class="form-control ips" id="no_bed_mo" name="no_bed_mo"  placeholder="No. Bedroom*">
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
                <div class="mg-contact-form-input">
                    <!--<label for="full-name">Full Name</label>-->
                    <input type="text" class="form-control ip" id="full_name_mo" name="full_name_mo" placeholder="Full Name*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="email">E-mail</label>-->
                    <input type="text" class="form-control ip" id="txemail_mo" name="txemail_mo" onKeyUp="lower_text(this)" placeholder="E-mail*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Phone</label>-->
                    <input type="text" class="form-control ip" id="txsubject_mo" name="txsubject_mo"  placeholder="Phone - WhatsApp - it’s quicker!">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Message</label>-->
                    <textarea class="form-control ip" id="txmessage_mo" name="txmessage_mo" rows="3" placeholder="Message "></textarea>
                </div>
                <!--<input type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right" value="Send">-->
                 <!-- <a onClick="goog_report_conversion('<?php echo $link;?>')"  >    ,goog_report_conversion('<?php echo $link;?>')-->
                    <div id="ajaxLoader2" style="display: none;"><img src="<?php echo $url_link;?>libs/images/AjaxLoader.gif" style="width: 32px; height: 32px; display: block; margin: 0 auto;"></div>
                	<button type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right baa bba top10" >SEND</button>
                <!--</a>-->
            </form>
            <span class="textalert"></span>
        </div>
    </div>
    
    
	<?php /*?><button class="bclose" onClick="clo();"><i class="fa fa-remove " ></i></button>
    <div class="mg-single-room-txt box enbox mobi" id="style-3" style="margin-top:-10px; ">
        <h2 class="mg-sec-left-titles enti"><center>Enquire Now</center></h2>
        
            <form id="form_contact_mobi" class="clearfix">
                <input type="hidden" name="txtID" value="<?php echo $room['id'];?>"><br>
                <div class="mg-contact-form-input col-sm-12 nopad" >
                   <!-- <label for="full-name">Check In</label>-->
                    <!--<!--<input type="date" class="form-control ip iip" id="checkin_mo" name="checkin_mo" placeholder="Check In*" style="width:100%;">-->
                    <input type="date" class="form-control ip iip input-min-width-95p" id="checkin_mo" name="checkin_mo" placeholder="Check In*" onClick="calendar_opt()" value="<?php echo $day;?>">
                    <button type="button" class="buti cin" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
    
                <div class="mg-contact-form-input col-sm-12 nopad" ><!-- -->
                   <!-- <label for="full-name">Check Out</label>-->
                    <input type="date" class="form-control ip input-min-width-95p" id="checkout_mo" name="checkout_mo" placeholder="Check Out*" onClick="calendar_opt()" value="<?php echo date("Y-m-d",$dayNext);?>">
                    <!--<input type="date" class="form-control ip" id="checkout_mo" name="checkout_mo" placeholder="Check Out*">-->
                    <button type="button" class="buti cout" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
                    <div class="mg-contact-form-input  col-xs-6 col-sm-6 nopad" > 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest_mo" id="cbbGuest_mo" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input   col-xs-6  col-sm-6 nopad" ><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbChildren_mo" id="cbbChildren_mo" placeholder="No. Children (3-12 yrs)">
                    </div>
                
                <div class="mg-contact-form-input col-xs-12 col-sm-12 nopad ipsc" >
                    <!--<label for="full-name">Full Name</label>-->
                    <select class="form-control ips" id="no_bed_mo" name="no_bed_mo"  placeholder="No. Bedroom*">
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
                <div class="mg-contact-form-input">
                    <!--<label for="full-name">Full Name</label>-->
                    <input type="text" class="form-control ip" id="full_name_mo" name="full_name_mo" placeholder="Full Name*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="email">E-mail</label>-->
                    <input type="text" class="form-control ip" id="txemail_mo" name="txemail_mo" onKeyUp="lower_text(this)" placeholder="E-mail*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Phone</label>-->
                    <input type="text" class="form-control ip" id="txsubject_mo" name="txsubject_mo"  placeholder="Phone Number (optional)">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Message</label>-->
                    <textarea class="form-control ip" id="txmessage_mo" name="txmessage_mo" rows="5" placeholder="Message (optional)"></textarea>
                </div>
                <!--<input type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right" value="Send">-->
                 <!-- <a onClick="goog_report_conversion('<?php echo $link;?>')"  >    ,goog_report_conversion('<?php echo $link;?>')-->
                	<button type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right baa" >Send</button>
                <!--</a>-->
            </form>
            <span class="textalert"></span>
            <!--<br>-->
            
            <div class="footbox"></div>
    </div><?php */?>
    
   <?php /*?> <div class="sp2 mobi hid">
        <center>
            Speak to our villa expert: <a href="tel:+66846771551">+66 84 677 1551</a>
        </center> <br>
    </div><?php */?>
    
    <?php /*?><div class="butto2 mobi hid">
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
    <br><br><br></div><?php */?>
    
   <div class="whychoose2 mobi hid">
        <img src="../../files/Why Choose Us Box.png" width="100%">
    </div>
</div>
</div>

<div class="butenq mobi">
	<button class="btn_enq" onClick="show_question();">Ask Question</button>
    <button class="btn_enq" onClick="popup();" >Enquire Now</button>
    <!--<button class="btn_enq" onClick="pop_enquiry('<?php echo $room['id'];?>','<?php echo $name[0];?>');" >Enquire Now</button>-->
</div>

<div class=" bgu2"></div>
<div class="end_boxes">
	<i class="fa fa-times cloos pull-right" ></i>
    <div class="vi_box"></div>
</div>

<script language="JavaScript">
<!--
  
function pop_enquiry(id,name)
{
	$(".vi_name").html(name);
	
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/fr_enquire.php",
		type:"POST",
		dataType:"html",
		data:{id:id,name:name,pages:"detail"},
		success: function(res){
			$(".vi_box").html(res);
			$(".bgu2").fadeIn(300,function(){
				$(".end_boxes").fadeIn(300);
			});
		}
	});
}

$(document).ready(function(e) {
    $(".bgu1,.cloo").click(function(e) {
        $(".bgu1").fadeOut(300);
		$(".show_u").fadeOut(300);
		$(".youtube").html('');
    });
	 $(".cloos").click(function(e) {
        $(".bgu2,.end_boxes").fadeOut(300);
    });
});

function popup()
{
	$(".enq,.bgw").fadeIn(300);
	//$('#checkin_mo').focus();
	//$('#checkout_mo').focus();
	setTimeout(function(){
		//$('#checkin_mo').focus();
	},1000);
}

function clo()
{
	$(".enq,.bgw").fadeOut(300);
}

function prop_contact_mobi()
{

	if($("#form_contact_mobi #full_name_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #full_name_mo").focus();
		$("#form_contact_mobi #full_name_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #txemail_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #txemail_mo").focus();
		$("#form_contact_mobi #txemail_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #no_bed_mo").val()=='0')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #no_bed_mo").focus();
		$("#form_contact_mobi #no_bed_mo").css({"border-color":"red"});
		return false;
	}
	//else if($("#form_contact_mobi #cbbGuest_mo").val()=='')
//	{
//		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
//		$("#cbbGuest_mo").focus();
//		$("#cbbGuest_mo").css({"border-color":"red"});
//		return false;
//	}
	else if($("#form_contact_mobi #checkin_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #checkin_mo").focus();
		$("#form_contact_mobi #checkin_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #checkout_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #checkout_mo").focus();
		$("#form_contact_mobi #checkout_mo").css({"border-color":"red"});
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!$("#form_contact_mobi #txemail_mo").val().match(Email))
		{
		   $(".textalert").text("* Email format is not valid");//alert('Email format is not valid');
		   $("#form_contact_mobi #txemail_mo").focus();
		   return false;
		}
		else
		{  
            showLoader('ajaxLoader2');
			$.ajax({ 
				url:"<?php echo $url_link;?>libs/actions/action-property-contact-mo.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_contact_mobi").serialize(),
				success: function(res){
					if(res.status==true)
					{
									$(".ip").val('');
									window.location = "<?php echo $url_link;?>thanks/<?php echo $room['destination'];?>.html";
									$(".textalert").text("Successful");
									$(".textalert").css({"color":"green"});
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

$(document).ready(function(e) {
	$(window).resize(function(){
        if($(window).width()<976)
		{
		}
		else
		{
			$('.butenq').fadeOut(30);
			$("#top").css({"margin-bottom":"25px"});
		}
    });
    $(window).scroll(function(e) {
		var win = $(window).width();
		
		if($(this).scrollTop() > $(".map").offset().top-400)
		{
			if($(window).width()<976)
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
			else
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
		}
		else
		{
			if($(window).width()<976)
			{
				if($(window).width()<380)
				{
					$("#top").css({"margin-bottom":"85px"});
				}
				else
				{
					$("#top").css({"margin-bottom":"75px"});
				}
				$('.butenq').fadeIn(300);
				
			}
			else
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
		}
    });
});
//-->
</script>