<?php
	include_once "apps/slide_photo/view/dialog.slide_photo.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_slide_photo").modal('show');
	});
	$('#dialog_add_slide_photo').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.slide_photo.slide_photo.add = function(){
		if(document.getElementById("txTitle").value=='')
		{
			alert('Please fill ypur data');
			$("#txTitle").focus();
			return false;
		}
		else
		{
			$.post('apps/slide_photo/xhr/action-add-slide-photo.php',$('#form_add_slide_photo').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_slide_photo").modal('hide');
				$("#form_add_slide_photo")[0].reset();
				//$("#thumbnail").attr('src','../../../../upload/slide_photo.jpg');
			}else{
				//fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.slide_photo.slide_photo.upload_photo = function(){
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};
	
	fn.app.slide_photo.slide_photo.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/slide_photo/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					//$(".pho").attr('src',response.path);
					//s += '<div class="col-md-12">';
					$(".thumbs").children('.pho').remove();
						s += '<div class="col-md-4 pho">';
							s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo[]" value="'+response.path+'">';
							s += '<img src="'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.slide_photo.slide_photo.remove_photo(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs").append(s);
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.slide_photo.slide_photo.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/slide_photo/xhr/action-remove-photo.php",
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
	};
	
</script>
