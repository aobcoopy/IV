<?php 
	$thb = $dbc->GetRecord("variable","*","name = 'thb'");
?>


<div class="alert alert-success" role="alert">

    <div class="col-md-8">
        <form id="form_thb" class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">USD Rate</div>
                    <input type="number" class="form-control" id="tx_thb" name="tx_thb" placeholder="Amount"  min="1" step="0.01" value="<?php echo $thb['value'];?>">
                    <div class="input-group-addon">USD</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn_thb_save" onClick="save_money_thb()" style="display:none;">Save</button>
        </form>
    	<input type="checkbox" name="chk_mn_thb" id="chk_mn_thb" class="chk_mn_thb"> Set Value
    </div>
    
    <div class="col-md-4" style="font-size: 30px;">
    	<span class="fa fa-usd"></span> USD <?php echo $thb['value'];?>
    </div>

</div>
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> For villas showing prices in Thai baht.
<script>
$(document).ready(function(e) {
	$("#chk_mn_thb").click(function(e) {
		if ($('[name="chk_mn_thb"]:checked').size() == 1)
		{
			$(".btn_thb_save").show();
		}
		else
		{
			$(".btn_thb_save").hide();
		}
	});
});
function save_money_thb()
{
	if($("#tx_thb").val()=='')
	{
		alert("Please fill your data");
		return false;
		$("#tx_thb").focus();
	}
	else
	{
		$.ajax({
			url:"apps/dashboard/xhr/action-save-thb.php",
			type:"POST",
			dataType:"json",
			data:$("#form_thb").serialize(),
			success: function(res){
				if(res.success==true){setTimeout(function(){window.location.reload();},1500);}
			}
		});
	}
	
}
</script>




