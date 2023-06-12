<?php
	
?>
<script tyle="text/javascript">
	fn.app.cover.cover.change = function(id) {
		$.ajax({
			url: "apps/cover/view/dialog.cover.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.cover.cover.save_change = function(modal){
		var modal =(modal == undefined)? 'hide' :'show';
		if(document.getElementById("txt_photo_edit").value=='')
		{
			//alert('Please fill ypur data');
			$(".bc_edit").click();
			return false;
		}
		else
		{
			$.post('apps/cover/xhr/action-edit-cover.php',$('#form_edit_cover').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal(modal);
					//$("#thumbnail_edit").attr('src','../../../../upload/cover.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	function format_photo(path_name){
		var new_path_name =path_name.toLowerCase();
		new_path_name =new_path_name.split(' ').join('-');
		return new_path_name;
	}
	var file_upload_edit = "#f_Photo_edit";

	fn.app.cover.cover.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.cover.cover.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		if($("#txt_photo_edit").val() != ''){
			remove_photo_file($("#txt_photo_edit").val());
		}
		var url = 'apps/cover/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
	
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_cover #path_photo_edit").val(response.path);
					$("#form_edit_cover #txt_photo_edit").val(response.path);
					$("#form_edit_cover .phos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$("#form_edit_cover .bc_edit").show();
					fn.app.cover.cover.save_change('show');
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
		//Edit by parinyimz 20180816
		function remove_photo_file(path){
		var url ='inc/delete_photo.php?path='+path;
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			success : function(data){
				if(data.success == '200'){
					//$(me).parent().remove();	
				}
			}
		});	
	};
	fn.app.cover.cover.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/cover/xhr/action-remove-photo.php",
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
	};
</script>
