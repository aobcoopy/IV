<?php
	include_once "apps/cover/view/dialog.cover.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_cover").modal('show');
	});
	$('#dialog_add_cover').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.cover.cover.add = function(modal){
		var config_modal=(modal =='show')?modal:'hide';
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
			console.log($("#tmp_photo").val());
			
			$.post('apps/cover/xhr/action-add-cover.php',$('#form_add_cover').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_cover").modal(config_modal);
				$("#form_add_cover")[0].reset();
				$("#path_photo").val('');
				$("#txt_photo").val('');
				$(".phos").attr('src','');
				$(".bc").hide();
				//$("#thumbnail").attr('src','../../../../upload/cover.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.cover.cover.upload_photo = function(){
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
	
	fn.app.cover.cover.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}
		
		var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
		var url = 'apps/cover/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
	function remove_photo_file (path){
		//var path = $('#txTitle').val();
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
	fn.app.cover.cover.remove_photo = function(me){
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
