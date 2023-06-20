<button class="but_ques hidden-sms hidden-xss top30 text-lefts" onClick="show_question();" style="margin-bottom: 0px;">
<?php /*?>Contact one of our villa experts for more details<?php */?>
<ul class="inbut">
	<li class="fo15">Contact one of our villa experts for more details</li>
    <li class="lin">|</li>
    <li class="fo15">ASK A QUESTION HERE</li>
</ul>
	<?php /*?><br><a class="but_aq">ASK A QUESTION</a><?php */?>
</button>

<?php /*?><div class="col-md-12 nopad">
    <div class="but_ques btn_q2 hidden-sms hidden-xss top30 text-left" onClick="show_question();">
    Contact one of our villa experts for more details
        <br><button class="but_aq">ASK A QUESTION</button>
    </div>
</div><?php */?>


<?php
$img = json_decode($room['photo'],true);
//echo $img[0]['img'];
?>
<style>
.top0
{
	margin-top:0px !important;
}
</style>
<div class="q_bg"></div>
<div class="q_box">
    <div class="col-md-12 web992">
        <img src="../../upload/slogo.png" width="100" style="margin-bottom:15px;">
        <button class="xclose" onClick="hide_question()" style="color:#000;">X</button>
    </div>
    <div class="col-md-12 q_top mob992">
        <img src="../../upload/poplog.png" width="60" class="center-block" style="margin-bottom:15px;">
        <button class="xclose" onClick="hide_question()">X</button>
    </div>
    
    <div class="col-md-12 web992">Please ask any question. Or just provide your name and email.<br>
    A villa specialist will contact you shortly. Thank you.
    </div>
    
    <div class="col-md-12 mob992 text-center" style="    margin-bottom: 10px;margin-top: 30px;">Please ask any question. Or just provide your name and email.<br>
    A villa specialist will contact you shortly. Thank you.
    </div>
    
    <div class="col-md-12 nopad inq">
    	
    	<div class="col-md-12 q_name text-center mobi top10 tb"><?php echo $room['name'];?></div>
        <div class="det_prices top20 mobi text-center" style="margin-bottom:0px;"><?php /*?>Enjoy $150 credit for any excursion during your villa stay with us*<?php */?></div>
        
        
        <div class="col-md-6 hidden-xs hidden-sm" style="    margin-top: 28px;">
        	<img src="<?php echo $img[0]['img'];?>" class="hidden-xs hidden-sm" width="100%">
            <br><br>
            
            <div class="webs tb"><?php echo $room['name'];?></div>
            
            <div class="det_prices top20">Enjoy $150 credit for any excursion during your villa stay with us*</div>
        </div>
        
        <div class="col-md-6">
        	<form id="form_sendblog">
            <input type="hidden" class="form-control" id="q_tx_id" name="q_tx_id" value="<?php echo $room['id'];?>">
            <input type="hidden" class="form-control" id="q_tx_name" name="q_tx_name" value="<?php echo $room['name'];?>">
            <div class="mg-contact-form-input ql">
               <label for="full-name">Full Name*</label>
                <input type="text" class="form-control q_form" id="q_full_name" name="q_full_name" placeholder="Full Name">
            </div>
            <div class="mg-contact-form-input ql top0">
                <label for="email">E-mail*</label>
                <input type="email" class="form-control q_form" id="q_txemail_p" name="q_txemail_p" placeholder="E-mail">
            </div>
            <div class="mg-contact-form-input ql top0">
                <label for="subject">Phone</label>
                <input type="text" class="form-control q_form" id="q_phone" name="q_phone" placeholder="Phone">
            </div>
            <div class="mg-contact-form-input ql top0">
                <label for="subject">Message</label>
                <textarea class="form-control q_form" id="q_txmessage" name="q_txmessage" rows="4" placeholder="Message"></textarea>
            </div>
            </form>
            <div id="ajaxLoader3" style="display: none;"><img src="<?php echo $url_link;?>libs/images/AjaxLoader.gif" style="width: 32px; height: 32px; display: block; margin: 0 auto;"></div>
            <button class="qbut bba"  onClick="sendemail_p_inside()">send my message</button>
        </div>
    </div>
</div>

<?php
//$prop = $dbc->GetRecord("properties,destinations","properties.id,properties.name AS pname,destinations.name AS dname","destinations.id = properties.destination AND properties.id='".$room['id']."'");
////echo ">>>>".$prop['pname'].">>>>".$prop['dname'];
//
//$vname = explode("|",$prop['pname']);
//		
//$villa_name_1 = $v_name[0].', '.$des['name'];
//$posiotion_text = strrpos($vname[0]," ");
//$complete_text = substr_replace($vname[0],",",$posiotion_text);
//$villa_name = $complete_text.$prop['dname'];//.' '.$des['name'];
//	
//echo ">>>>".$villa_name."<<<";
?>


<script language="JavaScript">
<!--

function show_question()
{
	$(".q_bg").fadeIn(300);
	$(".q_box").fadeIn(300);
}

function hide_question()
{
	$(".q_bg").fadeOut(300);
	$(".q_box").fadeOut(300);
}

function sendemail_p_inside()
{
	if($("#q_full_name").val()=='')
	{
		alert("* Please fill your data");
		$("#q_full_name").focus();
		return false;
	}
	else if($("#q_txemail_p").val()=='')
	{
		alert("* Please fill your data");
		$("#q_txemail_p").focus();
		return false;
	}
	/*else if($("#q_txmessage").val()=='')
	{
		alert("* Please fill your data");
		$("#q_txmessage").focus();
		return false;
	}*/
	else
	{
		/*var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("q_txemail_p").value.match(Email))
		{
		   alert('Email format is not valid');
		   document.getElementById("q_txemail_p").focus();
		   return false;
		}
		else
		{*/
            showLoader('ajaxLoader3');
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-send-email-prop.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_sendblog").serialize(),
				success: function(res){
					if(res.status==true)
					{
						//alert(res.msg);
						//window.location.reload();
						//$.ajax({
//							url:"<?php echo $url_link;?>libs/actions/session_link.php",
//							type:"POST",
//							dataType:"json"	,
//							data:{des:<?php echo $room['destination'];?>},
//							success: function(resa){
//								
//								if(resa==true)
//								{
									$(".q_form").val('');
									window.location = "<?php echo $url_link;?>thank-you-question/<?php echo $room['destination'];?>.html";
									/*$(".textalert").text("Successful");
									$(".textalert").css({"color":"green"});*/
								//}
//							}
//						});
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
//-->
</script>




<!-- Modal -->
<div class="modal fade" id="myModal_question_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><img src="../../upload/slogo.png"></h4>
      </div>-->
      <div class="modal-body">
      <div class="row">
      
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12">
                    <img src="../../upload/slogo.png" width="120">
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
        	<div class="col-md-6">
            <img src="<?php echo $img[0]['img'];?>" width="100%">
            <br><br>
            <?php echo $room['name'];?>
            </div>
            <div class="col-md-6"></div>
        </div>
        
       </div> 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>