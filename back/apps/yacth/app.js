var yacth = {
	yacth : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		remove : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
		upload_photo : fn.noaccess,
		upload_photo_file : fn.noaccess,
		upload_photo_edit : fn.noaccess,
		upload_photo_file_edit : fn.noaccess,
		remove_photo_edit : fn.noaccess,
	},
	
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/yacth/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{
					if(response.success){
						$("#tblSlide").DataTable().draw();
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	},
	change_v_status:function(id){
		$.ajax({
				url: "apps/yacth/xhr/action-change-v_status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{
					if(response.success){
						$("#tblSlide").DataTable().draw();
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}
};

$.extend(fn.app,{yacth:yacth,edit:edit});