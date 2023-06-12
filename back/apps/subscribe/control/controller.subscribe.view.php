<?php
	
?>
<script tyle="text/javascript">
	fn.app.subscribe.subscribe.view = function(id) {
		$.ajax({
			url: "apps/subscribe/view/dialog.subscribe.view.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.subscribe.subscribe.save_change = function(){
			$.post('apps/subscribe/xhr/action-update-subscribe.php',$('#form_editgroup').serialize(),function(response){
				if(response.success==true){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/subscribe.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}
			},'json');
			return false;
		
	};
</script>
