<?php
	
?>
<script tyle="text/javascript">
	fn.app.subdestination.subdestination.change = function(id) {
		$.ajax({
			url: "apps/subdestination/view/dialog.subdestination.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	fn.app.subdestination.subdestination.meta = function(id) {
		$.ajax({
			url: "apps/subdestination/view/dialog.subdestination.meta.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.subdestination.subdestination.save_change = function(){
		if(document.getElementById("txTitle_edit").value=='' || document.getElementById("txSlug_edit").value=='')
		{
			alert('Please fill in all required fields');
/*            $("$txTitle_edit").click(); */
			return false;
		}
		else
		{
			$.post('apps/subdestination/xhr/action-edit-subdestination.php',$('#form_edit_subdestination').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/subdestination.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	
	fn.app.subdestination.subdestination.save_meata = function(){
			$.post('apps/subdestination/xhr/action-edit-meta.php',$('#form_edit_meta').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/subdestination.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
	};
	/*var file_upload_edit = "#f_Photo_edit";

	fn.app.subdestination.subdestination.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.subdestination.subdestination.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/subdestination/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_subdestination #path_photo_edit").val(response.path);
					$("#form_edit_subdestination #txt_photo_edit").val(response.path);
					$("#form_edit_subdestination .phos").attr('src',response.path);
					$("#form_edit_subdestination .bc_edit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*s/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.subdestination.subdestination.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/subdestination/xhr/action-remove-photo.php",
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
