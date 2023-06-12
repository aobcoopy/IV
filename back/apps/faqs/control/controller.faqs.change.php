<?php
	
?>
<script tyle="text/javascript">
	fn.app.faqs.faqs.change = function(id) {
		$.ajax({
			url: "apps/faqs/view/dialog.faqs.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.faqs.faqs.save_change = function(){
		$.post('apps/faqs/xhr/action-edit-faqs.php',$('#form_editgroup').serialize(),function(response){
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
