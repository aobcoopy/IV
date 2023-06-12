var agent = {
	agent : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		removein : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
	},
	
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/agent/xhr/action-change-status.php",
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

$.extend(fn.app,{agent:agent,edit:edit});