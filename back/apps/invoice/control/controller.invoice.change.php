<?php
	
?>
<script tyle="text/javascript">
	fn.app.invoice.invoice.change = function(id) {
		$.ajax({
			url: "apps/invoice/view/dialog.invoice.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.invoice.invoice.save_change = function(){
		if($("#form_edit_invoice #name").val=='')
		{
			alert('Please fill ypur data');
			$("$txTitle_edit").click();
			return false;
		}
		else
		{
			$.post('apps/invoice/xhr/action-edit-invoice.php',$('#form_edit_invoice').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/invoice.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	/*var file_upload_edit = "#f_Photo_edit";

	fn.app.invoice.invoice.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.invoice.invoice.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/invoice/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_invoice #path_photo_edit").val(response.path);
					$("#form_edit_invoice #txt_photo_edit").val(response.path);
					$("#form_edit_invoice .phos").attr('src',response.path);
					$("#form_edit_invoice .bc_edit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*s/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.invoice.invoice.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/invoice/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc_edit").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};*/
</script>
