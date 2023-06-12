<?php
	include_once "apps/facility/view/dialog.facility.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_facility").modal('show');
	});
	$('#dialog_add_facility').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.facility.facility.add = function(){
		if(document.getElementById("txTitle").value=='')
		{
			alert('Please fill ypur data');
			$("#txTitle").focus();
			return false;
		}
		else if(document.getElementById("txt_photo").value=='')
		{
			alert('Please fill ypur data');
			$("#txt_photo").click();
			return false;
		}
		else
		{
			$.post('apps/facility/xhr/action-add-facility.php',$('#form_add_facility').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_facility").modal('hide');
				$("#form_add_facility")[0].reset();
				$("#path_photo").val('');
				$("#txt_photo").val('');
				$(".phos").attr('src','');
				$(".bc").hide();
				//$("#thumbnail").attr('src','../../../../upload/facility.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.facility.facility.upload_photo = function(){
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};
	
	fn.app.facility.facility.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/facility/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#path_photo").val(response.path);
					$("#txt_photo").val(response.path);
					$(".phos").attr('src',response.path);
					$(".bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.facility.facility.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/facility/xhr/action-remove-photo.php",
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
	};
	
</script>
