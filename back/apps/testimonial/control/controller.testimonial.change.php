<?php
	
?>
<script tyle="text/javascript">
	fn.app.testimonial.testimonial.change = function(id) {
		$.ajax({
			url: "apps/testimonial/view/dialog.testimonial.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.testimonial.testimonial.check = function(id) {
		$.ajax({
			url: "apps/testimonial/view/dialog.testimonial.edit.check.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.testimonial.testimonial.save_change = function(){
		if(document.getElementById("txName_e").value=='')
		{
			alert('Please fill ypur data');
			$("#txName_e").focus();
			return false;
		}
		/*else if(document.getElementById("txBrief_e").value=='')
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
		}*/
		else
		{
			$.post('apps/testimonial/xhr/action-edit-testimonial.php',$('#form_edit_property').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/testimonial.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	
	//fn.app.testimonial.testimonial.save_change_check = function(){
//			$.post('apps/testimonial/xhr/action-edit-testimonial-check.php',$('#form_edit_property_check').serialize(),function(response){
//				$("#tblSlide").DataTable().draw();
//				$("#dialog_edit_group").modal('hide');
//				
//				//if(response.success){
////					$("#tblSlide").DataTable().draw();
////					$("#dialog_edit_group").modal('hide');
////					//$("#thumbnail_edit").attr('src','../../../../upload/testimonial.jpg');
////				}else{
////					//fn.engine.alert("Alert",response.msg);
////				}
//			});
//	};
	
	
	
	
	//var file_upload_edit = "#f_Photo_edit";
//
//	fn.app.testimonial.testimonial.upload_photo_edit = function(){
//		$(file_upload_edit).click();
//		$(file_upload_edit).unbind();
//		
//		$(file_upload_edit).on("change",function(e){
//			var files = this.files
//			$("#btn_upp2").click();    
//		});
//	};
//	
//	fn.app.testimonial.testimonial.upload_photo_file_edit = function(){
//		var data = new FormData($("#form_edit_photo")[0]);
//		var s = '';
//		jQuery.ajax({
//			url: 'apps/testimonial/xhr/action-up-photo.php',
//			data: data,
//			cache: false,
//			contentType: false,
//			processData: false,
//			type: 'POST',
//			dataType: 'json',
//			success: function(response){
//				if(response.success){
//					s += '<div class="col-md-4 pho">';
//							s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
//							s += '<input type="hidden" name="txt_photo_e[]" value="'+response.path+'">';
//							s += '<img src="'+response.path+'"  width="100%" class="img-thumbnail pho">';
//							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.testimonial.testimonial.remove_photo_file(this);">';
//								s += '<i class="fa fa-times" aria-hidden="true"></i>';
//								s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
//							s += '</button>';
//						s += '</div>';
//					//s += '</div>';
//					$(".thumbs_photo_edit").append(s);
//					/*$("#form_edit_slide #path_photo_edit").val(response.path);
//					$("#form_edit_slide #txt_photo_edit").val(response.path);
//					$("#form_edit_slide .phos").attr('src',response.path);
//					$("#form_edit_slide .bc").show();*/
//					/*$("#tblbrand").DataTable().draw();
//					$("#dialog_edit_icon").modal('hide');*/
//				}else{
//					fn.engine.alert("Alert",response.msg);
//				}	
//			}
//		});
//	};
//	
//	fn.app.testimonial.testimonial.remove_photo_edit = function(me){
//		var file_path = $(me).parent().find('.paths').val();
//		//alert(file_path);
//		$.ajax({
//			url:"apps/testimonial/xhr/action-remove-photo.php",
//			type:"POST",
//			dataType:"json",
//			data:{path:file_path},
//			success: function(resp){
//				if(resp.status==true)
//				{
//					$("#path_photo").val('');
//					$("#txt_photo").val('');
//					$(".phos").attr('src','');
//					$(".bc").hide();
//					fn.engine.alert("Alert",response.msg);
//				}
//				else
//				{
//					fn.engine.alert("Alert",response.msg);
//				}
//				
//			}
//		});
//	};
	
	
	
	
	
	
	
	


</script>
