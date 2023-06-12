<?php
	
?>
<script tyle="text/javascript">
	fn.app.contact.contact.view = function(id) {
		$.ajax({
			url: "apps/contact/view/dialog.contact.view.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.contact.contact.save_change = function(){
			$.post('apps/contact/xhr/action-update-contact.php',$('#form_editgroup').serialize(),function(response){
				if(response.success==true){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/contact.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}
			},'json');
			return false;
		
	};
</script>
