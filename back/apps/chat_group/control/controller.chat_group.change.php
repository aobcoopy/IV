<?php
	
?>
<script tyle="text/javascript">
	fn.app.chat_group.chat_group.change = function(id) {
		$.ajax({
			url: "apps/chat_group/view/dialog.chat_group.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.chat_group.chat_group.save_change = function(){
		$.post('apps/chat_group/xhr/action-edit-chat_group.php',$('#form_editgroup').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_edit_group").modal('hide');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
			
		},'json');
		return false;
	};
</script>
