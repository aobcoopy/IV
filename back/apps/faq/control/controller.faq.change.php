<?php
	
?>
<script tyle="text/javascript">
	fn.app.faq.faq.change = function(id) {
		$.ajax({
			url: "apps/faq/view/dialog.faq.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.faq.faq.save_change = function(){
		$.post('apps/faq/xhr/action-edit-faq.php',$('#form_editgroup').serialize(),function(response){
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
