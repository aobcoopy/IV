<?php
	
?>
<script tyle="text/javascript">
	fn.app.booking.booking.view = function(id) {
		$.ajax({
			url: "apps/booking/view/dialog.booking.view.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.booking.booking.save_change = function(){
			$.post('apps/booking/xhr/action-update-booking.php',$('#form_editgroup').serialize(),function(response){
				if(response.success==true){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/booking.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}
			},'json');
			return false;
		
	};
</script>
