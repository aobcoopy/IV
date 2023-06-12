var transfer = {
	transfer : {
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
		check : fn.noaccess,
		addtb : fn.noaccess,
		popup_pricing : fn.noaccess,
		save_table_pricing : fn.noaccess,
	},
	
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/transfer/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{$("#tblSlide").DataTable().draw();
					if(response.success){
						
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	},
	change_heightlight:function(id){
		$.ajax({
				url: "apps/transfer/xhr/action-change-heightlight.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{$("#tblSlide").DataTable().draw();
					if(response.success){
						
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	},
	change_lifestyle:function(id){
		$.ajax({
				url: "apps/transfer/xhr/action-change-lifestyle.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{$("#tblSlide").DataTable().draw();
					if(response.success){
						
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}
};

$.extend(fn.app,{transfer:transfer,edit:edit});