<?php
	
?>
<script tyle="text/javascript">
	fn.app.subcategory.subcategory.change = function(id) {
		$.ajax({
			url: "apps/subcategory/view/dialog.subcategory.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.subcategory.subcategory.save_change = function(){
		$.post('apps/subcategory/xhr/action-edit-subcategory.php',$('#form_editgroup').serialize(),function(response){
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
