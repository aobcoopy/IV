<?php
	//include_once "apps/vf_phuket/view/dialog.vf_phuket.add.php";
?>
<script style="text/javascript">
fn.app.vf_phuket.customer_history = function(id,vid){
	window.location = '?app=vf_phuket&view=customer&id='+id+'&vid='+vid;
};

fn.app.vf_phuket.dialog_add_user = function(id,vid){
		$.ajax({
			url: "apps/vf_phuket/view/dialog.vf_phuket.add.user.php",
			data: {id:id,vid:vid},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
};

fn.app.vf_phuket.save_customer_data = function(){
	if($("#txCustomer").val()=='')
	{
		fn.app.check_blank($("#txCustomer"),"Please fill data");
	}
	else if($("#txInvoice").val()=='')
	{
		fn.app.check_blank($("#txInvoice"),"Please fill data");
	}
	else
	{
		$.ajax({
			url: "apps/vf_phuket/xhr/action-save-customer-data.php",
			data: $("#form_add_customer_data").serialize(),
			type: "POST",
			dataType: "json",
			success: function(res){
				if(res.status==true)
				{
					$("#dialog_edit_group").modal('hide');
				}
				else
				{
					fn.app.check_blank($("#txInvoice"),res.msg);
					return false;
				}
			}	
		});
	}
};

fn.app.check_blank = function(me,msg=''){
	alert(msg);
	$(me).focus();
	return false;
};
</script>
