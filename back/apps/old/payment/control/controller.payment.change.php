<?php
	
?>
<script tyle="text/javascript">
	fn.app.payment.payment.change = function(id) {
		$.ajax({
			url: "apps/payment/view/dialog.payment.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.payment.payment.save_change = function(id){
		var conf = confirm('คุณต้องการยืนยันรายการสั่งซื้อนี้หรือไม่');
		if(conf==true)
		{
			$.post('apps/payment/xhr/action-edit-payment.php',{id:id},function(response){
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
