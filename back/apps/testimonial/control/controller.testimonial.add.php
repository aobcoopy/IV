<?php
	include_once "apps/testimonial/view/dialog.testimonial.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_testimonial").modal('show');
	});
	$('#dialog_add_testimonial').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.testimonial.testimonial.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		/*else if(document.getElementById("txBrief").value=='')
		{
			alert('Please fill ypur data');
			$("#txBrief").focus();
			return false;
		}
		else if(document.getElementById("txDetail").value=='')
		{
			alert('Please fill ypur data');
			$("#txDetail").focus();
			return false;
		}*/
		else
		{
			$.post('apps/testimonial/xhr/action-add-testimonial.php',$('#form_add_testimonial').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_testimonial").modal('hide');
				$("#form_add_testimonial")[0].reset();
				//$("#path_photo").val('');
				//$("#txt_photo").val('');
				//$(".phos").attr('src','');
				//$(".bc").hide();
				//$(".thumbs").children().remove();
				//window.location.reload();
				//$("#thumbnail").attr('src','../../../../upload/testimonial.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	//var file_upload = "#f_Photo";
//
//	fn.app.testimonial.testimonial.upload_photo = function(){
//		$(file_upload).click();
//		$(file_upload).unbind();
//		
//		$(file_upload).on("change",function(e){
//			var files = this.files
//			$("#btn_upp").click();    
//		});
//	};
	
	//fn.app.testimonial.testimonial.upload_photo_file = function(){
//		var data = new FormData($("#form_add_photo")[0]);
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
//					
//					//$(".thumbs_photo").children('.pho').remove();
//						s += '<div class="col-md-4 pho">';
//							s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
//							s += '<input type="hidden" name="txt_photo[]" value="'+response.path+'">';
//							s += '<img src="'+response.path+'"  width="100%" class="img-thumbnail pho">';
//							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.testimonial.testimonial.remove_photo_file(this);">';
//								s += '<i class="fa fa-times" aria-hidden="true"></i>';
//								s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
//							s += '</button>';
//						s += '</div>';
//					//s += '</div>';
//					$(".thumbs_photo").append(s);
//					
//					/*$("#path_photo").val(response.path);
//					$("#txt_photo").val(response.path);
//					$(".phos").attr('src',response.path);
//					$(".bc").show();*/
//					/*$("#tblbrand").DataTable().draw();
//					$("#dialog_edit_icon").modal('hide');*/
//				}else{
//					fn.engine.alert("Alert",response.msg);
//				}	
//			}
//		});
//	};
	
	/*fn.app.testimonial.testimonial.remove_photo_file = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/testimonial/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$(me).parent().remove();
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


