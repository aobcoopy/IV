var confirm_payment = {
	confirm_payment : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		remove : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
		
	},
	
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/confirm_payment/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{
					if(response==true){
						$("#tblGroup").DataTable().draw();
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}
};

$.extend(fn.app,{confirm_payment:confirm_payment,edit:edit});