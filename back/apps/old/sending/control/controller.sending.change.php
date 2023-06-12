<?php
	
?>
<script tyle="text/javascript">
	fn.app.sending.sending.change = function(id) {
		$.ajax({
			url: "apps/sending/view/dialog.sending.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.sending.sending.save_change = function(id){
		$.ajax({
			url: "apps/sending/view/dialog.sending.track.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.sending.sending.addtrack = function(){
		$.ajax({
			url: "apps/sending/xhr/action-update-tracking.php",
			data:$("#form_editgroup").serialize(),
			type: "POST",
			dataType: "json",
			success: function(html){
				if(html.success==true)
				{
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}
				else
				{
					fn.engine.alert("Alert",html.msg);
				}
			}	
		});
	};
</script>
