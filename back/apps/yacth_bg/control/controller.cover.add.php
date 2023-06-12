<?php
	//include_once "apps/yacth_cover/view/dialog.yacth_cover.add.php";
?>
<script style="text/javascript">
fn.app.yacth_cover.choose_photo = function()
{
	$("#img").click();
}

fn.app.yacth_cover.showImg = function (input) 
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


fn.app.yacth_cover.yacth_cover.remove_cover = function(file_path){
		//var file_path = $(me).val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth_bg/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					fn.engine.alert("Alert",resp.msg);
					setTimeout(function(){
						$("#bt_save").click();
					},1000);
					
				}
				else
				{
					fn.engine.alert("Alert",resp.msg);
				}
				
			}
		});
	};

//	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
/*	$("#btnAddGroup").click(function(){
		$("#dialog_add_yacth_cover").modal('show');
	});
	$('#dialog_add_yacth_cover').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
*/	
	
	fn.app.yacth_cover.yacth_cover.add = function(form){
		var formData = new FormData($(form)[0]);
        $.ajax({
            url: 'apps/yacth_bg/xhr/action-edit-yacth_cover.php',
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
		
		//var config_modal=(modal =='show')?modal:'hide';
//		if(document.getElementById("txTitle").value=='')
//		{
//			alert('Please fill ypur data');
//			$("#txTitle").focus();
//			return false;
//		}
//		else if(document.getElementById("txt_photo").value=='')
//		{
//			alert('Please fill ypur data');
//			$("#txt_photo").click();
//			return false;
//		}
//		else
//		{ 
//			console.log($("#tmp_photo").val());
//			
//			$.post('apps/yacth_cover/xhr/action-edit-yacth_cover.php',$('#form_add_yacth_cover').serialize(),function(response){
//			if(response.success){
//				$("#tblSlide").DataTable().draw();
//				$("#dialog_add_yacth_cover").modal(config_modal);
//				$("#form_add_yacth_cover")[0].reset();
//				$("#path_photo").val('');
//				$("#txt_photo").val('');
//				$(".phos").attr('src','');
//				$(".bc").hide();
//				//$("#thumbnail").attr('src','../../../../upload/yacth_cover.jpg');
//			}else{
//				fn.engine.alert("Alert",response.msg);
//			}
//		},'json');
//		return false;
//		}
	};
	
	

	var file_upload = "#f_Photo";

	fn.app.yacth_cover.yacth_cover.upload_photo = function(){
		var path_name = 'Yacth';//$("#txTitle").val();
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
	
	fn.app.yacth_cover.yacth_cover.upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		var path_name = 'Yacth';//$("#txTitle").val();
		if(path_name == ''){
			fn.engine.alert("Alert","Title Empty!");
			return true;
		}
		
		var new_path_name =path_name.toLowerCase();
			new_path_name =new_path_name.split(' ').join('-');
		var url = 'apps/yacth_cover/xhr/action-up-photo.php?format_photo_name='+new_path_name;
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
	fn.app.yacth_cover.yacth_cover.remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth_cover/xhr/action-remove-photo.php",
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
