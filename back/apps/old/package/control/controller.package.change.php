<?php
	
?>
<script tyle="text/javascript">
	fn.app.package.package.change = function(id) {
		$.ajax({
			url: "apps/package/view/dialog.package.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.package.package.save_change = function(id){
		var conf = confirm('คุณต้องการยืนยันรายการสั่งซื้อนี้หรือไม่');
		if(conf==true)
		{
			$.post('apps/package/xhr/action-edit-package.php',{id:id},function(response){
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
	fn.app.package.package.print = function(id){
		//window.open.location = '?page=invoice';
		window.open("apps/package/view/invoice.php?id="+id,"windowName", "width=460,height=650,scrollbars=no");
	};
</script>
