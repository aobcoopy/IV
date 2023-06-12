<?php
	include_once "apps/blog/view/dialog.blog.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_blog").modal('show');
	});
	$('#dialog_add_blog').on('shown.bs.modal', function () {
		$("#txtName").focus();
		if($("#txName").val()=='')
		{
		   $("#cke_41").hide()
		}
		else
		{
		   $("#cke_41").show();
		}
	});
	
	
	fn.app.blog.blog.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data1');
			$("#txName").focus();
			return false;
		}
		else if(document.getElementById("txSnippet").value=='')
		{
			alert('Please fill ypur data2');
			$("#txSnippet").focus();
			return false;
		}
		else if(document.getElementById("txBrief").value=='')
		{
			alert('Please fill ypur data3');
			$("#txBrief").focus();
			return false;
		}
		else if(document.getElementById("txDetail").value=='')
		{
			console.log($("#txDetail").val());
			alert('Please fill ypur data4');
			
			$("#txDetail").focus();
			return false;
		}
		else if(document.getElementById("txSign").value=='')
		{
			alert('Please fill ypur data5');
			$("#txSign").focus();
			return false;
		}
		else if(document.getElementById("txDate").value=='')
		{
			alert('Please fill ypur data6');
			$("#txDate").focus();
			return false;
		}
		else
		{
			$.post('apps/blog/xhr/action-add-blog.php',$('#form_add_blog').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_blog").modal('hide');
				$("#form_add_blog")[0].reset();
				$("#path_photo").val('');
				$("#txt_photo").val('');
				$(".phos").attr('src','');
				$(".bc").hide();
				$(".thumbs").children().remove();
				window.location.reload();
				//$("#thumbnail").attr('src','../../../../upload/blog.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.blog.blog.upload_photo = function(){
		var path_name = $("#txName").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Name (Title,H1) Empty!");
			return true;
		}
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};
	
	fn.app.blog.blog.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var path_name = $("#txName").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Name (Title,H1) Empty!");
			return true;
		}else{
			var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
			//new_path_name = (new_path_name.length) > 50 ? new_path_name.substr(0,50): new_path_name;
		}
		var url = 'apps/blog/xhr/action-up-photo.php?format_photo_name='+new_path_name;
		var s = '';
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
					
					//$(".thumbs_photo").children('.pho').remove();
						s += '<div class="col-md-4 pho">';
							s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo[]" value="'+response.path+'">';
							s += '<img src="<?php echo S3_BUCKET_URL ?>'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.blog.blog.remove_photo_file(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs_photo").append(s);
					
					/*$("#path_photo").val(response.path);
					$("#txt_photo").val(response.path);
					$(".phos").attr('src',response.path);
					$(".bc").show();*/
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	/*fn.app.blog.blog.remove_photo_file = function(me){
		var file_path = $(me).parent().find('.paths').val();
		$(me).parent().remove();
		//alert(file_path);
		$.ajax({
			url:"apps/blog/xhr/action-remove-photo.php",
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
	//Edit by parinyimz 20180813
	fn.app.blog.blog.remove_photo_file = function(me){
		var path = $(me).parent().find('.paths').val();
		var url ='inc/delete_photo.php?path='+path;
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			success : function(data){
				if(data.success == '200'){
				$(me).parent().remove();	
				}
			}
		});	
	};
	
	
	
	
	
	
	//------------upload_photo_detail
	var file_upload_detail = "#fd_Photo";

	fn.app.blog.blog.upload_photo_detail = function(){
		$(file_upload_detail).click();
		$(file_upload_detail).unbind();
		
		$(file_upload_detail).on("change",function(e){
			var files = this.files
			$("#btn_upp_detail").click();    
		});
	};	
	
	fn.app.blog.blog.upload_photo_detail_file = function(){
		var data = new FormData($("#form_add_photo_detail")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/blog/xhr/action-up-photo-detail.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#tx_photo_detail").val(response.path);
					
					$(".phos").attr('src',response.path);
					$(".bc").show();
					$("#fd_Photo").val('');
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.blog.blog.remove_photo = function(me){
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
					$("#tx_photo_detail").val('');
					
					$(".phos").attr('src','');
					$(".bc").hide();
					$("#f_Photo").val('');
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


