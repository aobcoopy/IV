<?php
	
?>
<script tyle="text/javascript">
	fn.app.category.category.change = function(id) {
		$.ajax({
			url: "apps/category/view/dialog.category.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.category.category.save_change = function(){
		$.post('apps/category/xhr/action-edit-category.php',$('#form_editgroup').serialize(),function(response){
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
