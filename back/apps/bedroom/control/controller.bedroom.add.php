<?php
	include_once "apps/bedroom/view/dialog.bedroom.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_bedroom").modal('show');
	});
	$('#dialog_add_bedroom').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.bedroom.bedroom.add = function(){
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
			$.post('apps/bedroom/xhr/action-add-bedroom.php',$('#form_add_bedroom').serialize(),function(response){
			if(response.success){
				//$("#tblSlide").DataTable().draw();
				$("#dialog_add_bedroom").modal('hide');
				$("#form_add_bedroom")[0].reset();
				$("#path_photo").val('');
				$("#txt_photo").val('');
				$(".phos").attr('src','');
				//$(".bc").hide();
				//$("#thumbnail").attr('src','../../../../upload/bedroom.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.bedroom.bedroom.upload_photo = function(){
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Name Empty!");
			return true;
		}
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};
	
	fn.app.bedroom.bedroom.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}else{
			var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
		}
		var url = 'apps/bedroom/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
					remove_photo_file($("#txt_photo").val());
					$("#path_photo").val(response.path);
					$("#txt_photo").val(response.path);
					$(".phos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$(".bc").show();
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
		//var path = $('#'.me).val();
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
	fn.app.bedroom.bedroom.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/bedroom/xhr/action-remove-photo.php",
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
