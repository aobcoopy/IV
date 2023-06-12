<?php
	
?>
<script tyle="text/javascript">
	fn.app.blog.blog.change = function(id) {
		$.ajax({
			url: "apps/blog/view/dialog.blog.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.blog.blog.check = function(id) {
		$.ajax({
			url: "apps/blog/view/dialog.blog.edit.check.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.blog.blog.save_change = function(){
		if(document.getElementById("txName_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txName_e").focus();
			return false;
		}
		else if(document.getElementById("txSnippet_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txSnippet_e").focus();
			return false;
		}
		else if(document.getElementById("txBrief_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txBrief_e").focus();
			return false;
		}
		else if(document.getElementById("txDetail_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txDetail_e").focus();
			return false;
		}
		else if(document.getElementById("txSign_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txSign_e").focus();
			return false;
		}
		else
		{ console.log($('#form_edit_property').serialize());
			$.post('apps/blog/xhr/action-edit-blog.php',$('#form_edit_property').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/blog.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	
	fn.app.blog.blog.save_change_check = function(){
			$.post('apps/blog/xhr/action-edit-blog-check.php',$('#form_edit_property_check').serialize(),function(response){
				$("#tblSlide").DataTable().draw();
				$("#dialog_edit_group").modal('hide');
				
				//if(response.success){
//					$("#tblSlide").DataTable().draw();
//					$("#dialog_edit_group").modal('hide');
//					//$("#thumbnail_edit").attr('src','../../../../upload/blog.jpg');
//				}else{
//					//fn.engine.alert("Alert",response.msg);
//				}
			});
	};
	
	
	
	
	var file_upload_edit = "#f_Photo_edit";

	fn.app.blog.blog.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.blog.blog.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var format_photo_name =$('#format_photo_name').val();
		var s = '';
		//Edit by Parinyimz 20190813
		var url = 'apps/blog/xhr/action-up-photo.php?format_photo_name='+format_photo_name;
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
					s += '<div class="col-md-4 pho">';
							s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo_e[]" value="'+response.path+'">';
							s += '<img src="<?php echo S3_BUCKET_URL ?>'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.blog.blog.remove_photo_file(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs_photo_edit").append(s);
					/*$("#form_edit_slide #path_photo_edit").val(response.path);
					$("#form_edit_slide #txt_photo_edit").val(response.path);
					$("#form_edit_slide .phos").attr('src',response.path);
					$("#form_edit_slide .bc").show();*/
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	/*fn.app.blog.blog.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/blog/xhr/action-remove-photo.php",
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
	//Edit by parinyimz 20180813
	fn.app.blog.blog.remove_photo_file = function(me){
		var path = $(me).parent().find('.paths').val();
		console.log(path);
		var url ='inc/delete_photo.php?path='+path;
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			success : function(data){
				if(data.success == '200'){
					$(me).parent().remove();
					$.post('apps/blog/xhr/action-edit-blog.php',$('#form_edit_property').serialize(),function(response){
						if(response.success){
							$("#tblSlide").DataTable().draw();
							$("#dialog_edit_group").modal('show');
							//$("#thumbnail_edit").attr('src','../../../../upload/blog.jpg');
						}else{
							//fn.engine.alert("Alert",response.msg);
						}
					},'json');	
				}
			}
		});	
	};
	
	
	
	
	
	
	
	


</script>
