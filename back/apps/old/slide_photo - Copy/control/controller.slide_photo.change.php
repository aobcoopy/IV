<?php
	
?>
<script tyle="text/javascript">
	fn.app.banner.banner.change = function(id) {
		$.ajax({
			url: "apps/banner/view/dialog.banner.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.banner.banner.save_change = function(){
		if(document.getElementById("parth_edit").value=='')
		{
			//alert('Please fill ypur data');
			$("#uploads").click();
			return false;
		}
		else
		{
			$.post('apps/banner/xhr/action-edit-banner.php',$('#form_editgroup').serialize(),function(response){
				if(response.success){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					$("#thumbnail_edit").attr('src','../../../../upload/banner.jpg');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
</script>
