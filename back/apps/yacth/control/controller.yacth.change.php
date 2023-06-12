<?php
	
?>
<script tyle="text/javascript">
	fn.app.yacth.yacth.highlight = function(posi) {
		var z='';
			z+='<div class="col-sm-4">';
				z+='<input type="text" class="form-control" id="txhighlight_edit" name="txhighlight_edit[]" >';
				z+='<i class="fa fa-remove i_remove" onClick="$(this).parent().remove();"></i>';
			z+='</div>';
		$("."+posi).append(z);
	};
	
	fn.app.yacth.yacth.add_box = function(id) {
		var z='';
		z += '<div class="form-group">';
                        z += '<label class="col-sm-1 control-label"></label>';
                        z += '<div class="col-sm-3">';
                            z += '<input type="text" class="form-control" maxlength="39" id="tx_1" name="tx_1" placeholder="Text">';
                        z += '</div>';
                        z += '<div class="col-sm-3">';
                            z += '<input type="text" class="form-control" maxlength="39" id="tx_2" name="tx_2" placeholder="Text">';
                        z += '</div>';
                        z += '<div class="col-sm-3">';
                            z += '<input type="number" class="form-control" id="tx_3" name="tx_3" placeholder="Price">';
                        z += '</div>';
                        z += '<div class="col-sm-2">';
                            z += '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button>';
                        z += '</div>';
                    z += '</div>';
		$(".cover_pricelist").append(z);
	};
	
	fn.app.yacth.yacth.save_pricelist = function() {
		var datas = {
			txtID : $("#txtID").val(),
			inside_data : []
		};
			
		$(".cover_pricelist").children(".form-group").each(function() {
			datas.inside_data.push({
				tx_1 : $(this).find("input[name=tx_1]").val(),
				tx_2 : $(this).find("input[name=tx_2]").val(),
				tx_3 : $(this).find("input[name=tx_3]").val(),
			});
        });
		
		$.ajax({
			url: "apps/yacth/xhr/action-edit-pricelist.php",
			type: "POST",
			dataType: "json",
			data: datas,
			success: function(resp){
				if(resp.success==true)
				{
					$("#dialog_pricelist").modal('hide');
					$("#tblSlide").DataTable().draw();
				}
				else
				{
					
				}
			}	
		});
	};
	
	fn.app.yacth.yacth.dialog_pricelist = function(id) {
		$.ajax({
			url: "apps/yacth/view/dialog.yacth.pricelist.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	
	
	
	
	
	fn.app.yacth.yacth.dialog_inside_photo2 = function(id) {
		$.ajax({
			url: "apps/yacth/view/dialog.yacth.inside.photo2.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	fn.app.yacth.yacth.save_photo_popup2 = function(form){
		$('.lo').show();
		var formData = new FormData($(form)[0]);
        $.ajax({
            url: 'apps/yacth/xhr/action-edit-yacth-popup-photo2.php',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: function () {
            },
            success: function (response) {
				if(response.success==true)
				{
					$('.lo').hide();
					window.location.reload();
				}
            } 
        });
	};
	


	fn.app.yacth.yacth.dialog_inside_photo = function(id) {
		$.ajax({
			url: "apps/yacth/view/dialog.yacth.inside.photo.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.yacth.yacth.choose_photo_popup = function(button)
	{
		$("#"+button).click();
	};
	
	fn.app.yacth.yacth.showImgPopup = function (input) 
	{
		let fileName = input.files[0].name;
		if ($.trim(fileName)) {
			$(input).parent().find('label[for="img"]').text(fileName);
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					var img = '<img src="' + e.target.result + '" width="100%" />';
					
					$(input).parent().parent().find('#preview-img_1').html(img);
					$("#path_photo_1").val(fileName);
				};
				reader.readAsDataURL(input.files[0]);
			}
		} else {
			$('label[for="img"]').text('Choose file');
		}
	};
	
	fn.app.yacth.yacth.save_photo_popup = function(form){
		var formData = new FormData($(form)[0]);
        $.ajax({
            url: 'apps/yacth/xhr/action-edit-yacth-popup-photo.php',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: function () {
            },
            success: function (response) {
					window.location.reload();
                } 
        });
	};
	
	fn.app.yacth.yacth.remove_photo = function(path,me,imgs,id){
        $.ajax({
            url: 'apps/yacth/xhr/action-remove-photo.php',
            type: 'POST',
            dataType: 'json',
            data: {path:path,img:imgs,id:id},
            beforeSend: function () {
            },
            success: function (response) {
					$(me).attr('disabled',true);
					$("label."+imgs).text('');
					$("img."+imgs).attr('src','../../../../upload/photo.jpg');
                } 
        });
	};
	
	
	
	
	
	
	
	
	
	fn.app.yacth.yacth.choose_photo = function()
	{
		$("#img").click();
	}
	
	fn.app.yacth.yacth.showImg = function (input) 
	{
		let fileName = input.files[0].name;
		if ($.trim(fileName)) {
			$('label[for="img"]').text(fileName);
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					var img = '<img src="' + e.target.result + '" width="100%" />';
					
					$('#preview-img').html(img);
					$("#path_photo").val(fileName);
				};
				reader.readAsDataURL(input.files[0]);
			}
		} else {
			$('label[for="img"]').text('Choose file');
		}
	};
	fn.app.yacth.yacth.dialog_photo = function(id) {
		$.ajax({
			url: "apps/yacth/view/dialog.yacth.photo.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	fn.app.yacth.yacth.save_photo = function(form){
		var formData = new FormData($(form)[0]);
        $.ajax({
            url: 'apps/yacth/xhr/action-edit-yacth-photo.php',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: function () {
            },
            success: function (response) {
					window.location.reload();
                } 
        });
	};
	
	
	
	
	
	
	
	
	fn.app.yacth.yacth.change = function(id) {
		$.ajax({
			url: "apps/yacth/view/dialog.yacth.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.yacth.yacth.save_change = function(){
		if(document.getElementById("txTitle_edit").value==''  )
		{
			alert('The Title, Short Title, Filter name and URL Slug are required');
			/*$(".bc_edit").click();*/
			return false;
		}
		else if(document.getElementById("cbb_marina").value==0 )
		{
			alert('Marina location are required');
			$(".cbb_marina").focus();
			return false;
		}
		else
		{ 
			$.post('apps/yacth/xhr/action-edit-yacth.php',$('#form_edit_slide').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/yacth.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	var file_upload_edit = "#f_Photo_edit";

	fn.app.yacth.yacth.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.yacth.yacth.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		if($("#txt_photo_edit").val() != ''){
			remove_photo_file($("#txt_photo_edit").val());
		}
		var url = 'apps/yacth/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
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
					$("#form_edit_slide #path_photo_edit").val(response.path);
					$("#form_edit_slide #txt_photo_edit").val(response.path);
					$("#form_edit_slide .phos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .phos").attr('src',response.path);
					$("#form_edit_slide .bc").show();
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
/*	fn.app.yacth.yacth.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth/xhr/action-remove-photo.php",
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
	function format_photo(path_name){
		var new_path_name =path_name.toLowerCase();
		new_path_name =new_path_name.split(' ').join('-');
		return new_path_name;
	}
	
	//----- cover photo
	var file_upload_edit_cover = "#f_coverPhoto_edit";

	fn.app.yacth.yacth.upload_coverphoto_edit = function(){
		$(file_upload_edit_cover).click();
		$(file_upload_edit_cover).unbind();
		
		$(file_upload_edit_cover).on("change",function(e){
			var files = this.files
			$("#btn_coverupp2").click();    
		});
	};
	
	fn.app.yacth.yacth.upload_coverphoto_file_edit = function(){
		var data = new FormData($("#form_edit_coverphoto")[0]);
		var s = '';
		if($("#txt_coverphoto_edit").val() != ''){
			remove_photo_file($("#txt_coverphoto_edit").val());
		}
		var url = 'apps/yacth/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
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
					$("#form_edit_slide #path_coverphoto_edit").val(response.path);
					$("#form_edit_slide #txt_coverphoto_edit").val(response.path);
					$("#form_edit_slide .covphos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .covphos").attr('src',response.path);
					$("#form_edit_slide .bc_coveredit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
/*	fn.app.yacth.yacth.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_coverphoto_edit").val('');
					$("#txt_coverphoto_edit").val('');
					$(".covphos").attr('src','');
					$(".bc_coveredit").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};*/


	fn.app.yacth.yacth.preview = function(id) {
		window.open('../preview-yacht-'+id+'.html', '_blank');
		//window.open('../yacht#yid-'+id, '_blank');
	}
</script>
