<?php
	
?>
<script tyle="text/javascript">
	fn.app.blog_category.blog_category.change = function(id) {
		$.ajax({
			url: "apps/blog_category/view/dialog.blog_category.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.blog_category.blog_category.save_change = function(){
		if(document.getElementById("txTitle_edit").value==''  )
		{
			alert('The Title, Short Title, Filter name and URL Slug are required');
			$("#txTitle_edit").focus();
			return false;
		}
		else if(document.getElementById("tx_link_e").value==''  )
		{
			alert('The Title, Short Title, Filter name and URL Slug are required');
			$("#tx_link_e").focus();
			return false;
		}
		else
		{ 
			$.post('apps/blog_category/xhr/action-edit-blog_category.php',$('#form_edit_slide').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/blog_category.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	var file_upload_edit = "#f_Photo_edit";

	fn.app.blog_category.blog_category.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.blog_category.blog_category.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		if($("#txt_photo_edit").val() != ''){
			remove_photo_file($("#txt_photo_edit").val());
		}
		var url = 'apps/blog_category/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
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
					$("#form_edit_slide #path_photo_edit").val(response.path);
					$("#form_edit_slide #txt_photo_edit").val(response.path);
					$("#form_edit_slide .phos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .phos").attr('src',response.path);
					$("#form_edit_slide .bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	//Edit by parinyimz 20180814
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
/*	fn.app.blog_category.blog_category.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/blog_category/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};*/
	function format_photo(path_name){
		var new_path_name =path_name.toLowerCase();
		new_path_name =new_path_name.split(' ').join('-');
		return new_path_name;
	}
	
	//----- cover photo
	var file_upload_edit_cover = "#f_coverPhoto_edit";

	fn.app.blog_category.blog_category.upload_coverphoto_edit = function(){
		$(file_upload_edit_cover).click();
		$(file_upload_edit_cover).unbind();
		
		$(file_upload_edit_cover).on("change",function(e){
			var files = this.files
			$("#btn_coverupp2").click();    
		});
	};
	
	fn.app.blog_category.blog_category.upload_coverphoto_file_edit = function(){
		var data = new FormData($("#form_edit_coverphoto")[0]);
		var s = '';
		if($("#txt_coverphoto_edit").val() != ''){
			remove_photo_file($("#txt_coverphoto_edit").val());
		}
		var url = 'apps/blog_category/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
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
					$("#form_edit_slide #path_coverphoto_edit").val(response.path);
					$("#form_edit_slide #txt_coverphoto_edit").val(response.path);
					$("#form_edit_slide .covphos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .covphos").attr('src',response.path);
					$("#form_edit_slide .bc_coveredit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
/*	fn.app.blog_category.blog_category.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/blog_category/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_coverphoto_edit").val('');
					$("#txt_coverphoto_edit").val('');
					$(".covphos").attr('src','');
					$(".bc_coveredit").hide();
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
