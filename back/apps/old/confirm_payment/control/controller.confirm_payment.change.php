<?php
	
?>
<script tyle="text/javascript">
	fn.app.confirm_payment.confirm_payment.change = function(id) {
		$.ajax({
			url: "apps/confirm_payment/view/dialog.confirm_payment.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.confirm_payment.confirm_payment.save_change = function(id){
		var conf = confirm('คุณต้องการยืนยันรายการสั่งซื้อนี้หรือไม่');
		if(conf==true)
		{
			$.post('apps/confirm_payment/xhr/action-edit-confirm_payment.php',{id:id},function(response){
				if(response.success){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			},'json');
		}
		else
		{
			return false;
		}
	};
</script>
