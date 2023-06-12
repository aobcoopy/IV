<?php
	
?>
<script tyle="text/javascript">

	fn.app.agent.agent.villa_list_view = function(id) {
		$.ajax({
			url: "apps/agent/view/dialog.agent.villa_list_view.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.agent.agent.villa_list = function(id) {
		$.ajax({
			url: "apps/agent/view/dialog.agent.villa_list.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	

	fn.app.agent.agent.change = function(id) {
		$.ajax({
			url: "apps/agent/view/dialog.agent.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.agent.agent.save_change = function(){
		if($("#form_edit_agent #name").val=='')
		{
			alert('Please fill ypur data');
			$("$txTitle_edit").click();
			return false;
		}
		else
		{
			$.post('apps/agent/xhr/action-edit-agent.php',$('#form_edit_agent').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/agent.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	fn.app.agent.agent.save_change_villa_list = function(){
		$.post('apps/agent/xhr/action-edit-agent_villa_list.php',$('#form_edit_agent_villa_list').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_edit_group").modal('hide');
				//$("#thumbnail_edit").attr('src','../../../../upload/agent.jpg');
			}else{
				//fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
	};
	
	/*var file_upload_edit = "#f_Photo_edit";

	fn.app.agent.agent.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.agent.agent.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/agent/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_agent #path_photo_edit").val(response.path);
					$("#form_edit_agent #txt_photo_edit").val(response.path);
					$("#form_edit_agent .phos").attr('src',response.path);
					$("#form_edit_agent .bc_edit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*s/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.agent.agent.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/agent/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc_edit").hide();
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
