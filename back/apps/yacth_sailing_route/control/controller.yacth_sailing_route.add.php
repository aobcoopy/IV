<?php
	include_once "apps/yacth_sailing_route/view/dialog.yacth_sailing_route.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_yacth_sailing_route").modal('show');
	});
	$('#dialog_add_yacth_sailing_route').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.yacth_sailing_route.yacth_sailing_route.add = function(){
		if(document.getElementById("txTitle").value=='' )
		{
			alert('The Title, Short Title, Filter Name and URL Slug are required');
			$("#txTitle").focus();
			return false;
		}
		else if(document.getElementById("txLink").value=='')
		{
			alert('Please fill in all required fields');
			$("#txLink").focus();
			return false;
		}
		else
		{
			$.post('apps/yacth_sailing_route/xhr/action-add-yacth_sailing_route.php',$('#form_add_yacth_sailing_route').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_yacth_sailing_route").modal('hide');
				$("#form_add_yacth_sailing_route")[0].reset();
				/*$("#path_photo").val('');
				$("#txt_photo").val('');
				$(".phos").attr('src','');
				$(".bc").hide();*/
				//$("#thumbnail").attr('src','../../../../upload/yacth_sailing_route.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.yacth_sailing_route.yacth_sailing_route.upload_photo = function(){
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
	
	fn.app.yacth_sailing_route.yacth_sailing_route.upload_photo_file = function(){
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
		var url = 'apps/yacth_sailing_route/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
	/*fn.app.yacth_sailing_route.yacth_sailing_route.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth_sailing_route/xhr/action-remove-photo.php",
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

	fn.app.yacth_sailing_route.yacth_sailing_route.upload_photo_cover = function(){
		$(file_upload_cover).click();
		$(file_upload_cover).unbind();
		
		$(file_upload_cover).on("change",function(e){
			var files = this.files
			$("#btn_upp_cover").click();    
		});
	};
	
	fn.app.yacth_sailing_route.yacth_sailing_route.upload_photo_file_cover = function(){
		var data = new FormData($("#form_add_photo_cover")[0]);
		var path_name = $("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}else{
			var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
		}
		var url = 'apps/yacth_sailing_route/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
	
	/*fn.app.yacth_sailing_route.yacth_sailing_route.remove_photo_cover = function(me){
		var file_path = $(me).parent().find('.paths_cover').val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth_sailing_route/xhr/action-remove-photo.php",
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
