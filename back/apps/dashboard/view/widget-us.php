<?php 
	$us = $dbc->GetRecord("variable","*","name = 'us'");
	
	
?>


<div class="alert alert-info" role="alert">

    <div class="col-md-8">
    
        <form id="form_us" class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Thai Rate </div>
                    <input type="number" class="form-control" id="tx_us" name="tx_us" placeholder="Amount" min="1" step="0.01"  value="<?php echo $us['value'];?>">
                    <div class="input-group-addon">THB </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn_us_save" onClick="save_money()" style="display:none;">Save</button>
            
        </form>
    	<input type="checkbox" name="chk_mn" id="chk_mn" class="chk_mn"> Set Value
    </div>
    <div class="col-md-4" style="font-size: 30px;">
    	<span class="fa fa-money"></span> THB <?php echo $us['value'];?>
    </div>

</div>
<style>
input[type=checkbox] {
    margin: 2px 0px 0px 0px;
    width: 20px;
    height: 20px;
}
.btn_us_save
{
	transition:all 0s;
}
</style>
<script>
$(document).ready(function(e) {
	$("#chk_mn").click(function(e) {
		if ($('[name="chk_mn"]:checked').size() == 1)
		{
			$(".btn_us_save").show();
		}
		else
		{
			$(".btn_us_save").hide();
		}
	});
});
function save_money()
{
	if($("#tx_us").val()=='')
	{
		alert("Please fill your data");
		return false;
		$("#tx_us").focus();
	}
	else
	{
		$.ajax({
			url:"apps/dashboard/xhr/action-save-us.php",
			type:"POST",
			dataType:"json",
			data:$("#form_us").serialize(),
			success: function(res){
				if(res.success==true){setTimeout(function(){window.location.reload();},1500);}
			}
		});
	}
	
}
</script>




