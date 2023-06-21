<?php $id = $_REQUEST['id'];
$sql = $dbc->GetRecord("invoices","*","id='".$id."'");
?>

<link href="libs/css/payment.css" rel="stylesheet" type="text/css">





<form   id="payment-form">
<input type="hidden" name="txtID" value="<?php echo $id;?>">
<div class="paybg"></div>
<div class="pay_box">
  <div class="conta">
    	<div class="b_top">
            <div class="col-xs-12 col-sm-8 col-md-8 nopad">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 nopad">
                <img src="../../upload/logo2.png" width="150" class="center-block logs">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 tdet nopad">
                <div class="title">Enter your credit card information</div>
                <div class="detail">Booking Details : <?php echo $sql['name'];?></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 pbox top20">
            <div class="col-xs-12 col-sm-12 col-md-12 nopad ">
                <div class="col-xs-12 col-sm-6 col-md-6 nopad">
                    <div class="title">Payment amount</div>
                    <div class="money">$3,500 USD</div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6  nopad">
                    <div class="title">Ref Invioce : 0002</div>
                </div>
            </div>
           

  
            <div class="col-xs-12 col-sm-12 col-md-12 nopad">
            	<div class="col-xs-12 col-sm-8 col-md-8 nopad">
                    <div class="title">Card Number</div>
                    <input type="text" id="tx_card" name="tx_card" data-inputmask="'mask': '9999 9999 9999 9999'" class="letts">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 nopad">
                    <div class="title">Security Code</div>
                    <input type="text" id="tx_cvv" name="tx_cvv" maxlength="4" data-inputmask="'mask': '9999'" class="letts">
                </div>
                
                <div class="col-xs-12 col-sm-8 col-md-8 nopad">
                    <div class="title">Name on Card</div>
                    <input type="text" id="tx_name" name="tx_name">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 nopad">
                     <div class="title">Expiration</div>
                     <div class="col-xs-12 col-sm-6 col-md-6 nopad">
                     	<input type="text" id="tx_month" name="tx_month" maxlength="2"  data-inputmask="'mask': '99'">
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 nopad">
                     	<input type="text" id="tx_year" name="tx_year" maxlength="4"  data-inputmask="'mask': '9999'">
                     </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 nopad">
                <div class="title">Postal Code/Zip</div>
                <input type="text" id="tx_postal" name="tx_postal" >
                </div>
            </div>
        </div>
        <button class="butpay" onClick="pay()">Paynow</button>
    </div>
</div>
</form>

<script>
function pay()
{
	$.ajax({
		url:"libs/actions/encode-data.php",
		type:"POST",
		dataType:"json",
		data:$("#payment-form").serialize(),
		success: function(res){
			window.location = "?page=step2&data="+res.link;
		}	
	});
	
}

$(document).ready(function(e) {
	$("#tx_cvv").keyup(function(e) {
        if($(this).val()=='')
		{
			$(this).attr('type','text');
		}
    });
	$("#tx_cvv").blur(function(e) {
		if($(this).val()=='')
		{
			$(this).attr('type','text');
		}
		else
		{
			$(this).attr('type','password');
		}
        
    });
	
    $(":input").inputmask();
});
</script>