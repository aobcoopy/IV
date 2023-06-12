<?php
	include_once "apps/spl_cate/view/dialog.spl_cate.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_spl_cate").modal('show');
	});
	$('#dialog_add_spl_cate').on('shown.bs.modal', function () {
		$("#txTitle").focus();
	});
	
	
	fn.app.spl_cate.spl_cate.add = function(){
		if(document.getElementById("txTitle").value=='' )
		{
			alert('The Name are required');
			/*$("#txTitle").focus();*/
			return false;
		}
		/*else if(document.getElementById("txt_photo").value=='')
		{
			alert('Please fill in all required fields');
			$("#txt_photo").click();
			return false;
		}*/
		else
		{
			$.post('apps/spl_cate/xhr/action-add-spl_cate.php',$('#form_add_spl_cate').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_spl_cate").modal('hide');
				$("#form_add_spl_cate")[0].reset();
				//$("#path_photo").val('');
				//$("#txt_photo").val('');
				//$(".phos").attr('src','');
				//$(".bc").hide();
				//$("#thumbnail").attr('src','../../../../upload/spl_cate.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.spl_cate.spl_cate.upload_photo = function(){
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};
	
	fn.app.spl_cate.spl_cate.upload_photo_file = function(){
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
		var url = 'apps/spl_cate/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
	//Edit by parinyimz 20180814
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
	/*fn.app.spl_cate.spl_cate.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/spl_cate/xhr/action-remove-photo.php",
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
	
	//--- cover
	var file_upload_cover = "#f_Photo_cover";

	fn.app.spl_cate.spl_cate.upload_photo_cover = function(){
		$(file_upload_cover).click();
		$(file_upload_cover).unbind();
		
		$(file_upload_cover).on("change",function(e){
			var files = this.files
			$("#btn_upp_cover").click();    
		});
	};
	
	fn.app.spl_cate.spl_cate.upload_photo_file_cover = function(){
		var data = new FormData($("#form_add_photo_cover")[0]);
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}else{
			var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
		}
		var url = 'apps/spl_cate/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
					remove_photo_file($("#txt_photo_cover").val());
					$("#path_photo_cover").val(response.path);
					$("#txt_photo_cover").val(response.path);
					$(".phos_cover").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$(".bc_cover").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	/*fn.app.spl_cate.spl_cate.remove_photo_cover = function(me){
		var file_path = $(me).parent().find('.paths_cover').val();
		//alert(file_path);
		$.ajax({
			url:"apps/spl_cate/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo_cover").val('');
					$("#txt_photo_cover").val('');
					$(".phos_cover").attr('src','');
					$(".bc_cover").hide();
					//fn.engine.alert("Alert",resp.msg);
				}
				else
				{
					fn.engine.alert("Alert",resp.msg);
				}
				
			}
		});
	};*/
	
</script>
